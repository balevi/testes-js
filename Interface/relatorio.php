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
    
    <?php 
        $host = "localhost";
        $usuario = "root";
        $senha = "";
        $bd = "controle";                    
        $mysqli = new mysqli($host, $usuario, $senha, $bd);//conexao com o banco de dados
        $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;//verifica a página atual caso seja informada na URL, senão atribui como 1ª página 
    
        // consulta para definir o numero de pagina através numeros de registros
        if (isset($_REQUEST["date"]) && $_REQUEST["date"]!= "" && isset($_REQUEST["valor"]) && $_REQUEST["valor"]!= ""){
            $dat= $_GET["date"];

            $consulta = "select * from interface WHERE codigo = ".$_REQUEST["valor"]." AND data ='$dat'";
        } 
         else if (isset($_REQUEST["valor"]) && $_REQUEST["valor"]!= "") {
            $consulta = "select * from interface WHERE codigo = ".$_REQUEST["valor"]." ";
        } else if (isset($_REQUEST["date"]) && $_REQUEST["date"]!= "") {
            $dat= $_GET["date"];
            $consulta = "select * from interface WHERE data = '$dat'" ;
        } 
        else{
            $consulta = "select * from interface  ";
        }
        $dados = $mysqli->query($consulta);//seleciona todos os itens da tabela
        $total = mysqli_num_rows($dados);//conta o total de itens
        $registros = 13;//seta a quantidade de itens por página, neste caso, 5 itens
        $numPaginas = ceil($total/$registros);//calcula o número de páginas arredondando o resultado para cima 
        $inicio = ($registros*$pagina)-$registros;//variavel para calcular o início da visualização com base na página atual 
       
        // consulta para definir o tipo de buscar
        if (isset($_REQUEST["date"]) && $_REQUEST["date"]!= "" && isset($_REQUEST["valor"]) && $_REQUEST["valor"]!= ""){
            $dat= $_GET["date"];

            $consulta = "select * from interface WHERE codigo = ".$_REQUEST["valor"]." AND data ='$dat'";
        } 
        else if(isset($_REQUEST["valor"]) && $_REQUEST["valor"]!= ""){
        $consulta = "select * from interface WHERE codigo = ".$_REQUEST["valor"]." ORDER BY id desc limit $inicio,$registros";
        }
        else if (isset($_REQUEST["date"]) && $_REQUEST["date"]!= "") {
        $consulta = "select * from interface WHERE data ='$dat'";
        }else{
             $consulta ="select * from interface ORDER BY id desc limit $inicio,$registros";
            }

        $dados = $mysqli->query($consulta); 
        $total = mysqli_num_rows($dados);//seleciona os itens por página 
        $con = $mysqli->query($consulta) or die($mysqli->error);
    ?>
    <img src="https://4.bp.blogspot.com/-m1WwbPYUV0U/VdHSD1q6fFI/AAAAAAAACCw/esmMxWGi58g/s1600/prodeb.jpg"  id="logo2" class="rounded mx-auto d-block my-2" alt="prodeb" width="100px" heigth="100px">
                            
    <section id="sect" >
        <h3><a href="index.php" class="fas fa-home  mx-3 d-flex justify-content-center"> INÍCIO</a></h3>
            <nav class="navbar navbar-light bg-light">

                <form action="relatorio.php" class="form-inline" method="GET">

                    <select id="select" class="custom-select" onclick="option()">
                        <option value="Codigo"selected > Codigo</option> 
                        <option value="Data">Data</option>
                        <option value="Da">Codigo/Data</option>
                    </select>
                    <input class="form-control mr-sm-2" name="valor" type="search" placeholder="Digite o Código..." aria-label="Search" >
                    <input class="form-control mr-sm-2"  name="date" placeholder="Digite a Data..." onkeypress="mascaraData( this, event )">
                    <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
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
                              }?>"  aria-label="Previous"><span aria-hidden="true">&laquo;</span>
                              <span class="sr-only">Previous</span></a>

                    </li>
                        <?php
                            //apresentar a paginaçao
                            for($i=1;$i < $numPaginas + 1;$i++)
                            {
                                 $pageitem= "page-item ";
                                //estrutura condicional se pagina for atual colocar marcador na pagina
                                if($i==$pagina){
                                $pageitem= "page-item active";}
                        ?>
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
                              } } ?>" aria-label="Next"><span aria-hidden="true">&raquo;</span>
                              <span class="sr-only">Next</span></a>
                    </li>
                </ul>
            </nav>
                                     
    </section>
                                
    <footer>
        <h2>Copyright&copy;.2020, PRODEB</h2>
    </footer>
    
    

    <script>
    
    var valor = document.getElementsByName("valor");
    var data = document.getElementsByName("date");
    var del= document.querySelectorAll(".del");
    data[0].style.display='none';

 
    
    function option(){
    
    var select = document.getElementById("select");
    var opt = select.options[select.selectedIndex];
    data[0].style.display='none';
    let screenWidth = screen.width;
    if (opt.value == "Data"){
  
        valor[0].style.display='none';
        valor[0].value="";
        data[0].style.display= '';
        if(screenWidth<385){
                data[0].style.width = '140px';
                data[0].placeholder = 'Digite a Data...';
            }
    
        }else if(opt.value == "Codigo"){
        data[0].style.display='none';
        data[0].value="";
        valor[0].style.display='';
        if(screenWidth<385){
                valor[0].style.width = '155px';
                valor[0].placeholder = 'Digite o Código...';
            }
        if(screenWidth<321){
                valor[0].style.width = '120px';
                valor[0].placeholder = 'Digite o Código...';
            }

        }else{
            data[0].style.display= '';
            valor[0].style.display='';

            if(screenWidth<385){
                valor[0].style.width = '80px';
                valor[0].placeholder = 'Cód...';
                data[0].style.width = '106px';
                data[0].placeholder = 'Data';
            }
        }
    }


    function mascaraData( campo, e )
{
	var kC = (document.all) ? event.keyCode : e.keyCode;
	var data = campo.value;
	
	if( kC!=8 && kC!=46 )
	{
		if( data.length==2 )
		{
			campo.value = data += '/';
		}
		else if( data.length==5 )
		{
			campo.value = data += '/';
		}
		else
			campo.value = data;
	}
}



function confirmet(event)
{
  let resp= confirm(`Deseja Realmente Excluir?`)
    if (resp==true)
        {
            for(var i=0;i<del.length;i++)
            {
                del[i].href=`excluir.php?id=${del[i].id}&pagina=<?php if(isset($_GET['pagina'])){echo$_GET['pagina'];}else{echo 1;}?>`
            }
            
        }
}
    
    for(var i=0;i<del.length;i++)
    {
        del[i].addEventListener('click',confirmet,false);
    }



    </script>
   </body>
</html>