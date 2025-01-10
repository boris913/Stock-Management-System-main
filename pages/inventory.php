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
?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-2 font-weight-bold text-primary">Inventaire</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
                <thead>
                    <tr>
                        <th>Code Produit</th>
                        <th>Nom</th>
                        <th>Quantité</th>
                        <th>En Stock</th>
                        <th>Catégorie</th>
                        <th>Date de Stock</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
<?php                  
$query = 'SELECT PRODUCT_ID, PRODUCT_CODE, NAME, COUNT(`QTY_STOCK`) AS "QTY_STOCK", COUNT(`ON_HAND`) AS "ON_HAND", CNAME, DATE_STOCK_IN FROM product p JOIN category c ON p.CATEGORY_ID=c.CATEGORY_ID GROUP BY PRODUCT_CODE';
$result = mysqli_query($db, $query) or die (mysqli_error($db));

while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>'. $row['PRODUCT_CODE'].'</td>';
    echo '<td>'. $row['NAME'].'</td>';
    echo '<td>'. $row['QTY_STOCK'].'</td>';
    echo '<td>'. $row['ON_HAND'].'</td>';
    echo '<td>'. $row['CNAME'].'</td>';
    echo '<td>'. $row['DATE_STOCK_IN'].'</td>';
    echo '<td align="right">
            <a type="button" class="btn btn-primary bg-gradient-primary" href="inv_searchfrm.php?action=edit & id='.$row['PRODUCT_CODE'] . '"><i class="fas fa-fw fa-th-list"></i> Voir</a>
          </td>';
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