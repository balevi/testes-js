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
<body>
    
<nav class="navbar navbar-expand-lg navbar-light bg-light">
     <a class="navbar-brand" href="index.php">PRODEB</a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
     </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown" >
       <ul class="navbar-nav">
         <li class="nav-item">
          <a class="nav-link" href="index.php">ÍNICIO</a>
         </li>
         <li class="nav-item active">
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

    <img src="https://4.bp.blogspot.com/-m1WwbPYUV0U/VdHSD1q6fFI/AAAAAAAACCw/esmMxWGi58g/s1600/prodeb.jpg"  id="logo2" class="rounded mx-auto d-block my-2" alt="prodeb" width="100px" heigth="100px">

    <?php 
        require_once 'conexao.php';
    ?>                  
    <section id="sect"  >
            <nav class="navbar navbar-light bg-light">

                <form action="relatorio.php" class="form-inline" method="POST">

                    <select id="select" class="custom-select mr-1" >
                        <option value="Codigo"selected > Código</option> 
                        <option value="Data">Data</option>
                        <option id= "opt3">Código/Data</option>
                    </select>
                    <input class="form-control mr-1" name="valor" type="number" placeholder="Digite o Código..." aria-label="Search">
                    <input class="form-control mr-1 "  name="date"  placeholder="Digite a Data...">
                    <button class="btn btn-outline-primary " type="submit" ><i class="fas fa-search"></i></button>
                </form>

            </nav>
            <table class="table table-hover table-sm table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th><h5>Código</h5></th>
                        <th><h5>Tipo</h5></th>
                        <th><h5>Horário</h5></th>
                        <th><h5>Data</h5></th>
                        <th></th>
                    </tr>
                </thead>
                        
                <?php
                    while ($dado = mysqli_fetch_assoc($dados)) 
                    { ?>
                        <tr>
                            <td><?php echo $dado["codigo"]; ?></td>
                            <td><?php echo $dado["tipo"]; ?></td>
                            <td><?php echo $dado["horas"]; ?></td>
                            <td><?php echo $dado["data"]; ?></td>
                            <td><a href="#" class ="del" id="<?php echo $dado["id"]; ?>"><i class="fas fa-times-circle btn btn-outline-danger"style="font-size: 1em;"></i></a></td>
                        </tr>       
                <?php }?>
            </table>         
                            
            <nav aria-label="...">
                <ul class="pagination justify-content-center">
                    <li class="page-item ">
                        <?php 
                            $pagina_anterior = $pagina-1;
                            if($pagina_anterior ==0)
                            { 
                                $pagina_anterior=1;  
                            }
                        ?>
                            
                        <a class="page-link" href="relatorio.php?pagina=<?php echo $pagina_anterior ;if(isset($_REQUEST["date"])){ ?>&date=<?php
                                echo $_REQUEST["date"];
                              }?>"><i class="fas fa-arrow-circle-left"></i></a>

                    </li>
                        <?php
                            //apresentar a paginaçao
                            $inicio = $pagina - 4;
                            $limite = $pagina + 4;
                            if($inicio < 0){  //  condição para não ter numeraçao paginas negativas
                                $inicio = 1; 
                            }
                            for($i=$inicio;$i < $limite;$i++)
                            {
                                 $pageitem= "page-item ";
                                //estrutura condicional se pagina for atual colocar marcador azul na pagina
                                if($i==$pagina){
                                $pageitem= "page-item active";
                                                }
                        ?>
                        <?php if($i <= $numPaginas){  //  condição para não ter numeraçao paginas negativas e não ultrapasse o limite de paginas com registros?> 
                    <li class="<?php echo $pageitem; ?>">
                        <a class="page-link" href="relatorio.php?pagina=<?php echo $i; ?>"><?php if($i==0){ $i=1; } echo $i; // condição para não ter numeraçao paginas negativas e colocando numeração da paginação ?></a>
                    </li>
                            <?php } ?>
                     

                      <?php } //termino do for ?> 
                                 
                    <li class="page-item">
                            <?php 
                            $pagina_proximo = $pagina+1;
                                if($pagina_proximo>$numPaginas)
                                { 
                                    $pagina_proximo=$numPaginas;
                                    
                                } 
                            ?>
                        <a class="page-link" href="relatorio.php?pagina=<?php echo $pagina_proximo; ?>"><i class="fas fa-arrow-circle-right"></i></a>
                    </li>
                </ul>
            </nav>
                                     
    </section>
                                
    <footer>
        <h2>Copyright&copy;.2020, PRODEB</h2>
    </footer> 
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="Java Script/relatorio.js"></script>
        <script>
            
            function confirmed(event) //confirmação para excluir registro e coloca no href link para o delete e salvamento da pagina atual
            {
                let resp= confirm(`Deseja Realmente Excluir?`)
                if (resp==true)
                {
           
                    for(var i=0;i<del.length;i++)
                    {
                        del[i].href=`delete.php?id=${del[i].id}&pagina= <?php if(isset($_GET['pagina'])){echo$_GET['pagina'];}else{echo 1;}?>`
                    }
        
                }
            }

            for(var i=0;i<del.length;i++)
            {
            del[i].addEventListener('click',confirmed,false);
            }
        </script>
   </body>
</html>