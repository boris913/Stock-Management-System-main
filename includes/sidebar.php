<?php
  require('session.php');
  confirm_logged_in();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <style type="text/css">
#overlay {
  position: fixed;
  display: none;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.5);
  z-index: 2;
  cursor: pointer;
}
#text {
  position: absolute;
  top: 50%;
  left: 50%;
  font-size: 50px;
  color: white;
  transform: translate(-50%,-50%);
  -ms-transform: translate(-50%,-50%);
}
</style>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Système de Gestion de Contrôle des Stocks</title>
  <link rel="icon" href="https://www.freeiconspng.com/uploads/sales-icon-7.png">

  <!-- Fonts personnalisés pour ce modèle-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Styles personnalisés pour ce modèle-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Styles personnalisés pour cette page -->
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
          
  <!-- Wrapper de la page -->
  <div id="wrapper">

    <!-- Barre latérale -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Barre latérale - Marque -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Système de Contrôle des Stocks</div>
      </a>

      <!-- Séparateur -->
      <hr class="sidebar-divider my-0">

      <!-- Éléments de navigation - Tableau de bord -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-home"></i>
          <span>Accueil</span></a>
      </li>
      <!-- Séparateur -->
      <hr class="sidebar-divider">

      <!-- Titre -->
      <div class="sidebar-heading">
        Général
      </div>
      <!-- Boutons de Tableaux -->
      <li class="nav-item">
        <a class="nav-link" href="customer.php">
          <i class="fas fa-fw fa-user"></i>
          <span>Client</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="employee.php">
          <i class="fas fa-fw fa-user"></i>
          <span>Employé</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="product.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Produit</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="inventory.php">
          <i class="fas fa-fw fa-archive"></i>
          <span>Inventaire</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="transaction.php">
          <i class="fas fa-fw fa-retweet"></i>
          <span>Transaction</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="supplier.php">
          <i class="fas fa-fw fa-cogs"></i>
          <span>Fournisseur</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="user.php">
          <i class="fas fa-fw fa-users"></i>
          <span>Comptes</span></a>
      </li>
      <!-- Séparateur -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Basculateur de la barre latérale -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- Fin de la barre latérale -->
    <?php include_once 'topbar.php'; ?>