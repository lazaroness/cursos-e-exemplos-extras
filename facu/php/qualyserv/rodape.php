<div id='rodape'>
  <?php
    if(date('Y') != 2016):
      echo "Copyright&nbsp;&copy;&nbsp;2016&nbsp;-&nbsp;".date('Y')."&nbsp;".$config->system_name;
    else:
      echo "Copyright&nbsp;&copy;&nbsp;".date('Y')."&nbsp;".$config->system_name;
    endif;
  ?>
</div>
</body>
</html>
