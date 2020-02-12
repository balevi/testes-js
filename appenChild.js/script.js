var main=document.querySelector("#main")
var text=document.querySelector("#text")
var cont=document.querySelector("#cont")
var check=document.querySelector("#check")
var acc=document.querySelector("#acc")
var btn=document.querySelectorAll(".btn")


function muda(){
    const btn = document.createElement("button")
    btn.className= "btn"
    btn.id= 'btn2'
    btn.innerHTML="click2"
    btn.addEventListener('click',muda,false)
    main.appendChild(btn)
}

for(let i=0;i<btn.length;i++)
    {
    btn[i].addEventListener('click',muda,false)
    }

function muda2(event)
    {
    if(event.target.id=="btn2")
        {
            main.style.backgroundColor="red"
            btn[0].setAttribute("id","blue")
            //btn.removeAtribute("id",'clicouu')
        }
    }

function validy(event)
    {
        cont.innerHTML = event.target.textLength
    if(event.keyCode!=8)
        {
            if(event.target.textLength>=10)
            {
                alert('limite 10 caractere') 
                event.returnValue = false
                //text.disabled = true
                //console.log(event.keyCode)       
            }
        }
    }
function acct(){
    if(check.checked==false){
        alert('aceite os termos!')
    }
}

main.addEventListener('click',muda2,false)
//text.addEventListener('blur',validy,false) perder o foco ativa
//text.addEventListener('keyup',validy,false)
text.addEventListener('keydown',validy,false)
acc.addEventListener('click',acct,false)



/*
function excluir(){   
    main.removeChild(main.childNodes[0])
}
*/