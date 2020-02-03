function indice()
{
    var altura = document.getElementById('Altura').value
    var peso = document.getElementById('Peso').value
    var array= altura.split('')
    var peso= array.reduce(function(Acumulador, valorAtual, indice)
            {  
            if ( indice == 0) 
                {
                    console.log(valorAtual)
                }
                return valorAtual
            },0) 
   

    //var resul = one+','+two
    
/*
    var result = document.getElementById('result')
    var imc = peso/(altura*altura)
    var arredondado = parseFloat(imc.toFixed(2));
    result.innerHTML = `O seu IMC é ${imc}`
    */
}