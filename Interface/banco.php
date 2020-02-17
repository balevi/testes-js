    
    <?php
    $msg = "";
    $verificar  = isset($_REQUEST["id"])&& isset($_REQUEST["cod"])&&isset($_REQUEST["tipo"])&&isset($_REQUEST["horas"]);
    
    if ($verificar){
        $id = $_REQUEST["id"];
        $cod = $_REQUEST["cod"];
        $tipo = $_REQUEST["tipo"];
        $horas = $_REQUEST["horas"];
        $entrada = 1883;
        $saida=2345;
      
        $con=mysqli_connect("localhost", "root", "", "controle");
        $res = mysqli_query($con, "insert into interface(id,codigo,tipo,horas)
                     values ('$id','$cod', '$tipo','$horas') ");
        if ($res>0){
            $msg = "Salvo com sucesso!";
        }else{
            $msg =  "Erro ao salvar!";
        }

    }else{
        $msg = "Dados incompletos!";
    }
    
    
?>
<script>var leitura="<?php echo $msg;?>"; alert(leitura);location.href='relatorio.php';</script>