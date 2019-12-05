<?php
    include 'Includes/inc-mysql-connect.php';
    include 'Includes/inc-main.php';

    //AJAX
    if (isset($_POST['id'])) {
        $type = $_POST['type'];
        $table = $_POST['id'];
        $output = '';
        $query = "SELECT nome FROM `$table`";
        $result = mysqli_query($link, $query);

        if (mysqli_num_rows($result) > 0) {
            if ($type == 'checkbox') {
                while ($row = mysqli_fetch_array($result)) {
                    $output .= '<div><label class=""><input type="checkbox" name="input-genero[]" value="'.$row['nome'].'"> '.$row['nome'].'</label></div>';
                }
            } elseif ($type == 'dropdown') {
                $output = '<option value="none"></option>';
                while ($row = mysqli_fetch_array($result)) {
                    $output .= '<option value="'.$row['nome'].'">'.$row['nome'].'</option>';
                }
    
                $output .= $table.",".$output;
            }
        }

        echo $output;
    }

    mysqli_close($link);
