<?php
include '../includes/connection.php';
include '../includes/sidebar.php';
?> 

<?php 
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
            alert("Page restreinte ! Vous serez redirigé vers le TPV");
            window.location = "pos.php";
        </script>
<?php
    }               
}   
?>
<!-- Contenu de la Page -->
<div class="col-lg-12">
    <?php
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $pn = $_POST['phonenumber'];

    switch ($_GET['action']) {
        case 'add':     
            $query = "INSERT INTO customer
                      (CUST_ID, FIRST_NAME, LAST_NAME, PHONE_NUMBER)
                      VALUES (Null, '{$fname}', '{$lname}', '{$pn}')";
            mysqli_query($db, $query) or die ('Erreur lors de la mise à jour de la base de données');
            break;
    }
    ?>
    <script type="text/javascript">
        alert("Client ajouté avec succès.");
        window.location = "pos.php";
    </script>
</div>

<?php
include '../includes/footer.php';
?>