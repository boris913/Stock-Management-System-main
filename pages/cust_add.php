<?php
include '../includes/connection.php';
include '../includes/sidebar.php';
?>

<?php 
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
            
<center>
    <div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
        <div class="card-header py-3">
            <h4 class="m-2 font-weight-bold text-primary">Ajouter un Client</h4>
        </div>
        <a href="customer.php" type="button" class="btn btn-primary bg-gradient-primary">Retour</a>
        <div class="card-body">
            <div class="table-responsive">
                <form role="form" method="post" action="cust_transac.php?action=add">
                    <div class="form-group">
                        <input class="form-control" placeholder="Prénom" name="firstname" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Nom de Famille" name="lastname" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Numéro de Téléphone" name="phonenumber" required>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-success btn-block"><i class="fa fa-check fa-fw"></i>Enregistrer</button>
                    <button type="reset" class="btn btn-danger btn-block"><i class="fa fa-times fa-fw"></i>Réinitialiser</button>
                </form>  
            </div>
        </div>
    </div>
</center>

<?php
include '../includes/footer.php';
?>