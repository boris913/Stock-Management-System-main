<?php
include('../includes/connection.php');

$zz = $_POST['id'];
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$phone = $_POST['phone'];

$query = 'UPDATE customer SET FIRST_NAME ="'.$fname.'",
          LAST_NAME ="'.$lname.'", PHONE_NUMBER="'.$phone.'" WHERE
          CUST_ID ="'.$zz.'"';
$result = mysqli_query($db, $query) or die(mysqli_error($db));
?>  

<script type="text/javascript">
    alert("Le client a été mis à jour avec succès.");
    window.location = "customer.php";
</script>