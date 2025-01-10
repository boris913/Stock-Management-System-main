<?php
include('../includes/connection.php');
require_once('session.php');

$zz = $_POST['id'];
$a = $_POST['firstname'];
$b = $_POST['lastname'];
$c = $_POST['gender'];
$d = $_POST['username'];
$e = $_POST['password'];
$f = $_POST['email'];
$g = $_POST['phone'];
$i = $_POST['hireddate'];
$j = $_POST['province'];
$k = $_POST['city'];

$query = 'UPDATE users u 
          JOIN employee e ON e.EMPLOYEE_ID = u.EMPLOYEE_ID
          JOIN location l ON l.LOCATION_ID = e.LOCATION_ID
          SET e.FIRST_NAME = "' . $a . '", e.LAST_NAME = "' . $b . '", GENDER = "' . $c . '", USERNAME = "' . $d . '", PASSWORD = sha1("' . $e . '"), EMAIL = "' . $f . '", l.PROVINCE = "' . $j . '", l.CITY = "' . $k . '", PHONE_NUMBER = "' . $g . '", HIRED_DATE = "' . $i . '" 
          WHERE ID = "' . $zz . '"';
$result = mysqli_query($db, $query) or die(mysqli_error($db));

$sql = 'SELECT ID FROM users';
$result2 = mysqli_query($db, $sql) or die(mysqli_error($db));

while ($row = mysqli_fetch_assoc($result2)) {
    $a = $row['ID'];

    if ($_SESSION['TYPE'] == 'Admin') { ?>
        <script type="text/javascript">
            alert("Vous avez mis à jour votre compte avec succès.");
            window.location = "index.php";
        </script>
    <?php } elseif ($_SESSION['TYPE'] == 'User') { ?>
        <script type="text/javascript">
            alert("Vous avez mis à jour votre compte avec succès.");
            window.location = "pos.php";
        </script>
    <?php }
} ?>