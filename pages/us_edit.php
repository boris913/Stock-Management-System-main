<?php
include '../includes/connection.php';
include '../includes/sidebar.php';

$query = 'SELECT ID, t.TYPE
          FROM users u
          JOIN type t ON t.TYPE_ID = u.TYPE_ID WHERE ID = ' . $_SESSION['MEMBER_ID'];
$result = mysqli_query($db, $query) or die(mysqli_error($db));

while ($row = mysqli_fetch_assoc($result)) {
    $Aa = $row['TYPE'];

    if ($Aa == 'User') {
?>
        <script type="text/javascript">
            // Redirection
            alert("Page restreinte ! Vous allez être redirigé vers POS");
            window.location = "pos.php";
        </script>
<?php
    }           
}

// JOB SELECT OPTION TAB
$sql = "SELECT DISTINCT TYPE, TYPE_ID FROM type";
$result = mysqli_query($db, $sql) or die("Mauvaise requête SQL : $sql");

$opt = "<select class='form-control' name='type'>";
while ($row = mysqli_fetch_assoc($result)) {
    $opt .= "<option value='" . $row['TYPE_ID'] . "'>" . $row['TYPE'] . "</option>";
}
$opt .= "</select>";

$query = "SELECT ID, e.FIRST_NAME, e.LAST_NAME, e.GENDER, USERNAME, PASSWORD, e.EMAIL, PHONE_NUMBER, j.JOB_TITLE, e.HIRED_DATE, t.TYPE, l.PROVINCE, l.CITY
          FROM users u
          JOIN employee e ON u.EMPLOYEE_ID = e.EMPLOYEE_ID
          JOIN job j ON e.JOB_ID = j.JOB_ID
          JOIN location l ON e.LOCATION_ID = l.LOCATION_ID
          JOIN type t ON u.TYPE_ID = t.TYPE_ID
          WHERE ID =" . $_GET['id'];
$result = mysqli_query($db, $query) or die(mysqli_error($db));

while ($row = mysqli_fetch_array($result)) {  
    $zz = $row['ID'];
    $a = $row['FIRST_NAME'];
    $b = $row['LAST_NAME'];
    $c = $row['GENDER'];
    $d = $row['USERNAME'];
    $e = $row['PASSWORD'];
    $f = $row['EMAIL'];
    $g = $row['PHONE_NUMBER'];
    $h = $row['JOB_TITLE'];
    $i = $row['HIRED_DATE'];
    $j = $row['PROVINCE'];
    $k = $row['CITY'];
    $l = $row['TYPE'];
}

$id = $_GET['id'];
?>

<center>
<div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
    <div class="card-header py-3">
        <h4 class="m-2 font-weight-bold text-primary">Modifier le compte utilisateur</h4>
    </div>
    <a type="button" class="btn btn-primary bg-gradient-primary btn-block" href="user.php?">
        <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Retour 
    </a>
    <div class="card-body">
        <form role="form" method="post" action="us_edit1.php">
            <input type="hidden" name="id" value="<?php echo $zz; ?>" />

            <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                    Prénom :
                </div>
                <div class="col-sm-9">
                    <input class="form-control" placeholder="Prénom" name="firstname" value="<?php echo $a; ?>" required>
                </div>
            </div>
            <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                    Nom de famille :
                </div>
                <div class="col-sm-9">
                    <input class="form-control" placeholder="Nom de famille" name="lastname" value="<?php echo $b; ?>" required>
                </div>
            </div>
            <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                    Genre :
                </div>
                <div class="col-sm-9">
                    <select class='form-control' name='gender' required>
                        <option value="" disabled selected hidden>Sélectionner le genre</option>
                        <option value="Male">Homme</option>
                        <option value="Female">Femme</option>
                    </select>
                </div>
            </div>
            <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                    Nom d'utilisateur :
                </div>
                <div class="col-sm-9">
                    <input class="form-control" placeholder="Nom d'utilisateur" name="username" value="<?php echo $d; ?>" required>
                </div>
            </div>
            <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                    Mot de passe :
                </div>
                <div class="col-sm-9">
                    <input type="password" class="form-control" placeholder="Mot de passe" name="password" value="" required>
                </div>
            </div>
            <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                    Email :
                </div>
                <div class="col-sm-9">
                    <input class="form-control" placeholder="Email" name="email" value="<?php echo $f; ?>" required>
                </div>
            </div>
            <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                    Numéro de contact :
                </div>
                <div class="col-sm-9">
                    <input class="form-control" placeholder="Numéro de contact" name="phone" value="<?php echo $g; ?>" required>
                </div>
            </div>
            <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                    Rôle :
                </div>
                <div class="col-sm-9">
                    <input class="form-control" placeholder="Rôle" name="role" value="<?php echo $h; ?>" readonly>
                </div>
            </div>
            <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                    Date d'embauche :
                </div>
                <div class="col-sm-9">
                    <input class="form-control" placeholder="Date d'embauche" name="hireddate" value="<?php echo $i; ?>" required>
                </div>
            </div>
            <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                    Province :
                </div>
                <div class="col-sm-9">
                    <input class="form-control" placeholder="Province" name="province" value="<?php echo $j; ?>" required>
                </div>
            </div>
            <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                    Ville / Municipalité :
                </div>
                <div class="col-sm-9">
                    <input class="form-control" placeholder="Ville / Municipalité" name="city" value="<?php echo $k; ?>" required>
                </div>
            </div>
            <div class="form-group row text-left text-warning">
                <div class="col-sm-3" style="padding-top: 5px;">
                    Type de compte :
                </div>
                <div class="col-sm-9">
                    <input class="form-control" placeholder="Type de compte" name="type" value="<?php echo $l; ?>" readonly>
                </div>
            </div>
            <hr>

            <button type="submit" class="btn btn-warning btn-block"><i class="fa fa-edit fa-fw"></i>Mettre à jour</button>    
        </form>  
    </div>
</div>
</center>

<?php
include '../includes/footer.php';
?>