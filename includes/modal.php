<!-- Sélection d'employé et script -->
<?php
$sqlforjob = "SELECT DISTINCT JOB_TITLE, JOB_ID FROM job order by JOB_ID asc";
$result = mysqli_query($db, $sqlforjob) or die("Mauvaise requête SQL : $sqlforjob");

$job = "<select class='form-control' name='jobs' required>
        <option value='' disabled selected hidden>Sélectionner un poste</option>";
while ($row = mysqli_fetch_assoc($result)) {
    $job .= "<option value='".$row['JOB_ID']."'>".$row['JOB_TITLE']."</option>";
}

$job .= "</select>";
?>
<script>  
window.onload = function() {  
  // ---------------
  // utilisation de base
  // ---------------
  var $ = new City();
  $.showProvinces("#province");
  $.showCities("#city");

  // ------------------
  // méthodes supplémentaires 
  // -------------------

  // renvoie toutes les provinces 
  console.log($.getProvinces());
  
  // renvoie toutes les villes 
  console.log($.getAllCities());
  
  // renvoie toutes les villes sous une province spécifique (ex. Batangas)
  console.log($.getCities("Batangas")); 
  
}
</script>
<!-- fin de la sélection d'employé et script -->

<!-- Modal de déconnexion-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Prêt à partir ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body"><?php echo $_SESSION['FIRST_NAME']; ?>, êtes-vous sûr de vouloir vous déconnecter ?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                <a class="btn btn-primary" href="logout.php">Déconnexion</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Client-->
<div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un client</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" method="post" action="cust_transac.php?action=add">
                    <div class="form-group">
                        <input class="form-control" placeholder="Prénom" name="firstname" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Nom de famille" name="lastname" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Numéro de téléphone" name="phonenumber" required>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Enregistrer</button>
                    <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Réinitialiser</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>      
                </form>  
            </div>
        </div>
    </div>
</div>

<!-- Modal Client POS-->
<div class="modal fade" id="poscustomerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un client</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" method="post" action="cust_pos_trans.php?action=add">
                    <div class="form-group">
                        <input class="form-control" placeholder="Prénom" name="firstname" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Nom de famille" name="lastname" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Numéro de téléphone" name="phonenumber" required>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Enregistrer</button>
                    <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Réinitialiser</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>      
                </form>  
            </div>
        </div>
    </div>
</div>

<!-- Modal Employé-->
<div class="modal fade" id="employeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un employé</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" method="post" action="emp_transac.php?action=add">          
                    <div class="form-group">
                        <input class="form-control" placeholder="Prénom" name="firstname" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Nom de famille" name="lastname" required>
                    </div>
                    <div class="form-group">
                        <select class='form-control' name='gender' required>
                            <option value="" disabled selected hidden>Sélectionner le genre</option>
                            <option value="Male">Homme</option>
                            <option value="Female">Femme</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Email" name="email" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="Numéro de téléphone" name="phonenumber" required>
                    </div>
                    <div class="form-group">
                        <?php
                        echo $job;
                        ?>
                    </div>
                    <div class="form-group">
                        <input placeholder="Date d'embauche" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="FromDate" name="hireddate" class="form-control" />
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="province" placeholder="Province" name="province" required></select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" id="city" placeholder="Ville" name="city" required></select>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check fa-fw"></i>Enregistrer</button>
                    <button type="reset" class="btn btn-danger"><i class="fa fa-times fa-fw"></i>Réinitialiser</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>      
                </form>  
            </div>
        </div>
    </div>
</div>

<!-- Modal de suppression-->
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="DeleteModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmer la suppression</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Êtes-vous sûr de vouloir supprimer ?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                <a class="btn btn-danger btn-ok">Supprimer</a>
            </div>
        </div>
    </div>
</div>
<script>
    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        
        $('.debug-url').html('URL de suppression : <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
    });
</script>