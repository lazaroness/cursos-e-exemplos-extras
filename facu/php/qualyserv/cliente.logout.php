<?php
  session_destroy();
  session_unset();
  setcookie("cliente_id", ".");
  setcookie("cliente", ".");
  setcookie("tipo", ".");
  header("Location: index.php");
?>