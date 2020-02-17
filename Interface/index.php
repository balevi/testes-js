<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>INTERFACE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    
</head>
<body onload="setInterval('horario()',2000)">
  
    <section>
    
    <img src="https://4.bp.blogspot.com/-m1WwbPYUV0U/VdHSD1q6fFI/AAAAAAAACCw/esmMxWGi58g/s1600/prodeb.jpg" alt="prodeb" width="100px" heigth="100px">
    
        <fieldset>
        <i class="fas fa-paste"  style="font-size: 3em;" id="paper" onclick="relat()"></i>
            <div id="horario"name="horas">
                Horario
            </div>
            <span id="disp">      
                <button class="display" id="btn1" name="btn11"></button>
                <button class="display" id="btn2" name="btn22"></button>
                <button class="display" id="btn3" name="btn33"></button>
                <button class="display" id="btn4" name="btn44"></button>           
            </span>
            <i class="fas fa-backspace" id="back" style="font-size: 3em;" onclick="delet()"></i><br><br><br> 
            
                    <div class="test">
                        <button class="tecla">7</button>
                    
                        <button class="tecla">8</button>
                    
                        <button class="tecla">9</button>
                    </div>
                    <div class="test">  
                        <button class="tecla">4</button>
                    
                        <button class="tecla">5</button>
                    
                        <button class="tecla">6</button>
                    </div>
                    <div class="test">
                        <button class="tecla">1</button>
                    
                        <button class="tecla">2</button>
                   
                        <button class="tecla">3</button>
                    </div>
                    <div class="test">
                        <label for="submit"><span style="font-size: 4em;margin-top: 20px;"class="fas fa-arrow-alt-circle-down" onclick="entrada()"></span></label>
                    
                        <button class="tecla">0</button>
                    
                        <label for="submit"><span style="font-size: 4em;margin-top: 20px;"class="fas fa-arrow-alt-circle-up" onclick="saida()"></span></label>
                    </div>
                  
                         
        </fieldset>
            
    </section>
    <form action="banco.php" method="get">
            <input type = "text" name="id" hidden>
            <input type = "text" name="cod" id="env" value="" hidden>
            <input type = "text" name="tipo" id="tipo" value ="" hidden>
            <input type = "text" name="horas" id="hor" value="" hidden>  
            <input type="submit" value="Enviar"id="submit" hidden>
        </form>
    <footer>
        <h2>&copy; Prodeb</h2>
    </footer>
          
    <script src="script.js"></script>
</body>
</html>