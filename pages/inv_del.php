<?php
include '../includes/connection.php';

if (!isset($_GET['do']) || $_GET['do'] != 1) {
    switch ($_GET['type']) {
        case 'product':
            $query = 'DELETE FROM product WHERE PRODUCT_ID = ' . $_GET['id'];
            $result = mysqli_query($db, $query) or die(mysqli_error($db));                
            ?>
            <script type="text/javascript">
                alert("Produit supprimé avec succès.");
                window.location = "inventory.php";
            </script>					
            <?php
            //break; // Commentaire conservé au cas où une logique supplémentaire serait ajoutée
    }
}
?>