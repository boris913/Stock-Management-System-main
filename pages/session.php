<?php
// Avant de stocker les informations de notre membre, nous devons d'abord démarrer la session
session_start();

// Créer une nouvelle fonction pour vérifier si la variable de session MEMBER_ID est définie
function logged_in() {
    return isset($_SESSION['MEMBER_ID']);
}

// Cette fonction redirige vers login.php si la session membre n'est pas définie
function confirm_logged_in() {
    if (!logged_in()) {
?>
        <script type="text/javascript">
            window.location = "login.php"; // Redirection vers la page de connexion
        </script>
<?php
    }
}
?>