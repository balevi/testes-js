<?php
$msg = "";
$verificar  = isset($_REQUEST["login"])&& isset($_REQUEST["senha"]) ;
    
    if ($verificar){
        $login = $_REQUEST["login"];
        $senha = $_REQUEST["senha"];
           
        $con=mysqli_connect("localhost", "root", "", "controle");
        $total = mysqli_query($con, "select * from usuarios WHERE login = '$login' and senha = '$senha' ");
        $res = mysqli_num_rows($total);
        session_start();
        if ($res>0){
            $_SESSION['login'] = $login;
            $_SESSION['senha'] = $senha;
            header('Location: index.php');
        }else{
            unset ($_SESSION['login']);
            unset ($_SESSION['senha']);
            $_SESSION['erro'] = "Usuário Invalído!";
            header('Location: login.php');
        }
        
        // continuar salvando
    }else{
        $msg = "Dados incompletos";
    }
    
    print (" $msg <br/> <a href='login.php'> voltar </a>")
    

?>