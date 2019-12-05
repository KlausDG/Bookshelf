<?php

include 'Includes/inc-mysql-connect.php';

//CREATE QUERY TO DB AND PUT RECEIVED DATA INTO ASSOCIATIVE ARRAY
if (isset($_POST['query'])) {
    $output = '';
    $table = $_POST['table'];
    $query = "SELECT * FROM `$table` WHERE nome LIKE '".$_POST['query']."%'";
    $result = mysqli_query($link, $query);

    if ($row = mysqli_fetch_array($result)) {
        
        //Receber valores do banco verificando tabelas relacionais.







    }





    else {
        $output .= '<li>Nenhum item encontrado.</li>';
    }
    $output .= '</ul>';
    echo $output;
}

?>