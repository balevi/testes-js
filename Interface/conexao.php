
<?php
        $host = "localhost";
        $usuario = "root";
        $senha = "";
        $bd = "controle";   
                        
        $mysqli = new mysqli($host, $usuario, $senha, $bd);//conexao com o banco de dados
        if (mysqli_connect_errno()) { // verificar se conexao teve sucesso, caso contrario voltara para index
            $msg =  "Erro Conexão Banco de dados !";
           ?>
           <script> location.href='index.php?res=<?php echo $msg; ?>'; </script>
           <?php
           exit();
        }
        
        $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;//verifica a página atual, caso contrario atribui como 1ª página para a paginação
    


        $registros = 13;//seta a quantidade de itens por página, neste caso, 13 itens
        $inicio = ($registros*$pagina)-$registros;//variavel para calcular o início da visualização com base na página atual  


        if (isset($_REQUEST["date"]) && $_REQUEST["date"]!= "" && isset($_REQUEST["valor"]) && $_REQUEST["valor"]!= ""){
            $dat= $_GET["date"];
            // consulta para ser exibida a partir do tipo de buscar solicitado pelo usúario seja por codigo ou data ou ambos
            $consulta = "select * from interface WHERE codigo = ".$_REQUEST["valor"]." AND data ='$dat'ORDER BY id desc limit $inicio,$registros";
            // consulta para definir o numero de pagina através numeros de registros
            $consulta_paginacao = "select * from interface WHERE codigo = ".$_REQUEST["valor"]." AND data ='$dat'";
        } 
        else if(isset($_REQUEST["valor"]) && $_REQUEST["valor"]!= ""){
            $consulta = "select * from interface WHERE codigo = ".$_REQUEST["valor"]." ORDER BY id desc limit $inicio,$registros";
            $consulta_paginacao = "select * from interface WHERE codigo = ".$_REQUEST["valor"]."";
        }
        else if (isset($_REQUEST["date"]) && $_REQUEST["date"]!= "") {
            $dat= $_GET["date"];
            $consulta = "select * from interface WHERE data ='$dat'ORDER BY id desc limit $inicio,$registros";
            $consulta_paginacao = "select * from interface WHERE data ='$dat'";
        }else{ 
            $consulta ="select * from interface ORDER BY id desc limit $inicio,$registros";
            $consulta_paginacao = "select * from interface  ";
            }
        
        $dados2 = $mysqli->query($consulta_paginacao);
        $total = mysqli_num_rows($dados2);//seleciona quantidade de pagina a depender do tipo de busca 
        $numPaginas = ceil($total/$registros);//calcula o número de páginas arredondando o resultado para cima 

        $dados = $mysqli->query($consulta);
        $con = $mysqli->query($consulta) or die($mysqli->error);