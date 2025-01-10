<?php
include '../includes/connection.php';
include '../includes/sidebar.php';
?><?php 

$query = 'SELECT ID, t.TYPE
          FROM users u
          JOIN type t ON t.TYPE_ID=u.TYPE_ID WHERE ID = '.$_SESSION['MEMBER_ID'].'';
$result = mysqli_query($db, $query) or die(mysqli_error($db));

while ($row = mysqli_fetch_assoc($result)) {
    $Aa = $row['TYPE'];

    if ($Aa == 'User') {
?>    
        <script type="text/javascript">
            // Redirection
            alert("Page restreinte ! Vous allez être redirigé vers le POS");
            window.location = "pos.php";
        </script>
<?php   
    }
}   
?>
<div class="row show-grid">
    <!-- Ligne Clients -->
    <div class="col-md-3">
        <!-- Enregistrement Client -->
        <div class="col-md-12 mb-3">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-0">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Clients</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                                <?php 
                                $query = "SELECT COUNT(*) FROM customer";
                                $result = mysqli_query($db, $query) or die(mysqli_error($db));
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "$row[0]";
                                }
                                ?> Enregistrement(s)
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enregistrement Fournisseur -->
        <div class="col-md-12 mb-3">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-0">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Fournisseurs</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                                <?php 
                                $query = "SELECT COUNT(*) FROM supplier";
                                $result = mysqli_query($db, $query) or die(mysqli_error($db));
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "$row[0]";
                                }
                                ?> Enregistrement(s)
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Ligne Employés -->
    <div class="col-md-3">
        <!-- Enregistrement Employé -->
        <div class="col-md-12 mb-3">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-0">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Employés</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                                <?php 
                                $query = "SELECT COUNT(*) FROM employee";
                                $result = mysqli_query($db, $query) or die(mysqli_error($db));
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "$row[0]";
                                }
                                ?> Enregistrement(s)
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Enregistrement Utilisateur -->
        <div class="col-md-12 mb-3">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-0">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Compte enregistrés</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                                <?php 
                                $query = "SELECT COUNT(*) FROM users WHERE TYPE_ID=2";
                                $result = mysqli_query($db, $query) or die(mysqli_error($db));
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "$row[0]";
                                }
                                ?> Enregistrement(s)
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Ligne Produits -->
    <div class="col-md-3">
        <!-- Enregistrement Produit -->
        <div class="col-md-12 mb-3">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-0">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Produits</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <?php 
                                        $query = "SELECT COUNT(*) FROM product";
                                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "$row[0]";
                                        }
                                        ?> Enregistrement(s)
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Nombre de Produits Vendus -->
        <div class="col-md-12 mb-3">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-0">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Produits</div>
                            <div class="h6 mb-0 font-weight-bold text-gray-800">
                                <?php 
                                $query = "SELECT SUM(NUMOFITEMS) FROM transaction";
                                $result = mysqli_query($db, $query) or die(mysqli_error($db));
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "$row[0]";
                                }
                                ?> Produit(s)Vendus
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    

    <!-- PRODUITS RÉCENTS -->
    <div class="col-lg-3">
        <div class="card shadow h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                        <i class="fa fa-th-list fa-fw"></i> 
                    </div>

                    <div class="panel-heading"> Produits récents
                    </div>
                    <div class="row no-gutters align-items-center mt-1">
                        <div class="col-auto">
                            <div class="h6 mb-0 mr-0 text-gray-800">
                                <div class="panel-body">
                                    <div class="list-group">
                                        <?php 
                                        $query = "SELECT NAME, PRODUCT_CODE FROM product order by PRODUCT_ID DESC LIMIT 10";
                                        $result = mysqli_query($db, $query) or die(mysqli_error($db));
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<a href='#' class='list-group-item text-gray-800'>
                                                  <i class='fa fa-tasks fa-fw'></i> $row[0]
                                                  </a>";
                                        }
                                        ?>
                                    </div>
                                    <a href="product.php" class="btn btn-default btn-block">Voir tous les produits</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include '../includes/footer.php';
?>