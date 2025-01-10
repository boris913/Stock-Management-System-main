<?php
include '../includes/connection.php';
include '../includes/sidebar.php';

$query = 'SELECT ID, t.TYPE
          FROM users u
          JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
$result = mysqli_query($db, $query) or die (mysqli_error($db));

while ($row = mysqli_fetch_assoc($result)) {
    $Aa = $row['TYPE'];

    if ($Aa == 'User') {
?>
        <script type="text/javascript">
            // Redirection
            alert("Page restreinte ! Vous serez redirigé vers le TPV");
            window.location = "pos.php";
        </script>
<?php
    }           
}

$sql = "SELECT DISTINCT CNAME, CATEGORY_ID FROM category ORDER BY CNAME ASC";
$result = mysqli_query($db, $sql) or die ("Mauvaise requête SQL : $sql");

$aaa = "<select class='form-control' name='category' required>
        <option disabled selected hidden>Sélectionner une catégorie</option>";
while ($row = mysqli_fetch_assoc($result)) {
    $aaa .= "<option value='".$row['CATEGORY_ID']."'>".$row['CNAME']."</option>";
}

$aaa .= "</select>";

$sql2 = "SELECT DISTINCT SUPPLIER_ID, COMPANY_NAME FROM supplier ORDER BY COMPANY_NAME ASC";
$result2 = mysqli_query($db, $sql2) or die ("Mauvaise requête SQL : $sql2");

$sup = "<select class='form-control' name='supplier' required>
        <option disabled selected hidden>Sélectionner un fournisseur</option>";
while ($row = mysqli_fetch_assoc($result2)) {
    $sup .= "<option value='".$row['SUPPLIER_ID']."'>".$row['COMPANY_NAME']."</option>";
}

$sup .= "</select>";
?>
            
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-2 font-weight-bold text-primary">Produit&nbsp;<a href="#" data-toggle="modal" data-target="#aModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
                <thead>
                    <tr>
                        <th>Code Produit</th>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Catégorie</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
<?php                  
$query = 'SELECT PRODUCT_ID, PRODUCT_CODE, NAME, PRICE, CNAME, DATE_STOCK_IN FROM product p JOIN category c ON p.CATEGORY_ID=c.CATEGORY_ID GROUP BY PRODUCT_CODE';
$result = mysqli_query($db, $query) or die (mysqli_error($db));

while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>'. $row['PRODUCT_CODE'].'</td>';
    echo '<td>'. $row['NAME'].'</td>';
    echo '<td>'. $row['PRICE'].'</td>';
    echo '<td>'. $row['CNAME'].'</td>';
    echo '<td align="right"> <div class="btn-group">
            <a type="button" class="btn btn-primary bg-gradient-primary" href="pro_searchfrm.php?action=edit & id='.$row['PRODUCT_CODE'] . '"><i class="fas fa-fw fa-list-alt"></i> Détails</a>
            <div class="btn-group">
                <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                ... <span class="caret"></span></a>
                <ul class="dropdown-menu text-center" role="menu">
                    <li>
                        <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="pro_edit.php?action=edit & id='.$row['PRODUCT_ID']. '">
                            <i class="fas fa-fw fa-edit"></i> Modifier
                        </a>
                    </li>
                </ul>
            </div>
          </div> </td>';
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

<!-- Modal Produit-->
<div class="modal fade" id="aModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un Produit</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" method="post" action="pro_transac.php?action=add">
                    <div class="form-group">
                        <input class="form-control" placeholder="Code Produit" name="prodcode" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Nom" name="name" required>
                    </div>
                    <div class="form-group">
                        <textarea rows="5" cols="50" class="form-control" placeholder="Description" name="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="number" min="1" max="999999999" class="form-control" placeholder="Quantité" name="quantity" required>
                    </div>
                    <div class="form-group">
                        <input type="number" min="1" max="999999999" class="form-control" placeholder="En Stock" name="onhand" required>
                    </div>
                    <div class="form-group">
                        <input type="number" min="1" max="9999999999" class="form-control" placeholder="Prix" name="price" required>
                    </div>
                    <div class="form-group">
                        <?php echo $aaa; ?>
                    </div>
                    <div class="form-group">
                        <?php echo $sup; ?>
                    </div>
                    <div class="form-group">
                        <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" placeholder="Date de Stock" name="datestock" required>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Enregistrer</button>
                    <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Réinitialiser</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>      
                </form>  
            </div>
        </div>
    </div>
</div>