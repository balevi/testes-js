<?php
    $msg = "";
    $verificar = isset($_REQUEST["id"]);
    $status = 0;
    if(isset($_REQUEST["confir"])){
        $status = 1;       
    }

        if ($verificar == true && $status == 1){
            
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
    if($status == 0){
    $_SESSION['confirmed'] = $_REQUEST["id"];
    }
   // header("location:relatorio.php");

   header("location:relatorio.php?pagina=$pagina");
    ?>