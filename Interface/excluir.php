<?php
    $msg = "";
    $verificar = isset($_REQUEST["id"]);
        if ($verificar){
        $id = $_REQUEST["id"];
        $con = mysqli_connect("localhost", "root" , "","controle") or die("Mensagem");
        $res = mysqli_query($con,"delete from interface where id='$id'"); 
            
         if ($res>0){
            $msg = "Dados excluidos com sucesso";
        }else{
            $msg = "Erro ao excluir";
        }
    }else{
        $msg = "Dados invalidos";
    }
    ?>
    <script>location.href='relatorio.php';</script>
