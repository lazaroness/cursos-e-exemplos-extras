<?php
  session_destroy();
  session_unset();
  setcookie("empresa_id", ".");
  setcookie("empresa", ".");
  setcookie("cnpj", ".");
  header("Location: index.php");
?>