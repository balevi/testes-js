<!DOCTYPE html>
<html lang="pt-BR">
    <head>
    
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>LOGIN</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0/css/all.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="CSS/style.css">
    
    </head>

    <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
     <a class="navbar-brand" href="#">PRODEB</a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
     </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown" >
       <ul class="navbar-nav">
         <li class="nav-item">
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
    


      <img src="https://4.bp.blogspot.com/-m1WwbPYUV0U/VdHSD1q6fFI/AAAAAAAACCw/esmMxWGi58g/s1600/prodeb.jpg" id="logo1" alt="prodeb" class="rounded mx-auto d-block my-2" width="100px" heigth="100px">
   
      <?php 
            session_start(); 

            if (isset($_SESSION['erro']))
            { ?>
                <div class="d-flex justify-content-center alert alert-danger alert-dismissible fade show" role="alert">
                    <?php $result = $_SESSION['erro']; echo $result; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
      <?php unset($_SESSION['erro']); } ?>

            <div class="d-flex justify-content-center">
                <div id="testa" class="d-flex justify-content-center align-items-center">                   
                    <div class="d-flex flex-column flex-wrap">
                    <i class="fas fa-users ml-5" style="font-size: 3em;"></i>
                        <form action="validy_user.php" method="get" > 
                        <div class="form-group">
                        <input type = "text" name="login" placeholder="Digite seu login..." class="form-control" required>   
                        <input type = "password" name="senha" placeholder = "Digite sua senha.." class="form-control" required>    
                        <input type="submit" value="ENTRA"id="submit" class="form-control">
                        </div>
                        </form>
                    </div>
                </div>
            </div>
                       
           
            <?php 
             
                    unset($_SESSION['login']);
                    unset($_SESSION['senha']);
                    unset($_SESSION["valor"]);                 
                    unset($_SESSION["date"]);                 
            ?>
        


        
        <footer id="footer">
            <h2>Copyright&copy;.2020, PRODEB</h2>
        </footer>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      
    </body>
</html>