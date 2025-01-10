<?php
include('../includes/connection.php');

// Récupération et sécurisation des données
$zz = intval($_POST['id']); // ID du produit
$pc = mysqli_real_escape_string($db, $_POST['prodcode']); // Code du produit
$pname = mysqli_real_escape_string($db, $_POST['prodname']); // Nom du produit
$desc = mysqli_real_escape_string($db, $_POST['description']); // Description
$pr = floatval($_POST['price']); // Prix (assurez-vous que c'est un nombre)
$cat = intval($_POST['category']); // ID de la catégorie

// Requête de mise à jour
$query = "UPDATE product 
          SET NAME = '$pname', 
              DESCRIPTION = '$desc', 
              PRICE = '$pr', 
              CATEGORY_ID = '$cat' 
          WHERE PRODUCT_CODE = '$pc'";

$result = mysqli_query($db, $query) or die(mysqli_error($db));

// Redirection après la mise à jour
?>
<script type="text/javascript">
    alert("Produit mis à jour avec succès.");
    window.location = "product.php";
</script>