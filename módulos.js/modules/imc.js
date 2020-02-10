function indice()
{
    var altura = document.getElementById('Altura').value
    var peso = document.getElementById('Peso').value
    var array= altura.split('')
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
export default indice;