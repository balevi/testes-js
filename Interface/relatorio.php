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
<body>
    
    <section>
 
    <img src="https://4.bp.blogspot.com/-m1WwbPYUV0U/VdHSD1q6fFI/AAAAAAAACCw/esmMxWGi58g/s1600/prodeb.jpg" alt="prodeb" width="100px" heigth="100px">
                
      
 
        
                        <?php 
                        $host = "localhost";
                        $usuario = "root";
                        $senha = "";
                        $bd = "controle";
                        $mysqli = new mysqli($host, $usuario, $senha, $bd);
                        //conexao com o banco de dados
                        $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
                        //verifica a página atual caso seja informada na URL, senão atribui como 1ª página 
                        $consulta = "select * from interface";
                        $dados = $mysqli->query($consulta);
                        //seleciona todos os itens da tabela
                        $total = mysqli_num_rows($dados);
                        //conta o total de itens 
                        $registros = 5;
                        //seta a quantidade de itens por página, neste caso, 5 itens 
                        $numPaginas = ceil($total/$registros);
                        //calcula o número de páginas arredondando o resultado para cima 
                        $inicio = ($registros*$pagina)-$registros;
                        //variavel para calcular o início da visualização com base na página atual 
                        $consulta = "select * from interface limit $inicio,$registros"; 
                        $dados = $mysqli->query($consulta); 
                        $total = mysqli_num_rows($dados);
                        //seleciona os itens por página 
                        //https://www.youtube.com/watch?v=KvzqN6iSaSw
                        $con = $mysqli->query($consulta) or die($mysqli->error);
                        ?>
                           <table class="table table-striped">
                           <thead class="thead-dark">
                                <tr>
                                    <th>Codigo</th>
                                    <th>Tipo</th>
                                    <th>Horario</th>
                                </tr>
                            </thead>
                        <?php
                        while ($dado = mysqli_fetch_assoc($dados)) { ?>
                            

                                <tr>
                                <td><?php echo $dado["codigo"]; ?></td>
                                <td><?php echo $dado["tipo"]; ?></td>
                                <td><?php echo $dado["horas"]; ?></td>
                                </tr>
                            
                        <?php }
                        ?>
                        </table>
                        <i class="fas fa-undo-alt" onclick="volt()">  INICIO</i><br><br><br>
                        <div id="paginate">
                            <nav aria-label="...">
                            <ul class="pagination">
                            <li class="page-item ">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                            </li>
                            <?php
                            //apresentar a paginaçao
                                for($i=1;$i < $numPaginas + 1;$i++){?>
                                    <li class="page-item"><a class="page-link" href="relatorio.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                <?php } ?>
                         
                            
                            <li class="page-item">
                            <a class="page-link" href="#">Proximo</a>
                            </li>
                            </ul>
                            </nav>
                        </div>                   
    </section>
    <footer>
        <h2>&copy; Prodeb</h2>
    </footer>
    <script src="script.js"></script>
</body>
</html>