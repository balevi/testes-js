function indice()
{
    var altura = document.getElementById('Altura').value
    var peso = document.getElementById('Peso').value
    var array= altura.split('')
    if(array[1]=='.'){
        //var array = array.splice(1,1) variavel se for guarda o removido
        array.splice(1,1)
        console.log(array)
    }
    array[0]+='.'
    numbers = array.reduce(function(v1,v2){
        Number.parseFloat(v1 +=v2)
        return v1
    },)
    var result = document.getElementById('result')
    var imc = peso/(numbers*numbers)
    var arredondado = parseFloat(imc.toFixed(2));
    result.innerHTML = `O seu IMC é ${arredondado}` 
}
