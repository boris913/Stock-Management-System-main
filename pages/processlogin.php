<?php
require('../includes/connection.php');
require('session.php');

if (isset($_POST['btnlogin'])) {
    $users = trim($_POST['user']);
    $upass = trim($_POST['password']);
    $h_upass = sha1($upass);

    if ($upass == '') {
        ?>    
        <script type="text/javascript">
            alert("Le mot de passe est manquant !");
            window.location = "login.php";
        </script>
        <?php
    } else {
        // Création de la requête SQL             
        $sql = "SELECT ID, e.FIRST_NAME, e.LAST_NAME, e.GENDER, e.EMAIL, e.PHONE_NUMBER, j.JOB_TITLE, l.PROVINCE, l.CITY, t.TYPE
                FROM `users` u
                JOIN `employee` e ON e.EMPLOYEE_ID = u.EMPLOYEE_ID
                JOIN `location` l ON e.LOCATION_ID = l.LOCATION_ID
                JOIN `job` j ON e.JOB_ID = j.JOB_ID
                JOIN `type` t ON t.TYPE_ID = u.TYPE_ID
                WHERE `USERNAME` ='" . $users . "' AND `PASSWORD` = '" . $h_upass . "'";
        $result = $db->query($sql);

        if ($result) {
            // Vérification du nombre de résultats
            if ($result->num_rows > 0) {
                // Stockage du résultat dans un tableau
                $found_user = mysqli_fetch_array($result);
                // Remplissage des variables de session
                $_SESSION['MEMBER_ID'] = $found_user['ID']; 
                $_SESSION['FIRST_NAME'] = $found_user['FIRST_NAME']; 
                $_SESSION['LAST_NAME'] = $found_user['LAST_NAME'];  
                $_SESSION['GENDER'] = $found_user['GENDER'];
                $_SESSION['EMAIL'] = $found_user['EMAIL'];
                $_SESSION['PHONE_NUMBER'] = $found_user['PHONE_NUMBER'];
                $_SESSION['JOB_TITLE'] = $found_user['JOB_TITLE'];
                $_SESSION['PROVINCE'] = $found_user['PROVINCE']; 
                $_SESSION['CITY'] = $found_user['CITY']; 
                $_SESSION['TYPE'] = $found_user['TYPE'];
                $AAA = $_SESSION['MEMBER_ID'];

                // Vérification du type d'utilisateur
                if ($_SESSION['TYPE'] == 'Admin') {
                    ?>    
                    <script type="text/javascript">
                        alert("Bienvenue, <?php echo $_SESSION['FIRST_NAME']; ?> !");
                        window.location = "index.php";
                    </script>
                    <?php        
                } elseif ($_SESSION['TYPE'] == 'User') {
                    ?>    
                    <script type="text/javascript">
                        alert("Bienvenue, <?php echo $_SESSION['FIRST_NAME']; ?> !");
                        window.location = "pos.php";
                    </script>
                    <?php        
                }
            } else {
                // Si aucun résultat
                ?>
                <script type="text/javascript">
                    alert("Nom d'utilisateur ou mot de passe non enregistré ! Contactez votre administrateur.");
                    window.location = "index.php";
                </script>
                <?php
            }
        } else {
            echo "Erreur : " . $sql . "<br>" . $db->error;
        }
    }       
} 
$db->close();
?>