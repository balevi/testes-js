<!DOCTYPE html>
<html lang="pt-BR">
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>INTERFACE</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/css/all.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
    
    </head>

    <body onload="setInterval('time()',2000)">
        <img src="https://4.bp.blogspot.com/-m1WwbPYUV0U/VdHSD1q6fFI/AAAAAAAACCw/esmMxWGi58g/s1600/prodeb.jpg" id="logo1" alt="prodeb" class="rounded-pill mx-auto d-block my-2" width="100px" heigth="100px">
        <div class="d-flex justify-content-center" id="main">
            <fieldset>

                <a href="relatorio.php" class="fas fa-paste float-left ml-2" id="link1"></a>
                <div id="horario"name="horas" class="float-right mr-4">
                    <strong> Horário </strong>
                </div>

                <div class="d-flex justify-content-center mt-5 mr-5">      
                    <button class="tecladisplay" id="btn1" name="btn11"></button>
                    <button class="tecladisplay" id="btn2" name="btn22"></button>
                    <button class="tecladisplay" id="btn3" name="btn33"></button>
                    <button class="tecladisplay" id="btn4" name="btn44"></button>           
                </div>

                <i class="fas fa-backspace float-right mr-5" id="backspace" style="font-size: 3em;" onclick="delet()"></i><br><br> 
            
                <div class="d-flex justify-content-around mt-3">
                    <button class="teclas" >7</button>        
                    <button class="teclas" >8</button>    
                    <button class="teclas" >9</button>
                </div>

                <div class="d-flex justify-content-around mt-3">  
                    <button class="teclas">4</button>
                    <button class="teclas">5</button>
                    <button class="teclas">6</button>
                </div>

                <div class="d-flex justify-content-around mt-3">
                    <button class="teclas">1</button> 
                    <button class="teclas">2</button>
                    <button class="teclas">3</button>
                </div>

                <div class="d-flex justify-content-around ">
                    <label for="submit"><span style="font-size: 4em;margin-top: 20px;color: green"class="fas fa-arrow-alt-circle-down"id="Entrada"></span></label>
                    
                    <button class="teclas mt-4">0</button>
                    
                    <label for="submit"><span style="font-size: 4em;margin-top: 20px;color: red"class="fas fa-arrow-alt-circle-up" id="Saida"></span></label>
                </div>
                  
                         
            </fieldset>
       
        </div>

        <form action="banco.php" method="get">
            <input type = "text" name="id" hidden>
            <input type = "text" name="cod" id="env" value="" hidden>
            <input type = "text" name="tipo" id="tipo" value ="" hidden>
            <input type="submit" value="Enviar"id="submit" hidden>
        </form>
        
        <footer>
            <h2>&copy; PRODEB</h2>
        </footer>
          
        <script src="script.js"></script>
    </body>
</html>