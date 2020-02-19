    
    <?php
    $msg = "";
    $verificar  = isset($_REQUEST["id"])&& isset($_REQUEST["cod"])&&isset($_REQUEST["tipo"])&&isset($_REQUEST["horas"])&&isset($_REQUEST["data"]);
    
    if ($verificar){
        $id = $_REQUEST["id"];
        $cod = $_REQUEST["cod"];
        $tipo = $_REQUEST["tipo"];
        $horas = $_REQUEST["horas"];
        $data = $_REQUEST["data"];
        $entrada = 1883;
        $saida=2345;
      
        $con=mysqli_connect("localhost", "root", "", "controle");
        $res = mysqli_query($con, "insert into interface(id,codigo,tipo,horas,data)
                     values ('$id','$cod', '$tipo','$horas','$data') ");
        if ($res>0){
            $msg = "Salvo com sucesso!";
        }else{
            $msg =  "Erro ao salvar!";
        }

    }else{
        $msg = "Dados incompletos!";
        // alert(leitura);
    }
    
    
?>
<script>var leitura="<?php echo $msg;?>";location.href='relatorio.php';</script>