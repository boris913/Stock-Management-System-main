<?php
include '../includes/connection.php';
include '../includes/sidebar.php';

$query = 'SELECT ID, t.TYPE
          FROM users u
          JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = ' . $_SESSION['MEMBER_ID'] . '';
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

// OPTIONS DE SÉLECTION DES EMPLOIS
$sql = "SELECT DISTINCT JOB_TITLE, JOB_ID FROM job";
$result = mysqli_query($db, $sql) or die("Requête SQL invalide : $sql");

$opt = "<select class='form-control' name='jobs' required>
        <option value='' disabled selected>Sélectionner un rôle</option>";
while ($row = mysqli_fetch_assoc($result)) {
    $opt .= "<option value='".$row['JOB_ID']."'>".$row['JOB_TITLE']."</option>";
}

$opt .= "</select>";

$query = 'SELECT EMPLOYEE_ID, FIRST_NAME, LAST_NAME, EMAIL, PHONE_NUMBER, j.JOB_TITLE, HIRED_DATE, l.PROVINCE, l.CITY 
          FROM employee e 
          JOIN location l ON l.LOCATION_ID=e.LOCATION_ID 
          JOIN job j ON j.JOB_ID=e.JOB_ID 
          WHERE EMPLOYEE_ID =' . $_GET['id'];
$result = mysqli_query($db, $query) or die(mysqli_error($db));

while ($row = mysqli_fetch_array($result)) {   
    $zz = $row['EMPLOYEE_ID'];
    $fname = $row['FIRST_NAME'];
    $lname = $row['LAST_NAME'];
    $email = $row['EMAIL'];
    $phone = $row['PHONE_NUMBER'];
    $jobb = $row['JOB_TITLE'];
    $hdate = $row['HIRED_DATE'];
    $prov = $row['PROVINCE'];
    $cit = $row['CITY'];
}
$id = $_GET['id'];
?>
<center>
    <div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
        <div class="card-header py-3">
            <h4 class="m-2 font-weight-bold text-primary">Modifier l'Employé</h4>
        </div>
        <a type="button" class="btn btn-primary bg-gradient-primary btn-block" href="employee.php"> 
            <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Retour 
        </a>
        <div class="card-body">
            <form role="form" method="post" action="emp_edit1.php">
                <input type="hidden" name="id" value="<?php echo $zz; ?>" />
                
                <div class="form-group row text-left text-warning">
                    <div class="col-sm-3" style="padding-top: 5px;">
                        Prénom :
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" placeholder="Prénom" name="firstname" value="<?php echo $fname; ?>" required>
                    </div>
                </div>
                
                <div class="form-group row text-left text-warning">
                    <div class="col-sm-3" style="padding-top: 5px;">
                        Nom de Famille :
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" placeholder="Nom de Famille" name="lastname" value="<?php echo $lname; ?>" required>
                    </div>
                </div>
                
                <div class="form-group row text-left text-warning">
                    <div class="col-sm-3" style="padding-top: 5px;">
                        Genre :
                    </div>
                    <div class="col-sm-9">
                        <select class='form-control' name='gender' required>
                            <option value="" disabled selected hidden>Sélectionner le Genre</option>
                            <option value="Male">Masculin</option>
                            <option value="Female">Féminin</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group row text-left text-warning">
                    <div class="col-sm-3" style="padding-top: 5px;">
                        Email :
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
                    </div>
                </div>
                
                <div class="form-group row text-left text-warning">
                    <div class="col-sm-3" style="padding-top: 5px;">
                        Contact # :
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" placeholder="Numéro de Téléphone" name="phone" value="<?php echo $phone; ?>" required>
                    </div>
                </div>
                
                <div class="form-group row text-left text-warning">
                    <div class="col-sm-3" style="padding-top: 5px;">
                        Rôle :
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" placeholder="Rôle" name="jobs" value="<?php echo $jobb; ?>" disabled>
                    </div>
                </div>
                
                <div class="form-group row text-left text-warning">
                    <div class="col-sm-3" style="padding-top: 5px;">
                        Date d'Embauche :
                    </div>
                    <div class="col-sm-9">
                        <input placeholder="Date d'Embauche" type="date" id="FromDate" name="hireddate" value="<?php echo $hdate; ?>" class="form-control" required>
                    </div>
                </div>
                
                <div class="form-group row text-left text-warning">
                    <div class="col-sm-3" style="padding-top: 5px;">
                        Province :
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" placeholder="Province" name="province" value="<?php echo $prov; ?>" required>
                    </div>
                </div>
                
                <div class="form-group row text-left text-warning">
                    <div class="col-sm-3" style="padding-top: 5px;">
                        Ville / Municipalité :
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" placeholder="Ville / Municipalité" name="city" value="<?php echo $cit; ?>" required>
                    </div>
                </div>

                <hr>
                <button type="submit" class="btn btn-warning btn-block"><i class="fa fa-edit fa-fw"></i> Mettre à Jour</button>    
            </form>  
        </div>
    </div>
</center>

<?php
include '../includes/footer.php';
?>