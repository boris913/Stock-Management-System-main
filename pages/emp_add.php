<?php
include '../includes/connection.php';
include '../includes/sidebar.php';
?> 

<?php 
$query = 'SELECT ID, t.TYPE
          FROM users u
          JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
$result = mysqli_query($db, $query) or die(mysqli_error($db));

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

$sql = "SELECT DISTINCT JOB_TITLE, JOB_ID FROM job ORDER BY JOB_ID ASC";
$result = mysqli_query($db, $sql) or die("Requête SQL invalide : $sql");

$opt = "<select class='form-control' name='jobs'>
        <option>Sélectionner un emploi</option>";
while ($row = mysqli_fetch_assoc($result)) {
    $opt .= "<option value='".$row['JOB_ID']."'>".$row['JOB_TITLE']."</option>";
}

$opt .= "</select>";
?>
<script>  
window.onload = function() {  
    // ---------------
    // utilisation basique
    // ---------------
    var $ = new City();
    $.showProvinces("#province");
    $.showCities("#city");

    // ------------------
    // méthodes supplémentaires 
    // -------------------
    console.log($.getProvinces());
    console.log($.getAllCities());
    console.log($.getCities("Batangas")); 
}
</script>
<center>
    <div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
        <div class="card-header py-3">
            <h4 class="m-2 font-weight-bold text-primary">Ajouter un Employé</h4>
        </div>
        <a href="employee.php?action=add" type="button" class="btn btn-primary bg-gradient-primary">Retour</a>
        <div class="card-body">
            <div class="table-responsive">
                <form role="form" method="post" action="emp_transac.php?action=add">
                    <div class="form-group">
                        <input class="form-control" placeholder="Prénom" name="firstname" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Nom de Famille" name="lastname" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Email" name="email" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Numéro de téléphone" name="phonenumber" required>
                    </div>
                    <div class="form-group">
                        <?php
                        echo $opt;
                        ?>
                    </div>
                    <div class="form-group">
                        <input type="date" id="FromDate" name="hireddate" class="form-control" />
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="province" name="province" required></select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="city" name="city" required></select>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-success btn-block"><i class="fa fa-check fa-fw"></i> Enregistrer</button>
                    <button type="reset" class="btn btn-danger btn-block"><i class="fa fa-times fa-fw"></i> Réinitialiser</button>
                </form>  
            </div>
        </div>
    </div>
</center>

<?php
include '../includes/footer.php';
?>

<!-- COMMENT UTILISER POUR AFFICHER VOTRE VALEUR JUSTE POUR VÉRIFICATION
<script language='JavaScript'>
function getwords()
{
textbox = document.getElementById('FromDate');
if (textbox.value != "")
document.write("Vous avez entré : " + textbox.value)
else
alert("Aucun mot n'a été entré !");
}
</script>
<input type="button" onclick="getwords()" value="Entrer" /> -->