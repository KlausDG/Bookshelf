<?php 
    session_start();

    if (IsSet($_SESSION['nome_usuario'])) 
    {
        $username = $_SESSION['nome_usuario'];
    }

    if (IsSet($_SESSION['senha_usuario'])) 
    {
        $password = $_SESSION['senha_usuario'];
    }

    if ((empty($username) || empty($password)))
    {
        echo '<script type="text/javascript">';
        echo 'window.location.href = "index.php";';
        echo '</script>';
    }
?>