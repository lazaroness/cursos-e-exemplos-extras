$(document).ready(function() {

    // ADICIONANDO MASCARA NO CAMPO CEP
    $("#cep").mask("99999-999");
    //Essas mascaras vieram para car pois essa funcao ready estava sobrescrevendo a da pagina
    $("#telefone").mask("(99)9999-9999");
    $("#celular").mask("(99)99999-9999");
    $("#cpf").mask("999.999.999-99");
    $("#cnpj").mask("99.999.999/9999-99");

    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#rua").val("");
        $("#bairro").val("");
        $("#cidade").val("");
        $("#estado").val("");
//        $("#ibge").val("");
    }
            
    //Quando o campo cep perde o foco.
    $("#cep").blur(function() {

        //Nova variável com valor do campo "cep".
        var cep = $(this).val();

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{5}-?[0-9]{3}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#rua").val("...")
                $("#bairro").val("...")
                $("#cidade").val("...")
                $("#estado").val("...")
        //        $("#ibge").val("...")

                //Consulta o webservice viacep.com.br/
                $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#rua").val(dados.logradouro);
                        $("#bairro").val(dados.bairro);
                        $("#cidade").val(dados.localidade);
                        $("#estado").val(dados.uf);
//                        $("#ibge").val(dados.ibge);
                    } else {
                    //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        alert("CEP não encontrado.");
                    }
                });
            } else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            } //end if.
        } else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    });
});