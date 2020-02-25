var btn= document.querySelectorAll(".teclas")
var display= document.querySelectorAll(".tecladisplay")
var btn1 = document.getElementById('btn1')
var btn2 = document.getElementById('btn2')
var btn3 = document.getElementById('btn3')
var btn4 = document.getElementById('btn4')
var env = document.getElementById('env')
var tipo = document.getElementById('tipo')
var submit = document.getElementById('submit')
var btnenter = document.getElementById('Entrada')
var btnexit = document.getElementById('Saida')
var voltar= document.querySelectorAll(".voltar")  
var horario = document.getElementById('horario')

function time(){

var data = new Date()
var horas = data.getHours()
var minutos = data.getMinutes()

    if(minutos<10){
        minutos= '0'+minutos
    }
    if(horas<10){
        horas= '0'+horas
    }
    horario.innerHTML= `<strong> ${horas} : ${minutos}</strong>`

    }

    
    function change(event)
    {
        if(btn1.innerHTML!="" && (btn2.innerHTML=="" || btn3.innerHTML=="" || btn4.innerHTML=="")){
        for(let i=0;i<4;i++)
       // for(let i=3;i>-1;i--)
        {   
   
            if(display[i].innerHTML==""){
                    display[i].innerHTML= event.target.innerHTML
  
                return            
            }       
        }   
            
    }
 
                    btn1.innerHTML= btn2.innerHTML
                    btn2.innerHTML= btn3.innerHTML
                    btn3.innerHTML= btn4.innerHTML
                    btn4.innerHTML=event.target.innerHTML 
    }



   for(let i=0;i<btn.length;i++)
   {
       btn[i].addEventListener('click',change,false)
   }
   
    function control(event){
        if(btn1.innerHTML==""||btn2.innerHTML==""||btn3.innerHTML==""||btn4.innerHTML==""){
            alert("Preencha todos Numeros!")
            submit.id=null
        }else{
                env.value= btn1.innerText+btn2.innerText+btn3.innerText+btn4.innerText
                tipo.value= event.target.id                 
                let r =confirm(`${event.target.id} do Numero: ${env.value}`)
                submit.id=null
                if (r==true)
                {
                    submit.id="submit" 
                }
            } 
    }

    btnenter.addEventListener('click',control,false)
    btnexit.addEventListener('click',control,false)

  
    function delet(){
        for(let i=3;i>-1;i--)
        {   
            if(display[i].innerHTML!=""){
            display[i].innerHTML=""
            return
            }
        }
    }
