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
    
    <?php 
        require_once 'conexao.php';
    ?>
    <img src="https://4.bp.blogspot.com/-m1WwbPYUV0U/VdHSD1q6fFI/AAAAAAAACCw/esmMxWGi58g/s1600/prodeb.jpg"  id="logo2" class="rounded mx-auto d-block my-2" alt="prodeb" width="100px" heigth="100px">
                            
    <section id="sect" >
        <h3><a href="index.php" class="fas fa-home  mx-3 d-flex justify-content-center"> INÍCIO</a></h3>
            <nav class="navbar navbar-light bg-light">

                <form action="relatorio.php" class="form-inline" method="GET">

                    <select id="select" class="custom-select mr-1" >
                        <option value="Codigo"selected > Codigo</option> 
                        <option value="Data">Data</option>
                        <option id= "opt3">Codigo/Data</option>
                    </select>
                    <input class="form-control mr-1" name="valor" type="search" placeholder="Digite o Código..." aria-label="Search" >
                    <input class="form-control mr-1 "  name="date"  placeholder="Digite a Data...">
                    <button class="btn btn-outline-primary " type="submit"><i class="fas fa-search"></i></button>
                </form>

            </nav>
            <table class="table table-hover table-sm table-striped" id="tabela">
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
                            <td><a href="#" class ="del" id="<?php echo $dado["id"]; ?>"><i class="fas fa-times-circle"style="font-size: 2em;color: red"></i></a></td>
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
                            
                        <a class="page-link" href="relatorio.php?pagina=<?php echo $pagina_anterior ; if(isset($_REQUEST["valor"])) { ?>&valor=<?php echo $_REQUEST["valor"]; }if(isset($_REQUEST["date"])){ ?>&date=<?php
                                echo $_REQUEST["date"];
                              }?>"><i class="fas fa-arrow-circle-left"></i></a>

                    </li>
                        <?php
                            //apresentar a paginaçao
                            $inicio = $pagina - 5;
                            $limite = $pagina + 5;
                            for($i=$inicio;$i < $limite;$i++)
                            {
                                 $pageitem= "page-item ";
                                //estrutura condicional se pagina for atual colocar marcador na pagina
                                if($i==$pagina){
                                $pageitem= "page-item active";
                                                }
                        ?>
                        <?php if($i>0 && $i <= $numPaginas){  //condição para não ter numeraçao paginas negativas e não ultrapasse o limite de paginas com registros?> 
                    <li class="<?php echo $pageitem; ?>">
                        <a class="page-link" href="relatorio.php?pagina=<?php echo $i; 
                            if(isset($_REQUEST["valor"])) {?>&valor=<?php 
                                echo $_REQUEST["valor"];
                              }
                              if(isset($_REQUEST["date"])){ ?>&date=<?php
                                echo $_REQUEST["date"];
                              }
                              ?>"><?php echo $i; //colocando numeração da paginação ?></a>
                    </li>
                            <?php } ?>
                     

                      <?php } ?> 
                                 
                    <li class="page-item">
                            <?php 
                            $pagina_proximo = $pagina+1;
                            $test=1;
                                if($pagina_proximo>$numPaginas)
                                { 
                                    $pagina_proximo=$numPaginas;
                                    
                                } 
                            ?>
                        <a class="page-link" href="relatorio.php?pagina=<?php echo $pagina_proximo;  if(isset($_REQUEST["valor"])) { ?>&valor=<?php echo $_REQUEST["valor"];if(isset($_REQUEST["date"])){ ?>&date=<?php
                                echo $_REQUEST["date"];
                              } } ?>"><i class="fas fa-arrow-circle-right"></i></a>
                    </li>
                </ul>
            </nav>
                                     
    </section>
                                
    <footer>
        <h2>Copyright&copy;.2020, PRODEB</h2>
    </footer> 
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