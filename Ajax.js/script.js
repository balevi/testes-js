
function mostra(){
var ajax = new XMLHttpRequest();

ajax.open("GET", "lista.php");

ajax.responseType = "json";

ajax.send();

ajax.addEventListener("readystatechange",function(){

   if (ajax.readyState == 4 && ajax.status == 200){
        //console.log(ajax);
        //alert('deu certo');
        var resposta = ajax.response;
        //console.log(resposta[1].id);  
        var lista = document.querySelector("#lista");
         lista.innerHTML = "";
       // var tr = document.createElement('tr');
       // var td = tr.appendChild(document.createElement('td'));
       // td.innerHTML = 'newBowler';
       // lista.appendChild(td);
        
        for(var i=0; i < resposta.length; i++){
            lista.innerHTML += "<tr> <td> "+resposta[i].Tipo+" </td> <td> "+resposta[i].Telefone+" </td> <td> "+resposta[i].Datainicio+" </td> <td> "+resposta[i].Datadestino+" </td> <td> "+resposta[i].Tipoviagem+" </td> <td> "+resposta[i].Periodo+" </td> <td> "+resposta[i].Detalhes+" </td> </tr>";
        }
        
        }
    });
}