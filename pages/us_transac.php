<?php
include '../includes/connection.php';
?>
<!-- Contenu de la page -->
<div class="col-lg-12">
    <?php
    $emp = $_POST['empid'];
    $user = $_POST['username'];
    $pass = $_POST['password'];

    switch ($_GET['action']) {
        case 'add':
            $query = "INSERT INTO users
                      (ID, EMPLOYEE_ID, USERNAME, PASSWORD, TYPE_ID)
                      VALUES (NULL, '{$emp}', '{$user}', SHA1('{$pass}'), '2')";
            mysqli_query($db, $query) or die('Erreur lors de la mise à jour des utilisateurs dans ' . $query);
            break;
    }
    ?>
    <script type="text/javascript">window.location = "user.php";</script>
</div>

<?php
include '../includes/footer.php';
?>