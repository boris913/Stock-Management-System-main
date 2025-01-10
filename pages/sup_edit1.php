<?php

include('../includes/connection.php');
$zz = $_POST['id'];
$name = $_POST['name'];
$prov = $_POST['province'];
$cit = $_POST['city'];
$phone = $_POST['phone'];

$query = 'UPDATE supplier e 
          JOIN location l ON l.LOCATION_ID = e.LOCATION_ID 
          SET COMPANY_NAME = "' . $name . '", l.PROVINCE = "' . $prov . '", l.CITY = "' . $cit . '", PHONE_NUMBER = "' . $phone . '" 
          WHERE SUPPLIER_ID = "' . $zz . '"'; 
$result = mysqli_query($db, $query) or die(mysqli_error($db));

?>	
<script type="text/javascript">
    alert("Vous avez mis à jour le fournisseur avec succès.");
    window.location = "supplier.php";
</script>