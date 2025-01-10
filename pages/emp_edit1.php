<?php

include '../includes/connection.php';

$zz = $_POST['id'];
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$gen = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$hdate = $_POST['hireddate'];
$prov = $_POST['province'];
$cit = $_POST['city'];

$query = 'UPDATE employee e 
          JOIN location l ON l.LOCATION_ID = e.LOCATION_ID 
          SET FIRST_NAME = "' . $fname . '",
              LAST_NAME = "' . $lname . '",
              GENDER = "' . $gen . '", 
              EMAIL = "' . $email . '", 
              PHONE_NUMBER = "' . $phone . '", 
              HIRED_DATE = "' . $hdate . '", 
              l.PROVINCE = "' . $prov . '", 
              l.CITY = "' . $cit . '" 
          WHERE EMPLOYEE_ID = "' . $zz . '"';

$result = mysqli_query($db, $query) or die(mysqli_error($db));

?>
<script type="text/javascript">
    alert("Vous avez mis à jour l'employé avec succès.");
    window.location = "employee.php";
</script>