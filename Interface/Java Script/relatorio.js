var valor = document.getElementsByName("valor");
var data = document.getElementsByName("date");
var select = document.getElementById("select");
var opt3 = document.getElementById("opt3");
var del= document.querySelectorAll(".del");
data[0].style.display='none'; //input data fica invisivel inicio ate ser selecionado pelo select atraves função option



function option()
{ //definir quando a opção do select codigo e data serão exibidas atraves do click na opçao e deixa responsiva para determinadas resoluções celular

    var select = document.getElementById("select");
    var opt = select.options[select.selectedIndex];
    data[0].style.display='none';
    let screenWidth = screen.width;
    if (opt.value == "Data")
    {

        valor[0].style.display='none';
        valor[0].value="";
        data[0].style.display= '';
        if(screenWidth<385)
        {
            data[0].style.width = '140px';
            data[0].placeholder = 'Digite a Data...';
        }

    }
    else if(opt.value == "Codigo")
    {
        data[0].style.display='none';
        data[0].value="";
        valor[0].style.display='';
        if(screenWidth<385)
        {
            valor[0].style.width = '157px';
            valor[0].placeholder = 'Digite o Código...';
        }
        if(screenWidth<321)
        {
            valor[0].style.width = '120px';
            valor[0].placeholder = 'Digite o Código...';
        }

    }
    else
    {
        data[0].style.display= '';
        valor[0].style.display='';

        if(screenWidth<385){
            valor[0].style.width = '80px';
            valor[0].placeholder = 'Cód...';
            data[0].style.width = '106px';
            data[0].placeholder = 'Data...';
            select.style.width = '88px';
            opt3.innerText = 'Cód/Dat';
        }
    }
}

select.addEventListener('click',option,false)


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




