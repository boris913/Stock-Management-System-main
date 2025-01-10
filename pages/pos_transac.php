<?php
include '../includes/connection.php';

session_start();

$date = $_POST['date'];
$customer = $_POST['customer'];
$subtotal = $_POST['subtotal'];
$lessvat = $_POST['lessvat'];
$netvat = $_POST['netvat'];
$addvat = $_POST['addvat'];
$total = $_POST['total'];
$cash = $_POST['cash'];
$emp = $_POST['employee'];
$rol = $_POST['role'];
// Génération d'un identifiant unique pour la transaction
$today = date("mdGis"); 

$countID = count($_POST['name']);

switch ($_GET['action']) {
    case 'add':  
        for ($i = 1; $i <= $countID; $i++) {
            $query = "INSERT INTO `transaction_details`
                       (`ID`, `TRANS_D_ID`, `PRODUCTS`, `QTY`, `PRICE`, `EMPLOYEE`, `ROLE`)
                       VALUES (Null, '{$today}', '" . $_POST['name'][$i - 1] . "', '" . $_POST['quantity'][$i - 1] . "', '" . $_POST['price'][$i - 1] . "', '{$emp}', '{$rol}')";

            mysqli_query($db, $query) or die(mysqli_error($db));
        }

        $query111 = "INSERT INTO `transaction`
                     (`TRANS_ID`, `CUST_ID`, `NUMOFITEMS`, `SUBTOTAL`, `LESSVAT`, `NETVAT`, `ADDVAT`, `GRANDTOTAL`, `CASH`, `DATE`, `TRANS_D_ID`)
                     VALUES (Null, '{$customer}', '{$countID}', '{$subtotal}', '{$lessvat}', '{$netvat}', '{$addvat}', '{$total}', '{$cash}', '{$date}', '{$today}')";
        mysqli_query($db, $query111) or die(mysqli_error($db));

        break;
}

unset($_SESSION['pointofsale']);
?>
<script type="text/javascript">
    alert("Succès.");
    window.location = "pos.php";
</script>