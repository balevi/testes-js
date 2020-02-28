    
<?php
    $msg = "";
    $verificar  = isset($_REQUEST["id"])&& isset($_REQUEST["cod"])&&isset($_REQUEST["tipo"]);
    date_default_timezone_set('America/Sao_Paulo');
    if ($verificar)
    {
        $id = $_REQUEST["id"];
        $cod = $_REQUEST["cod"];
        $tipo = $_REQUEST["tipo"];
        $horas = date('H : i');
        $data = date('d/m/Y');
      
      
        $con=mysqli_connect("localhost", "root", "", "controle");
        $res = mysqli_query($con, "insert into interface(id,codigo,tipo,horas,data)
                     values ('$id','$cod', '$tipo','$horas','$data') ");
        if ($res>0)
        {
                    $msg = "Nº: ".$cod.", Salvo com sucesso!";
        } else{
                $msg =  "Erro ao salvar!";
             }

    }else{
            $msg = "Dados incompletos!";
            // alert(leitura);
        }  
        
?>
<script>var leitura="<?php echo $msg;?>";location.href='index.php?res=<?php echo $msg; ?>';</script>}
