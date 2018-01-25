<?php
  session_destroy();
  session_unset();
  setcookie("usuario_id", ".");
  setcookie("usuario", ".");
  header("Location: index.php");
?>
