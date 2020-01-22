function carregar(){
    var inici = Number.parseInt(document.getElementById('inicio').value)
    var fim = Number.parseInt(document.getElementById('fim').value)
    var cont = document.getElementById('cont')
  
        cont.innerHTML = 'contandooo'
        for(var i=inici;i<=fim;i++){
             cont.innerHTML = cont.innerHTML+i //+=
        }
        // tab.appenChild(item) var item = document.createElement('option')
   
}
