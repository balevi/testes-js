<?php
    $msg = "";
    $verificar = isset($_REQUEST["id"]);
        if ($verificar){
        $id = $_REQUEST["id"];
        $con = mysqli_connect("localhost", "root" , "","controle") or die("Mensagem");
        $res = mysqli_query($con,"delete from interface where id='$id'"); 
        session_start();        
         if ($res>0){
            $_SESSION['msg'] = "Registro excluido com sucesso!";
        }else{
            $_SESSION['msg'] = "Erro ao excluir";
        }
    }else{
        $_SESSION['msg'] = "Dados invalidos";
        //location.href='relatorio.php?pagina=<?php echo$_GET['pagina'];?''>';
    }
    session_start();
    if (isset($_GET['pagina'])){
        $pagina = $_GET['pagina'];
    }
    header("location:relatorio.php?pagina=$pagina");
    ?>
