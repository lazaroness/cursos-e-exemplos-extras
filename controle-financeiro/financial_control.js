console.log("Arquivo para os script das aplicação");

document.getElementById('description').focus();

var list = [];

function getTotalEntrada(list){
  var total = 0;
  for(var key in list){
    if(list[key].type === "E"){
      total += parseFloat(list[key].value);
    }
  }
  document.getElementById('totalEntrada').innerHTML = formatValue(total);
  return parseFloat(total);
}

function getTotalSaida(list){
  var total = 0;
  for(var key in list){
    if(list[key].type === "S"){
      total += parseFloat(list[key].value);
    }
  }
  document.getElementById('totalSaida').innerHTML = formatValue(total);
  return parseFloat(total);
}

function getTotal(list){
  var total = getTotalEntrada(list) - getTotalSaida(list);
  document.getElementById('totalValue').innerHTML = formatValue(total);
  console.log(total);
}

function formatDesc(desc){
  var str = desc;//.toLowerCase();
  str = str.charAt(0).toUpperCase() + str.slice(1);
  return str;
}

function formatValue(value){
  var str = parseFloat(value).toFixed(2) + "";
  str = str.replace(".", ",");
  str = "R$ " + str;
  return str;
}

function formatDate(date){
  var dateTimeTmp = date.split("T");
  var dateTmp     = dateTimeTmp[0].split("-")
  console.log(dateTmp);
  return dateTmp[2] + "/" + dateTmp[1] + "/" + dateTmp[0] + " " + dateTimeTmp[1] ;
}

function formatType(type){
  if(type === "E"){
    return "Entrada";
  } else {
    return "Saida";
  }
}

function setList(list){
  var table = '<thead><tr>';
  table += '<td style="text-align: center;"><strong>Descrição</strong></td>';
  table += '<td style="text-align: center;"><strong>Valor</strong></td>';
  table += '<td style="text-align: center;"><strong>Tipo</strong></td>';
  table += '<td style="text-align: center;"><strong>Data</strong></td>';
  table += '<td style="text-align: center;"><strong>Funções</strong></td>';
  table += '</tr></thead><tbody>';
  for(var key in list){
    table += '<tr>';
    table += '<td style="color: #4248f4;">'+ formatDesc(list[key].description) +'</td>';
    table += '<td style="text-align: center;">'+ formatValue(list[key].value) +'</td>';
    table += '<td style="text-align: center;color: #4248f4;">'+ formatType(list[key].type) +'</td>';
    table += '<td style="text-align: center;">'+ formatDate(list[key].date) +'</td>';
    table += '<td style="text-align: center;">';
    table += '<button class="btn btn-default" onclick="setUpdate(' + key + ');">Editar</button>';
    table += '&nbsp;'
    table += '<button class="btn btn-default" onclick="deleteData(' + key + ');">Apagar</button>';
    table += '</td>';
    table += '</tr>';
  }
  table += '</tody>';
  document.getElementById('listTable').innerHTML = table;
  getTotal(list);
  saveListStorage(list);
}

function resetForm(){
  document.getElementById('description').value = "";
  document.getElementById('value').value = "";
  document.getElementById('type').value = "";
  document.getElementById('date').value = "";
  document.getElementById('btnUpdate').style = 'display: none';
  document.getElementById('btnAdd').style = 'display: inline-block; margin-left: 72%;';
  document.getElementById('inputIdUpdate').innerHTML = "";
}

function addData(){
  var description = document.getElementById('description').value;
  var value       = document.getElementById('value').value;
  var type        = document.getElementById('type').value;
  var date        = document.getElementById('date').value;
  list.unshift({"description": description, "value": value, "type": type, "date": date});
  resetForm();
  setList(list);
}

function deleteData(id){
  if(confirm("Apagar o lançamento?")){
    if(id === list.length -1){
      list.pop();
    }else if(id === 0){
      list.shift();
    }else{
      var arrAuxIni = list.slice(0, id);
      var arrAuxEnd = list.slice(id+1);
      list = arrAuxIni.concat(arrAuxEnd);
    }
    setList(list);
  }
}

function setUpdate(id){
  var obj = list[id];
  document.getElementById('description').value = obj.description;
  document.getElementById('description').focus();
  document.getElementById('value').value = obj.value;
  document.getElementById('type').value = obj.type;
  document.getElementById('date').value = obj.date;

  document.getElementById('btnUpdate').style = 'display: inline-block';
  document.getElementById('btnAdd').style = 'display: none';

  document.getElementById('inputIdUpdate').innerHTML = '<input type="hidden" value="'+ id + '" id="idUpdate" />';
}

function updateData(){
  var id     = document.getElementById('idUpdate').value;
  var obj    = list[id];
  obj.description   = document.getElementById('description').value;
  obj.value = document.getElementById('value').value;
  obj.type  = document.getElementById('type').value;
  obj.date  = document.getElementById('date').value;
  resetForm();
  setList(list);
}

function saveListStorage(list){
  var jsonStr = JSON.stringify(list);
  localStorage.setItem("fonteEterna", jsonStr);
}

function initListStorage(){
  var testList = localStorage.getItem("fonteEterna");
  if(testList){
    list = JSON.parse(testList);
  }
  setList(list);
}

initListStorage();
