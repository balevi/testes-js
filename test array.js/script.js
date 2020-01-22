    var num = (document.getElementById('txtnum'))
    var lista = document.getElementById('list')
    var res = document.getElementById('res')
    var valores = []

function enviar(){   
valores.push(Number(num.value))
let item = document.createElement('option')
item.text = `valor ${num.value} adicionado`
lista.appendChild(item)
num.value = ''
num.focus()
res.innerHTML = ''
}

function finalizar()
{
    if (valores.length ==0) 
    {
        window.alert('adicione valores')
    } else 
        {
            let tot = valores.length
            let maior = valores[0]
            let menor = valores[0]
            let somar = 0
            let media = 0
            //for (let i =0;i<tot;i++)
            for(let pos in valores){
                if (valores[pos]>maior)
                    {
                        maior = valores[pos]
                    }
                
                if (valores[pos]<menor)
                    {
                        menor = valores[pos]
                    }
                somar += valores[pos]
                media = somar/tot
            }
            
            res.innerHTML= `<p> ao todo temos ${tot} valores no array </p> o maior valor é ${maior} eo menor valor é ${menor}`
            res.innerHTML += `<p>a somar de todos valores é ${somar} </p>`
            res.innerHTML += `<p> a media dos valores é ${media}</p>`
        
        }
}
