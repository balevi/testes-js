    
    var idade1 = document.getElementById('idade')
    var altura1 = document.getElementById('altura')
    var lista = document.getElementById('list')
    //var nomep = 'gustavo'
    

function enviar(){  
    var nome1 = document.getElementById('nome').value
    var object = {nome:nome1,idade:idade1.value,altura:altura1.value,get mostranome(){return `o nome é ${this.nome} a idade é ${this.idade} a altura é${this.altura}`}}
    let item = document.createElement('option')
    item.text= object.mostranome
    lista.appendChild(item)
    
    //item.text= object.mostranome()
    // set mostranome()= 'levi'
    // delete object.nome
    //object.mostranome(nome1)
    //document.write(object.nome)
    // var {nome,idade,altura} = object
    // console.log(nome,pais,idade) ecma script6 ao inves de imprimir 1 atributo por vez

}
