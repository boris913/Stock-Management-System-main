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

$query2 = 'SELECT ID, e.FIRST_NAME, e.LAST_NAME, e.GENDER, USERNAME, PASSWORD, e.EMAIL, PHONE_NUMBER, j.JOB_TITLE, e.HIRED_DATE, t.TYPE, l.PROVINCE, l.CITY
           FROM users u
           JOIN employee e ON u.EMPLOYEE_ID = e.EMPLOYEE_ID
           JOIN job j ON e.JOB_ID = j.JOB_ID
           JOIN location l ON e.LOCATION_ID = l.LOCATION_ID
           JOIN type t ON u.TYPE_ID = t.TYPE_ID
           WHERE ID = ' . $_GET['id'];

$result2 = mysqli_query($db, $query2) or die(mysqli_error($db));

while ($row = mysqli_fetch_array($result2)) {   
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
        <h4 class="m-2 font-weight-bold text-primary"><?php echo $a; ?> Détails</h4>
    </div>
    <a href="user.php?action=add" type="button" class="btn btn-primary bg-gradient-primary">Retour</a>
    <div class="card-body">
        <div class="form-group row text-left">
            <div class="col-sm-3 text-primary">
                <h5>
                    Nom Complet<br>
                </h5>
            </div>
            <div class="col-sm-9">
                <h5>
                    : <?php echo $a; ?> <?php echo $b; ?> <br>
                </h5>
            </div>
        </div>
        <div class="form-group row text-left">
            <div class="col-sm-3 text-primary">
                <h5>
                    Genre<br>
                </h5>
            </div>
            <div class="col-sm-9">
                <h5>
                    : <?php echo $c; ?> <br>
                </h5>
            </div>
        </div>
        <div class="form-group row text-left">
            <div class="col-sm-3 text-primary">
                <h5>
                    Nom d'utilisateur<br>
                </h5>
            </div>
            <div class="col-sm-9">
                <h5>
                    : <?php echo $d; ?> <br>
                </h5>
            </div>
        </div>
        <div class="form-group row text-left">
            <div class="col-sm-3 text-primary">
                <h5>
                    Email<br>
                </h5>
            </div>
            <div class="col-sm-9">
                <h5>
                    : <?php echo $f; ?> <br>
                </h5>
            </div>
        </div>
        <div class="form-group row text-left">
            <div class="col-sm-3 text-primary">
                <h5>
                    Numéro de contact<br>
                </h5>
            </div>
            <div class="col-sm-9">
                <h5>
                    : <?php echo $g; ?> <br>
                </h5>
            </div>
        </div>
        <div class="form-group row text-left">
            <div class="col-sm-3 text-primary">
                <h5>
                    Rôle<br>
                </h5>
            </div>
            <div class="col-sm-9">
                <h5>
                    : <?php echo $h; ?> <br>
                </h5>
            </div>
        </div>
        <div class="form-group row text-left">
            <div class="col-sm-3 text-primary">
                <h5>
                    Date d'embauche<br>
                </h5>
            </div>
            <div class="col-sm-9">
                <h5>
                    : <?php echo $i; ?> <br>
                </h5>
            </div>
        </div>
        <div class="form-group row text-left">
            <div class="col-sm-3 text-primary">
                <h5>
                    Province<br>
                </h5>
            </div>
            <div class="col-sm-9">
                <h5>
                    : <?php echo $j; ?> <br>
                </h5>
            </div>
        </div>
        <div class="form-group row text-left">
            <div class="col-sm-3 text-primary">
                <h5>
                    Ville / Municipalité<br>
                </h5>
            </div>
            <div class="col-sm-9">
                <h5>
                    : <?php echo $k; ?> <br>
                </h5>
            </div>
        </div>
        <div class="form-group row text-left">
            <div class="col-sm-3 text-primary">
                <h5>
                    Type de compte<br>
                </h5>
            </div>
            <div class="col-sm-9">
                <h5>
                    : <?php echo $l; ?> <br>
                </h5>
            </div>
        </div>
    </div>
</div>
</center>

<?php
include '../includes/footer.php';
?>