<?php
include '../includes/connection.php';
include '../includes/sidebar.php';

// Vérification du type d'utilisateur
$query = 'SELECT ID, t.TYPE
          FROM users u
          JOIN type t ON t.TYPE_ID = u.TYPE_ID 
          WHERE ID = ' . $_SESSION['MEMBER_ID'];
$result = mysqli_query($db, $query) or die(mysqli_error($db));

while ($row = mysqli_fetch_assoc($result)) {
    $userType = $row['TYPE'];
    
    if ($userType == 'User') {
?>
        <script type="text/javascript">
            alert("Page restreinte ! Vous serez redirigé vers POS");
            window.location = "pos.php";
        </script>
<?php
        exit; // Arrêter l'exécution après la redirection
    }
}

// Récupérer les catégories
$sql = "SELECT DISTINCT CNAME, CATEGORY_ID FROM category ORDER BY CNAME ASC";
$result = mysqli_query($db, $sql) or die("Erreur SQL : $sql");

$categoryOptions = "<select class='form-control' name='category' required>
                    <option value='' disabled selected hidden>Sélectionner une catégorie</option>";
while ($row = mysqli_fetch_assoc($result)) {
    $categoryOptions .= "<option value='" . $row['CATEGORY_ID'] . "'>" . $row['CNAME'] . "</option>";
}
$categoryOptions .= "</select>";

// Récupérer les informations du produit
$productQuery = 'SELECT PRODUCT_ID, PRODUCT_CODE, NAME, DESCRIPTION, QTY_STOCK, PRICE, c.CNAME 
                 FROM product p 
                 JOIN category c ON p.CATEGORY_ID = c.CATEGORY_ID 
                 WHERE PRODUCT_ID = ' . intval($_GET['id']);
$result = mysqli_query($db, $productQuery) or die(mysqli_error($db));

$productData = mysqli_fetch_assoc($result);
if ($productData) {
    $productId = $productData['PRODUCT_ID'];
    $productCode = $productData['PRODUCT_CODE'];
    $productName = $productData['NAME'];
    $description = $productData['DESCRIPTION'];
    $price = $productData['PRICE'];
    $categoryName = $productData['CNAME'];
}
?>
<center>
    <div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
        <div class="card-header py-3">
            <h4 class="m-2 font-weight-bold text-primary">Modifier le produit</h4>
        </div>
        <a href="product.php?action=add" class="btn btn-primary bg-gradient-primary">Retour</a>
        <div class="card-body">
            <form role="form" method="post" action="pro_edit1.php">
                <input type="hidden" name="id" value="<?php echo $productId; ?>" />
                <div class="form-group row text-left text-warning">
                    <label class="col-sm-3" style="padding-top: 5px;">Code produit :</label>
                    <div class="col-sm-9">
                        <input class="form-control" placeholder="Code produit" name="prodcode" value="<?php echo $productCode; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row text-left text-warning">
                    <label class="col-sm-3" style="padding-top: 5px;">Nom du produit :</label>
                    <div class="col-sm-9">
                        <input class="form-control" placeholder="Nom du produit" name="prodname" value="<?php echo $productName; ?>" required>
                    </div>
                </div>
                <div class="form-group row text-left text-warning">
                    <label class="col-sm-3" style="padding-top: 5px;">Description :</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" placeholder="Description" name="description"><?php echo $description; ?></textarea>
                    </div>
                </div>
                <div class="form-group row text-left text-warning">
                    <label class="col-sm-3" style="padding-top: 5px;">Prix :</label>
                    <div class="col-sm-9">
                        <input class="form-control" placeholder="Prix" name="price" value="<?php echo $price; ?>" required>
                    </div>
                </div>
                <div class="form-group row text-left text-warning">
                    <label class="col-sm-3" style="padding-top: 5px;">Catégorie :</label>
                    <div class="col-sm-9">
                        <?php echo $categoryOptions; ?>
                    </div>
                </div>
                <hr>
                <button type="submit" class="btn btn-warning btn-block"><i class="fa fa-edit fa-fw"></i> Mettre à jour</button>
            </form>  
        </div>
    </div>
</center>

<?php
include '../includes/footer.php';
?>