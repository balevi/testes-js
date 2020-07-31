    
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
        session_start();
        if ($res>0)
        {
             if ($tipo == "Entrada"){
                $_SESSION['cor'] = "alert alert-success";
             }else{
                $_SESSION['cor'] = "alert alert-danger";
             }
                $_SESSION['res'] = "$tipo do Veículo, Nº: ".$cod."";
        } else{
                $_SESSION['res'] = "Erro ao salvar!";
                $_SESSION['cor'] = "alert alert-danger";
             }

    }else{
        $_SESSION['res'] = "Dados incompletos!";
        $_SESSION['cor'] = "alert alert-danger";
            
        }  
        header('Location: index.php');
?>
