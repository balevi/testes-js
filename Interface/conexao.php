
<?php
        $host = "localhost";
        $usuario = "root";
        $senha = "";
        $bd = "controle";   
                        
        $mysqli = new mysqli($host, $usuario, $senha, $bd);//conexao com o banco de dados
        session_start();
        if (mysqli_connect_errno()) { // verificar se conexao teve sucesso, caso contrario voltara para index
            $_SESSION['res'] = "Erro Conexão Banco de dados!";
            header('Location: index.php');
           exit();
        }
        
        if(empty($_SESSION['login']) || empty($_SESSION['senha']))
            {
                unset($_SESSION['login']);
                unset($_SESSION['senha']);
                header('location:login.php');
            }
        
        
        if (isset($_SESSION['msg']))
            { ?>
                <div class="d-flex justify-content-center alert alert-danger alert-dismissible fade show" role="alert">
                    <?php $result = $_SESSION['msg']; echo $result; unset($_SESSION['msg']); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
      <?php }
        
        if (isset($_SESSION['confirmed']))
            { ?>
                <div class="d-flex justify-content-center alert alert-warning alert-dismissible fade show" role="alert">
                    <?php  echo 'Deseja Realmente Excluir?';?>
                    <a class="btn btn-outline-danger far fa-check-circle ml-2" href="delete.php?pagina=<?php if(isset($_GET['pagina'])){echo$_GET['pagina'];}else{echo 1;} ?>&confir=<?php echo 1;?>&id= <?php echo $_SESSION['confirmed']; ?> "> </a>    
                    <a class="btn btn-outline-success ml-2" href="relatorio.php" >Cancelar</a>   
                       
                   <?php unset($_SESSION['confirmed']); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
      <?php }
        

        if (isset($_REQUEST['valor']) && empty($_REQUEST["date"])  ){
            if (!ctype_space($_REQUEST['valor']) && $_REQUEST["valor"] != "" ) {
                $_SESSION['valor'] = $_REQUEST["valor"];  
            }
            unset($_SESSION["date"]);
        }
        if (isset($_REQUEST['date']) && empty($_REQUEST["valor"])  ){
            if (!ctype_space($_REQUEST['date']) && $_REQUEST["date"] != "") {
                $_SESSION['date'] = "'".$_REQUEST["date"]."'";
            }
            unset($_SESSION["valor"]);
        }

        if (isset($_REQUEST['valor']) && isset($_REQUEST["date"]) ){
            if (!ctype_space($_REQUEST['valor']) && $_REQUEST["valor"] != ""  && !ctype_space($_REQUEST['date']) && $_REQUEST["date"] != "") {
                $_SESSION['valor'] = $_REQUEST["valor"]; 
                $_SESSION['date'] = "'".$_REQUEST["date"]."'";      
            } 
        }
            
                
        $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;//verifica a página atual, caso contrario atribui como 1ª página para a paginação

        $registros = 13;//seta a quantidade de itens por página, neste caso, 13 itens
        $inicio = ($registros*$pagina)-$registros;//variavel para calcular o início da visualização com base na página atual  


        if (isset($_SESSION["date"]) && $_SESSION["date"]!= "" && isset($_SESSION["valor"]) && $_SESSION["valor"]!= ""){
            // consulta para ser exibida a partir do tipo de buscar solicitado pelo usúario seja por codigo ou data ou ambos
            $consulta = "select * from interface WHERE codigo = ".$_SESSION["valor"]." AND data = ".$_SESSION["date"]." ORDER BY id desc limit $inicio,$registros";
            // consulta para definir o numero de pagina através numeros de registros
            $consulta_paginacao = "select * from interface WHERE codigo = ".$_SESSION["valor"]." AND data = ".$_SESSION["date"]." ";
       
        } 
        else if (isset($_SESSION["valor"]) && $_SESSION["valor"]!= ""){
            $consulta = "select * from interface WHERE codigo = ".$_SESSION["valor"]." ORDER BY id desc limit $inicio,$registros";
            $consulta_paginacao = "select * from interface WHERE codigo = ".$_SESSION["valor"]."";
        }
        else if (isset($_SESSION["date"]) && $_SESSION["date"]!= "") {
            $consulta = "select * from interface WHERE data = ".$_SESSION["date"]." ORDER BY id desc limit $inicio,$registros";
            $consulta_paginacao = "select * from interface WHERE data = ".$_SESSION["date"]."";
           
        }else{ 
            $consulta ="select * from interface ORDER BY id desc limit $inicio,$registros";
            $consulta_paginacao = "select * from interface  ";
      
            }
        


        $dados2 = $mysqli->query($consulta_paginacao);
        $total = mysqli_num_rows($dados2);//seleciona quantidade de pagina a depender do tipo de busca 
        $numPaginas = ceil($total/$registros);//calcula o número de páginas arredondando o resultado para cima        
        $dados = $mysqli->query($consulta);
        $con = $mysqli->query($consulta)or die($mysqli->error);
