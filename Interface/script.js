var btn= document.querySelectorAll(".tecla")
var display= document.querySelectorAll(".display")
var btn1 = document.getElementById('btn1')
var btn2 = document.getElementById('btn2')
var btn3 = document.getElementById('btn3')
var btn4 = document.getElementById('btn4')
    function horario(){
    var horario = document.getElementById('horario')
    var data = new Date()
    var horas = data.getHours()
    var minutos = data.getMinutes()
    horario.innerHTML= `<strong> ${horas} : ${minutos}</strong>`
    }

    function muda(event)
    {
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
    }else{
    alert(`Saida do Numero: ${btn1.innerHTML+btn2.innerHTML+btn3.innerHTML+btn4.innerHTML}`)
    btn1.innerHTML= ""
    btn2.innerHTML= ""
    btn3.innerHTML= ""
    btn4.innerHTML= ""
        } 
    }
    function entrada(){
    if(btn1.innerHTML==""||btn2.innerHTML==""||btn3.innerHTML==""||btn4.innerHTML==""){
        alert("Preencha todos Numeros!")
    }else{
    alert(`Entrada do Numero: ${btn1.innerHTML+btn2.innerHTML+btn3.innerHTML+btn4.innerHTML}`)
    btn1.innerHTML= ""
    btn2.innerHTML= ""
    btn3.innerHTML= ""
    btn4.innerHTML= ""
        }   
    }
    function delet(){
        for(let i=0;i<display.length;i++)
        {   
            if(display[i].innerHTML!=""){
            display[i].innerHTML!=""
            }
        }
        /*
        if(btn4.innerHTML!=""){
            btn4.innerHTML=""
            return
        }
        if(btn4.innerHTML==""){
            btn3.innerHTML=""
            btn4.innerHTML==null
            return
        }
        if(btn3.innerHTML==""){
            btn2.innerHTML=""
            return
        }
        if(btn2.innerHTML==""){
            btn1.innerHTML=""
            return
        }
        */
    }