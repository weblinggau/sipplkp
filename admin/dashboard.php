<?php

  session_start();
  if (!isset($_SESSION["login"])) {
    header("Location: ..");
  }
  include '../templates/header.php';
  include '../templates/sidebarAdmin.php';

?>

<!-- main content -->

<?php include '../templates/footer.php'; ?>