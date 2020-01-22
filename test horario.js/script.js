function carregar(){
    var tempo = document.getElementById('horario')
    var imagem = document.getElementById('manha')
    var data = new Date()
    var horas = data.getHours()
    var minutos = data.getMinutes()
    //data.getFullYear() para ano 4 digitos
    //var img = document.createElement('img') criando imagem pelo javascript
    //img.setAtrribute ('id','foto')
    //img.setAtrribute ('src','tarde.png')

    tempo.innerHTML= `Agora são ${horas} horas e ${minutos} Minutos !`
    if(horas >= 6 && horas <=12 ) {
        imagem.src = 'manha.png'
    }
    else if(horas >12 && horas<=18 ) {
        imagem.src = 'tarde.png'
    }
    else {
        imagem.src = 'noite.png'
        for(i=0;i>10;i++){
            
        }
    }
}
