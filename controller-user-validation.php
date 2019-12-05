<?PHP
    include 'Includes/inc-mysql-connect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    //Acessa o banco de dados e pega o password hash armazenado;
    $username_sql = "SELECT pwd FROM usuario WHERE username='$username'";

    if ($username_result = mysqli_query($link, $username_sql)) 
    {
        $username_array     = mysqli_fetch_assoc($username_result);
        $username_pwd_hash  = $username_array['pwd'];
        $check_password     = password_verify($password, $username_pwd_hash);
        mysqli_close($link);
        if ($check_password) 
        {
            session_start();
            $_SESSION['nome_usuario']   = $username;
            $_SESSION['senha_usuario']  = $password;
        
            header("Location: view-index-admin.php");
        }
        else
        {
            echo '<script type="text/javascript">';
            echo 'alert("Você não tem permissão para acessar essa área do site.");';
            echo 'window.location.href = "view-index.html";';
            echo '</script>';
        }
    } 
?>