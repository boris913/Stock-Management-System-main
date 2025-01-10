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
        <h4 class="m-2 font-weight-bold text-primary">Fournisseur&nbsp;<a href="#" data-toggle="modal" data-target="#supplierModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
                <thead>
                    <tr>
                        <th>Nom de l'Entreprise</th>
                        <th>Province</th>
                        <th>Ville</th>
                        <th>Numéro de Téléphone</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
<?php                  
$query = 'SELECT SUPPLIER_ID, COMPANY_NAME, l.PROVINCE, l.CITY, PHONE_NUMBER FROM supplier s JOIN location l ON s.LOCATION_ID=l.LOCATION_ID';
$result = mysqli_query($db, $query) or die (mysqli_error($db));

while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>'. $row['COMPANY_NAME'].'</td>';
    echo '<td>'. $row['PROVINCE'].'</td>';
    echo '<td>'. $row['CITY'].'</td>';
    echo '<td>'. $row['PHONE_NUMBER'].'</td>';
    echo '<td align="right"> <div class="btn-group">
            <a type="button" class="btn btn-primary bg-gradient-primary" href="sup_searchfrm.php?action=edit & id='.$row['SUPPLIER_ID'] . '"><i class="fas fa-fw fa-list-alt"></i> Détails</a>
            <div class="btn-group">
                <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow" data-toggle="dropdown" style="color:white;">
                ... <span class="caret"></span></a>
                <ul class="dropdown-menu text-center" role="menu">
                    <li>
                        <a type="button" class="btn btn-warning bg-gradient-warning btn-block" style="border-radius: 0px;" href="sup_edit.php?action=edit & id='.$row['SUPPLIER_ID']. '">
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

<!-- Modal Fournisseur-->
<div class="modal fade" id="supplierModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un Fournisseur</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" method="post" action="sup_transac.php?action=add">
                    <div class="form-group">
                        <input class="form-control" placeholder="Nom de l'Entreprise" name="companyname" required>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="province" placeholder="Province" name="province" required></select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="city" placeholder="Ville" name="city" required></select>
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Numéro de Téléphone" name="phonenumber" required>
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

<?php
include '../includes/footer.php';
?>