<?php
include '../includes/connection.php';
include '../includes/topp.php';
// session_start();
$product_ids = array();
// session_destroy();

// Vérifiez si le bouton Ajouter au panier a été soumis
if (filter_input(INPUT_POST, 'addpos')) {
    if (isset($_SESSION['pointofsale'])) {
        
        // Gardez une trace du nombre de produits dans le panier
        $count = count($_SESSION['pointofsale']);
        
        // Créez un tableau séquentiel pour faire correspondre les clés du tableau aux ID des produits
        $product_ids = array_column($_SESSION['pointofsale'], 'id');

        if (!in_array(filter_input(INPUT_GET, 'id'), $product_ids)) {
            $_SESSION['pointofsale'][$count] = array
            (
                'id' => filter_input(INPUT_GET, 'id'),
                'name' => filter_input(INPUT_POST, 'name'),
                'price' => filter_input(INPUT_POST, 'price'),
                'quantity' => filter_input(INPUT_POST, 'quantity')
            );   
        } else { // Le produit existe déjà, augmentez la quantité
            // Faites correspondre la clé du tableau à l'ID du produit ajouté au panier
            for ($i = 0; $i < count($product_ids); $i++) {
                if ($product_ids[$i] == filter_input(INPUT_GET, 'id')) {
                    // Ajoutez la quantité de l'article au produit existant dans le tableau
                    $_SESSION['pointofsale'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
                }
            }
        }
        
    } else { // Si le panier ne existe pas, créez le premier produit avec la clé de tableau 0
        // Créez un tableau en utilisant les données du formulaire soumises, commencez à partir de la clé 0 et remplissez-le avec des valeurs
        $_SESSION['pointofsale'][0] = array
        (
            'id' => filter_input(INPUT_GET, 'id'),
            'name' => filter_input(INPUT_POST, 'name'),
            'price' => filter_input(INPUT_POST, 'price'),
            'quantity' => filter_input(INPUT_POST, 'quantity')
        );
    }
}

if (filter_input(INPUT_GET, 'action') == 'delete') {
    // Boucle à travers tous les produits dans le panier jusqu'à ce qu'il corresponde à la variable GET id
    foreach ($_SESSION['pointofsale'] as $key => $product) {
        if ($product['id'] == filter_input(INPUT_GET, 'id')) {
            // Supprimez le produit du panier lorsqu'il correspond à l'ID GET
            unset($_SESSION['pointofsale'][$key]);
        }
    }
    // Réinitialisez les clés du tableau de session pour qu'elles correspondent à l'array numérique $product_ids
    $_SESSION['pointofsale'] = array_values($_SESSION['pointofsale']);
}

// pre_r($_SESSION);

function pre_r($array) {
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
?>
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow mb-0">
            <div class="card-header py-2">
                <h4 class="m-1 text-lg text-primary">Catégorie de Produits</h4>
            </div>
            <div class="card-body">
                <!-- Onglets -->
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-target="#keyboard" data-toggle="tab">Clavier</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-target="#mouse" data-toggle="tab">Souris</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#headset" data-toggle="tab">Casque</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#cpu" data-toggle="tab">CPU</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#monitor" data-toggle="tab">Moniteur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#motherboard" data-toggle="tab">Carte Mère</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#processor" data-toggle="tab">Processeur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#powersupply" data-toggle="tab">Alimentation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#others" data-toggle="tab">Autres</a>
                    </li>
                </ul>

                <!-- ZONE DE PANNEAU D'ONGLET -->
                <?php include 'postabpane.php'; ?>
                <!-- FIN DE ZONE DE PANNEAU D'ONGLET -->

                <div style="clear:both"></div>  
                <br />  
                <div class="card shadow mb-4 col-md-12">
                    <div class="card-header py-3 bg-white">
                        <h4 class="m-2 font-weight-bold text-primary">Point de Vente</h4>
                    </div>
                    
                    <div class="row">    
                        <div class="card-body col-md-9">
                            <div class="table-responsive">

                                <!-- Formulaire -->
                                <form role="form" method="post" action="pos_transac.php?action=add">
                                    <input type="hidden" name="employee" value="<?php echo $_SESSION['FIRST_NAME']; ?>">
                                    <input type="hidden" name="role" value="<?php echo $_SESSION['JOB_TITLE']; ?>">
                                    
                                    <table class="table">    
                                        <tr>  
                                            <th width="55%">Nom du Produit</th>  
                                            <th width="10%">Quantité</th>  
                                            <th width="15%">Prix</th>  
                                            <th width="15%">Total</th>  
                                            <th width="5%">Action</th>  
                                        </tr>  
                                        <?php  
                                        if (!empty($_SESSION['pointofsale'])):  
                                            $total = 0;  
                                            foreach ($_SESSION['pointofsale'] as $key => $product): 
                                        ?>  
                                        <tr>  
                                            <td>
                                                <input type="hidden" name="name[]" value="<?php echo $product['name']; ?>">
                                                <?php echo $product['name']; ?>
                                            </td>  

                                            <td>
                                                <input type="hidden" name="quantity[]" value="<?php echo $product['quantity']; ?>">
                                                <?php echo $product['quantity']; ?>
                                            </td>  

                                            <td>
                                                <input type="hidden" name="price[]" value="<?php echo $product['price']; ?>">
                                                $ <?php echo number_format($product['price']); ?>
                                            </td>  

                                            <td>
                                                <input type="hidden" name="total[]" value="<?php echo $product['quantity'] * $product['price']; ?>">
                                                $ <?php echo number_format($product['quantity'] * $product['price'], 2); ?>
                                            </td>  
                                            <td>
                                                <a href="pos.php?action=delete&id=<?php echo $product['id']; ?>">
                                                    <div class="btn bg-gradient-danger btn-danger"><i class="fas fa-fw fa-trash"></i></div>
                                                </a>
                                            </td>  
                                        </tr>
                                        <?php  
                                            $total += ($product['quantity'] * $product['price']);
                                            endforeach;  
                                        endif;
                                        ?>  
                                    </table> 
                                </div>
                            </div> 

<?php
include 'posside.php';
include '../includes/footer.php';
?>