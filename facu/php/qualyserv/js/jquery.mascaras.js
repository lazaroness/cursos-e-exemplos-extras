$(document).ready(function() {

  $("#telefone").inputmask({
    mask: ["9999-9999", "9 9999-9999", ],
    keepStatic: true
  });

  $("#ddd").inputmask({
    mask: ["999", ],
    keepStatic: true
  });

  $("#data_nasc_fund").inputmask({
    mask: ["99/99/9999"],
    keepStatic: true
  });

  $("#data_fundacao").inputmask({
    mask: ["99/99/9999"],
    keepStatic: true
  });

  $("#data_previsao_inicio").inputmask({
    mask: ["99/99/9999"],
    keepStatic: true
  });

  $("#data_prev_inicio").inputmask({
    mask: ["99/99/9999"],
    keepStatic: true
  });

  $("#valor").inputmask({
    mask: ["99.99", "999.99", "9.999.99", ],
    keepStatic: true
  });

  $("#cpf_cnpj").inputmask({
    mask: ["999.999.999-99", "99.999.999/9999-99", ],
    keepStatic: true
  });

  $("#cnpj").inputmask({
    mask: ["99.999.999/9999-99",],
    keepStatic: true
  });

  $("#cep").inputmask({
    mask: ["99999-999",],
    keepStatic: true
  });

});
