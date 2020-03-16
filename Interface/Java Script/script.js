var btn= document.querySelectorAll(".teclas");
var display= document.querySelectorAll(".tecladisplay");
var env = document.getElementById('env');
var tipo = document.getElementById('tipo');
var submit = document.getElementById('submit');
var btnenter = document.getElementById('Entrada');
var btnexit = document.getElementById('Saida');
var voltar= document.querySelectorAll(".voltar");
var horario = document.getElementById('horario');


function time()
{
    var data = new Date();
    var horas = data.getHours();
    var minutos = data.getMinutes();

    if(minutos<10)
    {
      minutos= '0'+minutos ; //minutos menores que 10 são exibitos sem o zero na frente
    }
    
    if(horas<10)
    {
      horas= '0'+horas ; //horas menores que 10 são exibitos sem o zero na frente
    }
        horario.innerHTML= `<strong> ${horas} : ${minutos}</strong>`;
}

    
function change(event)
{

    display[0].innerHTML= display[1].innerHTML;
    display[1].innerHTML= display[2].innerHTML;
    display[2].innerHTML= display[3].innerHTML;
    display[3].innerHTML=event.target.innerHTML; 
}



   for(let i=0;i<btn.length;i++)
   {
       btn[i].addEventListener('click',change,false);
   }

function control(event)
{
    if(display[0].innerHTML=="" && display[1].innerHTML==""&& display[2].innerHTML==""&& display[3].innerHTML=="")
    {
        alert("Preencha No Minímo 1 Numero!");
        submit.id=null
    }else{
            env.value= btn1.innerText+btn2.innerText+btn3.innerText+btn4.innerText;
            tipo.value= event.target.id ;              
            submit.id="submit"; 
          } 
}

    btnenter.addEventListener('click',control,false);
    btnexit.addEventListener('click',control,false);

function delet()
{
    display[3].innerHTML= display[2].innerHTML;
    display[2].innerHTML= display[1].innerHTML;
    display[1].innerHTML= display[0].innerHTML;
    display[0].innerHTML= "" ;
}

