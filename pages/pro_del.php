<?php
include '../includes/connection.php';

// Vérifier si la méthode GET est correcte
if (!isset($_GET['do']) || $_GET['do'] != 1) {
    switch ($_GET['type']) {
        case 'product':
            // Préparer la requête de suppression
            $productId = intval($_GET['id']); // Sécuriser l'ID du produit
            $query = 'DELETE FROM product WHERE PRODUCT_ID = ' . $productId;
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
            ?>
            <script type="text/javascript">
                alert("Produit supprimé avec succès.");
                window.location = "product.php";
            </script>
            <?php
            break; // Sortir du switch
    }
}
?>