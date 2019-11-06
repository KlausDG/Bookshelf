<?php

include 'Includes/inc-mysql-connect.php';

//CREATE QUERY TO DB AND PUT RECEIVED DATA INTO ASSOCIATIVE ARRAY
if (isset($_POST['query'])) {
    $output = '';
    $table = $_POST['table'];
    $query = "SELECT nome FROM `$table` WHERE nome LIKE '".$_POST['query']."%'";
    $result = mysqli_query($link, $query);
    $output = '<ul class="list-unstyled rounded" style="background-color: rgba(0,0,0,.03);">';
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_array($result)){
            $output .= '<li class="dropdown-item" style="cursor: pointer;">'.$row["nome"].'</li>';
        }
    }
    else {
        $output .= '<li>Nenhum item encontrado.</li>';
    }
    $output .= '</ul>';
    echo $output;
}

?>