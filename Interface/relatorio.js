var valor = document.getElementsByName("valor");
var data = document.getElementsByName("date");
var del= document.querySelectorAll(".del");
data[0].style.display='none';



function option(){ //definir quando a opção do select codigo e data serão exibidas atraves do click na opçao e deixa responsiva para determinadas resoluções celular

var select = document.getElementById("select");
var opt = select.options[select.selectedIndex];
data[0].style.display='none';
let screenWidth = screen.width;
if (opt.value == "Data"){

    valor[0].style.display='none';
    valor[0].value="";
    data[0].style.display= '';
    if(screenWidth<385){
            data[0].style.width = '140px';
            data[0].placeholder = 'Digite a Data...';
        }

    }else if(opt.value == "Codigo"){
    data[0].style.display='none';
    data[0].value="";
    valor[0].style.display='';
    if(screenWidth<385){
            valor[0].style.width = '155px';
            valor[0].placeholder = 'Digite o Código...';
        }
    if(screenWidth<321){
            valor[0].style.width = '120px';
            valor[0].placeholder = 'Digite o Código...';
        }

    }else{
        data[0].style.display= '';
        valor[0].style.display='';

        if(screenWidth<385){
            valor[0].style.width = '80px';
            valor[0].placeholder = 'Cód...';
            data[0].style.width = '106px';
            data[0].placeholder = 'Data';
        }
    }
}



function validy_Date(event) //incrementa '/' na digitação data e limita 10 caractere
{

        
    if( event.target.value.length == 2 )
    {
        if(event.keyCode!=8)
        {
            data[0].value = data[0].value += '/';
        }
    }else if( event.target.value.length ==5 )
    {
        if(event.keyCode!=8){
        data[0].value = data[0].value += '/';
        }
    }
    else if(event.target.value.length == 10)
    {
        if(event.keyCode!=8){
        event.preventDefault();
        }
    }

}


data[0].addEventListener('keydown',validy_Date,false)



function confirmet(event) //confirmação para excluir registro e ativa href para o mesmo e salvamento da pagina atual
{
    let resp= confirm(`Deseja Realmente Excluir?`)
    if (resp==true)
        {
            for(var i=0;i<del.length;i++)
            {
                del[i].href=`excluir.php?id=${del[i].id}&pagina=<?php if(isset($_GET['pagina'])){echo$_GET['pagina'];}else{echo 1;}?>`
            }
        
        }
}

for(var i=0;i<del.length;i++)
{
    del[i].addEventListener('click',confirmet,false);
}

