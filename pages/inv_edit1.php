<?php

include('../includes/connection.php');

$zz = $_POST['idd'];
$a = $_POST['qty'];
$b = $_POST['oh'];

$query = 'UPDATE product SET QTY_STOCK = "' . $a . '", ON_HAND = "' . $b . '" WHERE PRODUCT_ID = "' . $zz . '"';
$result = mysqli_query($db, $query) or die(mysqli_error($db));
?>	
<script type="text/javascript">
    alert("Vous avez mis à jour le produit avec succès.");
    window.location = "inventory.php";
</script>