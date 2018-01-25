<?php
  # Verifica se a variavel enviada está vazia
  function is_blank($value) {
    if(empty($value)):
      return 'sim';
    else:
      return 'nao';
    endif;
  }
?>
