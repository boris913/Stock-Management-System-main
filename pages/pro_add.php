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
        exit; // Arrête l'exécution du script après redirection
    }
}

// Récupérer les catégories
$sql = "SELECT DISTINCT CNAME, CATEGORY_ID FROM category ORDER BY CNAME ASC";
$result = mysqli_query($db, $sql) or die("Erreur SQL : $sql");

$categoryOptions = "<select class='form-control' name='category'>
                    <option disabled selected>Sélectionner une catégorie</option>";
while ($row = mysqli_fetch_assoc($result)) {
    $categoryOptions .= "<option value='" . $row['CATEGORY_ID'] . "'>" . $row['CNAME'] . "</option>";
}
$categoryOptions .= "</select>";

// Récupérer les fournisseurs
$sql2 = "SELECT DISTINCT SUPPLIER_ID, COMPANY_NAME FROM supplier ORDER BY COMPANY_NAME ASC";
$result2 = mysqli_query($db, $sql2) or die("Erreur SQL : $sql2");

$supplierOptions = "<select class='form-control' name='supplier'>
                    <option disabled selected>Sélectionner un fournisseur</option>";
while ($row = mysqli_fetch_assoc($result2)) {
    $supplierOptions .= "<option value='" . $row['SUPPLIER_ID'] . "'>" . $row['COMPANY_NAME'] . "</option>";
}
$supplierOptions .= "</select>";
?>
<center>
    <div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
        <div class="card-header py-3">
            <h4 class="m-2 font-weight-bold text-primary">Ajouter un produit</h4>
        </div>
        <a href="product.php?action=add" class="btn btn-primary bg-gradient-primary">Retour</a>
        <div class="card-body">
            <div class="table-responsive">
                <form role="form" method="post" action="pro_transac.php?action=add">
                    <div class="form-group">
                        <input class="form-control" placeholder="Code produit" name="prodcode" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Nom" name="name" required>
                    </div>
                    <div class="form-group">
                        <textarea rows="5" class="form-control" placeholder="Description" name="description" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="number" min="1" max="999999999" class="form-control" placeholder="Quantité" name="quantity" required>
                    </div>
                    <div class="form-group">
                        <input type="number" min="1" max="999999999" class="form-control" placeholder="En stock" name="onhand" required>
                    </div>
                    <div class="form-group">
                        <input type="number" min="1" max="9999999999" class="form-control" placeholder="Prix" name="price" required>
                    </div>
                    <div class="form-group">
                        <?php echo $categoryOptions; ?>
                    </div>
                    <div class="form-group">
                        <?php echo $supplierOptions; ?>
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" placeholder="Date d'entrée en stock" name="datestock" required>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-success btn-block"><i class="fa fa-check fa-fw"></i> Enregistrer</button>
                    <button type="reset" class="btn btn-danger btn-block"><i class="fa fa-times fa-fw"></i> Réinitialiser</button>
                </form>
            </div>
        </div>
    </div>
</center>

<?php
include '../includes/footer.php';
?>