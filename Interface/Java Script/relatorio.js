var valor = document.getElementsByName("valor"); // pegando input codigo
var data = document.getElementsByName("date"); // pegando input data
var select = document.getElementById("select"); // pegando o select
var opt3 = document.getElementById("opt3"); // pegando terceiro option do select para altera tamanho pelo display
var sect = document.getElementById("sect"); // pegando o section para ser alterado display menor 321
var del= document.querySelectorAll(".del"); // pegando o botao excluir
data[0].style.display='none'; //input data fica invisivel inicio ate ser selecionado pelo select atraves função option



function option()
{ //definir quando a opção do select codigo e data serão exibidas atraves do click na opçao e deixa responsiva para determinadas resoluções celular

    var select = document.getElementById("select");
    var opt = select.options[select.selectedIndex];
    data[0].style.display='none'; //de inicio input data sera ocultado
    let screenWidth = screen.width; // pegando largura do aparelho para os elementos diminua a depender tela
    if (opt.value == "Data")
    {

        valor[0].style.display='none'; // ao escolher busca por data o input codigo sera ocultado
        valor[0].value="";
        data[0].style.display= '';
        if(screenWidth<415)
        {
            data[0].style.width = '150px';
            data[0].placeholder = 'Digite a Data...';
        }
        if(screenWidth<385)
        {
            data[0].style.width = '140px';
            data[0].placeholder = 'Digite a Data...';
        }

        if(screenWidth<321) // diminui o tamanho dos input e placeholder para IPHONE5
        {
            select.style.width = '90px';
            data[0].style.width = '145px';
        }

    }
    else if(opt.value == "Codigo")
    {
        data[0].style.display='none'; // ao escolher busca por código o input data sera ocultado
        data[0].value="";
        valor[0].style.display='';
        if(screenWidth<415)  // diminui o tamanho dos input e placeholder para Pixel 2 e NEXUS6
        {
            valor[0].style.width = '157px';
            valor[0].placeholder = 'Digite o Código...';
            select.style.width = '93px';
        }
        if(screenWidth<385)  // diminui o tamanho dos input e placeholder para lumia 950, NEXUS 4,5
        {
            valor[0].style.width = '157px';
            valor[0].placeholder = 'Digite o Código...';
            select.style.width = '93px';
        }
        if(screenWidth<321) // diminui o tamanho dos input e placeholder para IPHONE5
        {
            select.style.width = '90px';
            valor[0].style.width = '145px';
       
        }

    }
    else
    {
        data[0].style.display= '';
        valor[0].style.display='';
        
        if(screenWidth<415) // diminui o tamanho dos input e placeholder para Pixel 2 e Nexus6
        {
            select.style.width = '110px';
            valor[0].style.width = '105px';
            valor[0].placeholder = 'Código...';
            data[0].style.width = '105px';
            data[0].placeholder = 'Data...';
            
         
        }
        if(screenWidth<385){
            valor[0].style.width = '80px';
            valor[0].placeholder = 'Cód...';
            data[0].style.width = '106px';
            data[0].placeholder = 'Data...';
            select.style.width = '88px';
            opt3.innerText = 'Cód/Dat';
        }
        if(screenWidth<321) // diminui o tamanho dos input e placeholder para IPHONE5
        {
            select.style.width = '110px';
            valor[0].style.width = '70px';
            data[0].style.width = '70px';
         
        }
    }
}

select.addEventListener('click',option,false)

if(screen.width>410 && screen.height<733){ // diminuindo os input para NEXUS6
    valor[0].style.width = '155px';
    data[0].style.width = '150px';
    select.style.width = '150px';
}
if(screen.width<321){ // diminuindo os input para IPHONE5 e deixando o section tamanho ideal para essa tela
    select.style.width = '90px';
    valor[0].style.width = '145px';
    //sect.style.width = '110%';
}

function validy_Date(event) //incrementa '/' na digitação do input data e limita 10 caractere
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




