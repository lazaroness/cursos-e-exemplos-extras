<?php
  include 'base.php';
  include 'topo.php';
  include 'menu.php';
?>
<div id='base_corpo'>
  <?php
    if(isset($_REQUEST['msg'])):
      echo "<div id='msg' style='width: 100%; height: auto;'>";
        echo "<img src='{$img}alerta.png' />&nbsp;&nbsp;{$_REQUEST['msg']}";
      echo "</div>";
      echo "<script>";
        echo "$('#msg').effect('pulsate');"; 
      echo "</script>";
    endif;
  ?>
  <div id="tabs">
    <ul>
      <li><a href="#aba-1">Cliente</a></li>
      <li><a href="#aba-2">Empresa</a></li>
      <li><a href="#aba-3">Admin</a></li>
    </ul>
    <div id="aba-1">
      <?php include 'cliente_login.php'; ?>
    </div>
    <div id="aba-2">
      <?php include 'empresa_login.php'; ?>
    </div>
    <div id="aba-3">
      <?php include 'admin_login.php'; ?>
    </div>
  </div>
  <script>
    $(function() {
      $( "#tabs" ).tabs();
    });
  </script>
</div>
<?php
  include 'rodape.php';
?>
