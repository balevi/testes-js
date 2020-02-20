var btn= document.querySelectorAll(".tecla")
var display= document.querySelectorAll(".display")
var btn1 = document.getElementById('btn1')
var btn2 = document.getElementById('btn2')
var btn3 = document.getElementById('btn3')
var btn4 = document.getElementById('btn4')
var env = document.getElementById('env')
var hor = document.getElementById('hor')
var tipo = document.getElementById('tipo')
var hors = document.getElementById('horario')
var datatual = document.getElementById('data')
var submit = document.getElementById('submit')
var volt = document.getElementById('volt')
var voltar= document.querySelectorAll(".voltar")

    


function horario(){
    
    var data = new Date()
    var horas = data.getHours()
    var minutos = data.getMinutes()
    var dia = data.getDate();
    var mes = data.getMonth()+1;
    var ano = data.getFullYear();

    if(mes<10){
        mes= '0'+mes
    }
    datatual.value=`${dia}/${mes}/${ano}`
    
    
    if(minutos<10){
        minutos= '0'+minutos
    }
    if(horas<10){
        horas= '0'+horas
    }
    hors.innerHTML= `<strong> ${horas} : ${minutos}</strong>`
    
    }
    
    function muda(event)
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
       btn[i].addEventListener('click',muda,false)
   }
   
    function saida(){
        if(btn2.innerHTML==""){
            alert("Preencha no mínimo 3 Numeros!")
            submit.id=null
        }else{
                env.value=btn1.innerHTML+btn2.innerHTML+btn3.innerHTML+btn4.innerHTML
                hor.value=hors.innerText
                tipo.value="Saida" 
                let r =confirm(`Saida do Numero: ${btn1.innerHTML+btn2.innerHTML+btn3.innerHTML+btn4.innerHTML}`)
                submit.id=null
                if (r==true)
                {
                    submit.id="submit" 
                }
            } 
    }
    function entrada(){
    if(btn2.innerHTML==""){
        alert("Preencha no mínimo 3 Numeros!")
        submit.id=null
    }else{
            env.value=btn1.innerHTML+btn2.innerHTML+btn3.innerHTML+btn4.innerHTML
            hor.value=hors.innerText
            
            tipo.value="Entrada" 
            let r =confirm(`Entrada do Numero: ${btn1.innerHTML+btn2.innerHTML+btn3.innerHTML+btn4.innerHTML}`)          
            submit.id=null
            if (r==true)
            {
                submit.id="submit" 
            }
        }   
    }
    function delet(){
        for(let i=3;i>-1;i--)
        {   
            if(display[i].innerHTML!=""){
            display[i].innerHTML=""
            return
            }
        }
    }
