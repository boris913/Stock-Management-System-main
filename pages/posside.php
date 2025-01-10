<!-- PARTIE LATÉRALE POUR LE RÉSUMÉ -->
<div class="card-body col-md-3">
<?php   
if (!empty($_SESSION['pointofsale'])):  
    $total = 0;  

    foreach ($_SESSION['pointofsale'] as $key => $product): 
?>  
<?php  
        $total += ($product['quantity'] * $product['price']);
        $lessvat = ($total / 1.12) * 0.12;
        $netvat = ($total / 1.12);
        $addvat = ($total / 1.12) * 0.12;
    endforeach;

// DROPDOWN POUR LE CLIENT
$sql = "SELECT CUST_ID, FIRST_NAME, LAST_NAME
        FROM customer
        ORDER BY FIRST_NAME ASC";
$res = mysqli_query($db, $sql) or die("Erreur SQL : $sql");

$opt = "<select class='form-control' style='border-radius: 0px;' name='customer' required>
        <option value='' disabled selected hidden>Sélectionner un client</option>";
while ($row = mysqli_fetch_assoc($res)) {
    $opt .= "<option value='" . $row['CUST_ID'] . "'>" . $row['FIRST_NAME'] . ' ' . $row['LAST_NAME'] . "</option>";
}
$opt .= "</select>";
// FIN DU DROPDOWN
?>  
<?php 
    echo "La date d'aujourd'hui est : "; 
    $today = date("Y-m-d H:i a"); 
    echo $today; 
?> 
<input type="hidden" name="date" value="<?php echo $today; ?>">
<div class="form-group row text-left mb-3">
    <div class="col-sm-12 text-primary btn-group">
        <?php echo $opt; ?>
        <a href="#" data-toggle="modal" data-target="#poscustomerModal" type="button" class="btn btn-primary bg-gradient-primary" style="border-radius: 0px;">
            <i class="fas fa-fw fa-plus"></i>
        </a>
    </div>
</div>

<div class="form-group row mb-2">
    <div class="col-sm-5 text-left text-primary py-2">
        <h6>Subtotal</h6>
    </div>
    <div class="col-sm-7">
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text">$</span>
            </div>
            <input type="text" class="form-control text-right" value="<?php echo number_format($total, 2); ?>" readonly name="subtotal">
        </div>
    </div>
</div>

<div class="form-group row mb-2">
    <div class="col-sm-5 text-left text-primary py-2">
        <h6>Moins TVA</h6>
    </div>
    <div class="col-sm-7">
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text">$</span>
            </div>
            <input type="text" class="form-control text-right" value="<?php echo number_format($lessvat, 2); ?>" readonly name="lessvat">
        </div>
    </div>
</div>

<div class="form-group row mb-2">
    <div class="col-sm-5 text-left text-primary py-2">
        <h6>Net de la TVA</h6>
    </div>
    <div class="col-sm-7">
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text">$</span>
            </div>
            <input type="text" class="form-control text-right" value="<?php echo number_format($netvat, 2); ?>" readonly name="netvat">
        </div>
    </div>
</div>

<div class="form-group row mb-2">
    <div class="col-sm-5 text-left text-primary py-2">
        <h6>Ajouter TVA</h6>
    </div>
    <div class="col-sm-7">
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text">$</span>
            </div>
            <input type="text" class="form-control text-right" value="<?php echo number_format($addvat, 2); ?>" readonly name="addvat">
        </div>
    </div>
</div>

<div class="form-group row text-left mb-2">
    <div class="col-sm-5 text-primary">
        <h6 class="font-weight-bold py-2">Total</h6>
    </div>
    <div class="col-sm-7">
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text">$</span>
            </div>
            <input type="text" class="form-control text-right" value="<?php echo number_format($total, 2); ?>" readonly name="total">
        </div>
    </div>
</div>

<?php endif; ?>       
<button type="button" class="btn btn-block btn-success" data-toggle="modal" data-target="#posMODAL">SOUMETTRE</button>

<!-- Modal -->
<div class="modal fade" id="posMODAL" tabindex="-1" role="dialog" aria-labelledby="POS" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">RÉSUMÉ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row text-left mb-2">
                    <div class="col-sm-12 text-center">
                        <h3 class="py-0">TOTAL GLOBAL</h3>
                        <h3 class="font-weight-bold py-3 bg-light">$ <?php echo number_format($total, 2); ?></h3>
                    </div>
                </div>

                <div class="col-sm-12 mb-2">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                        </div>
                        <input class="form-control text-right" id="txtNumber" onkeypress="return isNumberKey(event)" type="text" name="cash" placeholder="ENTRER L'ESPECIMEN" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-block">PASSER AU PAIEMENT</button>
            </div>
        </div>
    </div>
</div>
<!-- FIN DU Modal -->

</form>
</div> <!-- FIN DU CORPS DE LA CARTE -->

</div>