    
<?php
    $verificar  = isset($_REQUEST["nome"])&& isset($_REQUEST["login"])&&isset($_REQUEST["senha"]);
    if ($verificar)
    {
        $nome = $_REQUEST["nome"];
        $login = $_REQUEST["login"];
        $senha = $_REQUEST["senha"];
      
        $con=mysqli_connect("localhost", "root", "", "controle");
        $res = mysqli_query($con, "insert into usuarios (nome,login,senha)
                     values ('$nome','$login', '$senha') ");
        session_start();
        if ($res>0)
        {
                $_SESSION['cor'] = "alert alert-success";
                $_SESSION['res'] = "Usuário Cadastrado com Sucesso!";
        } else{
                $_SESSION['res'] = "Erro ao salvar!";
                $_SESSION['cor'] = "alert alert-danger";
             }
        }
        header('Location: user.php');

?>