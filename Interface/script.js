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
var submit = document.getElementById('submit')
var voltar= document.querySelectorAll(".voltar")

    function horario(){
    
    var data = new Date()
    var horas = data.getHours()
    var minutos = data.getMinutes()
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
        for(let i=0;i<4;i++)
        {   
            
            if(display[i].innerHTML==""){
                display[i].innerHTML= event.target.innerHTML
                return
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
        if(btn1.innerHTML==""||btn2.innerHTML==""||btn3.innerHTML==""||btn4.innerHTML==""){
            alert("Preencha todos Numeros!")
            submit.id=null
        }else{
                env.value=btn1.innerHTML+btn2.innerHTML+btn3.innerHTML+btn4.innerHTML
                hor.value=hors.innerText
                tipo.value="Saida" 
                alert(`Saida do Numero: ${btn1.innerHTML+btn2.innerHTML+btn3.innerHTML+btn4.innerHTML}`)
                submit.id="submit"
                btn1.innerHTML= ""
                btn2.innerHTML= ""
                btn3.innerHTML= ""
                btn4.innerHTML= ""
            } 
    }
    function entrada(){
    if(btn1.innerHTML==""||btn2.innerHTML==""||btn3.innerHTML==""||btn4.innerHTML==""){
        alert("Preencha todos Numeros!")
        submit.id=null
    }else{
            env.value=btn1.innerHTML+btn2.innerHTML+btn3.innerHTML+btn4.innerHTML
            hor.value=hors.innerText
            tipo.value="Entrada" 
            alert(`Entrada do Numero: ${btn1.innerHTML+btn2.innerHTML+btn3.innerHTML+btn4.innerHTML}`)
            btn1.innerHTML= ""
            btn2.innerHTML= ""
            btn3.innerHTML= ""
            btn4.innerHTML= ""
            submit.id="submit"
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

    function relat(){
        location.href='relatorio.php'
        
    }
    function volt(){
        location.href='index.php'
        
    }
