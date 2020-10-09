<!DOCTYPE html>
<html lang="pt-BR">
    <head>
    
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>INTERFACE</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/css/all.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="CSS/style.css">
    
    </head>

    <body onload="setInterval('time()',2000)">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
     <a class="navbar-brand" href="index.php">PRODEB</a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
     </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown" >
       <ul class="navbar-nav">
         <li class="nav-item active">
          <a class="nav-link" href="index.php">ÍNICIO</a>
         </li>
         <li class="nav-item">
          <a class="nav-link" href="relatorio.php">RELATORIO</a>
         </li>
         <li class="nav-item">
          <a class="nav-link" href="user.php">CADASTRA USUÁRIO</a>
         </li>
         <li class="nav-item">
          <a class="nav-link" href="login.php">SAIR</a>
         </li>
       </ul>
      </div>
    </nav>
    

        
            <?php 
            session_start(); 
            if(empty($_SESSION['login']) || empty($_SESSION['senha']))
                {
                    unset($_SESSION['login']);
                    unset($_SESSION['senha']);
                    header('location:login.php');
                }

            if (isset($_SESSION['res']))
            { ?>
                <div class="d-flex justify-content-center <?php echo $_SESSION['cor']; ?> alert-dismissible fade show" role="alert">
                    <?php $result = $_SESSION['res']; echo $result; unset($_SESSION['res']); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
      <?php } ?>

      <img src="https://4.bp.blogspot.com/-m1WwbPYUV0U/VdHSD1q6fFI/AAAAAAAACCw/esmMxWGi58g/s1600/prodeb.jpg" id="logo1" alt="prodeb" class="rounded mx-auto d-block my-2" width="100px" heigth="100px">
   
        <div class="d-flex justify-content-center " id="main">
            <fieldset >

                <div id="horario"name="horas" class="float-right mr-4">
                    <strong> Horário </strong>
                </div>

                <div class="d-flex justify-content-center mt-5 ">      
                    <button class="tecladisplay" id="btn1" name="btn11"></button>
                    <button class="tecladisplay" id="btn2" name="btn22"></button>
                    <button class="tecladisplay" id="btn3" name="btn33"></button>
                    <button class="tecladisplay" id="btn4" name="btn44"></button>           
                </div>

                <i class="fas fa-backspace float-right mr-4" id="backspace" style="font-size: 3em;" onclick="delet()"></i><br><br> 
            
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

        <form action="create.php" method="get">
            <input type = "text" name="id" hidden>
            <input type = "text" name="cod" id="env" value="" hidden>
            <input type = "text" name="tipo" id="tipo" value ="" hidden>
            <input type="submit" value="Enviar"id="submit" hidden>
        </form>
        
        <footer class="foot" id= "fot">
            <h2>Copyright&copy;.2020, PRODEB</h2>
        </footer>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="Java Script/script.js"></script>
    </body>
</html>