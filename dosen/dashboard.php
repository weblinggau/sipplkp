<?php

  session_start();
  if (!isset($_SESSION["login"])) {
    header("Location: ..");
  }
  include '../templates/header.php';
  include '../templates/sidebarDosen.php';

?>

<!-- main content -->

<?php include '../templates/footer.php'; ?>