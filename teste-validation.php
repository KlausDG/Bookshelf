<?PHP
    $username = $_POST['username'];
    $password = $_POST['pwd'];

    if ($username == "klaus" && $password == 1234) {
        session_start();
        $_SESSION['nome_usuario']   = $username;
        $_SESSION['senha_usuario']  = $password;
        header("Location: index.php");
    } 
    else 
    {
        echo '<script type="text/javascript">';
        echo 'alert("Invalid username or password");';
        echo 'window.location.href = "index.php";';
        echo '</script>';
    }
?>