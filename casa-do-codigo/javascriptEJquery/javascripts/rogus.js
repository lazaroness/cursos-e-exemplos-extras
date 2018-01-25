$(function(){
  writeTotal(calculateTotalProducts());
  $(".quantity").change(function(){
    writeTotal(calculateTotalProducts());
  });
});

// ----------------------------------------------------------------------------
// CALCULANDO O TOTAL DO PEDIDO
// ----------------------------------------------------------------------------
function calculateTotalProducts() {
  var produtos = $(".produto");
  var total = 0;
  $(produtos).each(function(pos, produto){
    var $produto = $(produto);
    var quantity = moneyTextToFloat($produto.find(".quantity").val());
    var price    = moneyTextToFloat($produto.find(".price").text());
    total += quantity * price;
  });
  return total;
}

// ----------------------------------------------------------------------------
// CONVERTE TEXTO EM FLOAT
// ----------------------------------------------------------------------------
function moneyTextToFloat(text) {
  var cleanText = text.replace("R$", "").replace(",", ".");
  return parseFloat(cleanText);
}

// ----------------------------------------------------------------------------
// CONVERTE FLOAT EM TEXTO
// ----------------------------------------------------------------------------
function floatToMoneyText(value) {
  var text = (value < 1 ? "0" : "") + Math.floor(value * 100);
  text = "R$ " + text;
  return text.substr(0, text.length -2) + "," + text.substr(-2);
}

// ----------------------------------------------------------------------------
// RETORNA O ELEMENTO TOTAL CONVERTIDO EM FLOAT
// ----------------------------------------------------------------------------
function readTotal() {
  var total = $("#total").text();
  return moneyTextToFloat(total);
}

// ----------------------------------------------------------------------------
// ESCREVE NO ELEMENTO TOTAL
// ----------------------------------------------------------------------------
function writeTotal(value) {
  var texto = floatToMoneyText(value);
  $("#total").text(texto);
}
