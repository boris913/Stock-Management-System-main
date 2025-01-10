<?php
include '../includes/connection.php';
include '../includes/sidebar.php';

// Vérification du type d'utilisateur
$query = 'SELECT ID, t.TYPE
          FROM users u
          JOIN type t ON t.TYPE_ID = u.TYPE_ID 
          WHERE ID = ' . $_SESSION['MEMBER_ID'];
$result = mysqli_query($db, $query) or die(mysqli_error($db));

while ($row = mysqli_fetch_assoc($result)) {
    $userType = $row['TYPE'];
    
    if ($userType == 'User') {
?>
        <script type="text/javascript">
            alert("Page restreinte ! Vous serez redirigé vers POS");
            window.location = "pos.php";
        </script>
<?php
        exit; // Arrêter l'exécution après la redirection
    }
}
?>

<center>
    <div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
        <div class="card-header py-3">
            <h4 class="m-2 font-weight-bold text-primary">Détails du produit</h4>
        </div>
        <a href="product.php?action=add" class="btn btn-primary bg-gradient-primary btn-block">
            <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Retour
        </a>
        <div class="card-body">
            <?php 
            $productCode = mysqli_real_escape_string($db, $_GET['id']);
            $query = 'SELECT PRODUCT_ID, PRODUCT_CODE, NAME, DESCRIPTION, QTY_STOCK, PRICE, c.CNAME 
                      FROM product p 
                      JOIN category c ON p.CATEGORY_ID = c.CATEGORY_ID 
                      WHERE PRODUCT_CODE = "' . $productCode . '"';
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
            $productData = mysqli_fetch_assoc($result);
            ?>
            <div class="form-group row text-left">
                <div class="col-sm-3 text-primary">
                    <h5>Code produit<br></h5>
                </div>
                <div class="col-sm-9">
                    <h5>: <?php echo htmlspecialchars($productData['PRODUCT_CODE']); ?><br></h5>
                </div>
            </div>
            <div class="form-group row text-left">
                <div class="col-sm-3 text-primary">
                    <h5>Nom du produit<br></h5>
                </div>
                <div class="col-sm-9">
                    <h5>: <?php echo htmlspecialchars($productData['NAME']); ?><br></h5>
                </div>
            </div>
            <div class="form-group row text-left">
                <div class="col-sm-3 text-primary">
                    <h5>Description<br></h5>
                </div>
                <div class="col-sm-9">
                    <h5>: <?php echo htmlspecialchars($productData['DESCRIPTION']); ?><br></h5>
                </div>
            </div>
            <div class="form-group row text-left">
                <div class="col-sm-3 text-primary">
                    <h5>Prix<br></h5>
                </div>
                <div class="col-sm-9">
                    <h5>: <?php echo htmlspecialchars($productData['PRICE']); ?><br></h5>
                </div>
            </div>
            <div class="form-group row text-left">
                <div class="col-sm-3 text-primary">
                    <h5>Catégorie<br></h5>
                </div>
                <div class="col-sm-9">
                    <h5>: <?php echo htmlspecialchars($productData['CNAME']); ?><br></h5>
                </div>
            </div>
        </div>
    </div>
</center>

<div class="card shadow mb-4 col-xs-12 col-md-15 border-bottom-primary">
    <div class="card-header py-3">
        <h4 class="m-2 font-weight-bold text-primary">Inventaire</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
                <thead>
                    <tr>
                        <th>Code produit</th>
                        <th>Nom</th>
                        <th>Quantité</th>
                        <th>En stock</th>
                        <th>Catégorie</th>
                        <th>Fournisseur</th>
                        <th>Date d'entrée en stock</th>
                    </tr>
                </thead>
                <tbody>
                    <?php                  
                    $query = 'SELECT PRODUCT_CODE, NAME, QTY_STOCK, ON_HAND, c.CNAME, COMPANY_NAME, DATE_STOCK_IN 
                              FROM product p 
                              JOIN category c ON p.CATEGORY_ID = c.CATEGORY_ID 
                              JOIN supplier s ON p.SUPPLIER_ID = s.SUPPLIER_ID 
                              WHERE PRODUCT_CODE = "' . $productData['PRODUCT_CODE'] . '"';
                    $result = mysqli_query($db, $query) or die(mysqli_error($db));
                    
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($row['PRODUCT_CODE']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['NAME']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['QTY_STOCK']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['ON_HAND']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['CNAME']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['COMPANY_NAME']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['DATE_STOCK_IN']) . '</td>';
                        echo '</tr>';
                    }
                    ?> 
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
include '../includes/footer.php';
?>