function horario(){
    var horario = document.getElementById('horario')
    var data = new Date()
    var horas = data.getHours()
    var minutos = data.getMinutes()
    horario.innerHTML= ` ${horas} : ${minutos}`
}