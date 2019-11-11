<?php
    include 'Includes/inc-mysql-connect.php';

    function clearId($id)
    {
        $LetraProibi = array(" ",",",".","'","\"","&","|","!","#","$","¨","*","(",")","`","´","<",">",";","=","+","§","{","}","[","]","^","~","?","%");
        $special = array('Á','È','ô','Ç','á','è','Ò','ç','Â','Ë','ò','â','ë','Ø','Ñ','À','Ð','ø','ñ','à','ð','Õ','Å','õ','Ý','å','Í','Ö','ý','Ã','í','ö','ã',
           'Î','Ä','î','Ú','ä','Ì','ú','Æ','ì','Û','æ','Ï','û','ï','Ù','®','É','ù','©','é','Ó','Ü','Þ','Ê','ó','ü','þ','ê','Ô','ß','‘','’','‚','“','”','„');
        $clearspc = array('a','e','o','c','a','e','o','c','a','e','o','a','e','o','n','a','d','o','n','a','o','o','a','o','y','a','i','o','y','a','i','o','a',
           'i','a','i','u','a','i','u','a','i','u','a','i','u','i','u','','e','u','c','e','o','u','p','e','o','u','b','e','o','b','','','','','','');
        $newId = str_replace($special, $clearspc, $id);
        $newId = str_replace($LetraProibi, "", trim($newId));
        return strtolower($newId);
    }

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
                    $output .= '<div><label class=""><input type="checkbox" name="input-genero[]" value="'.clearId($row['nome']).'"> '.$row['nome'].'</label></div>';
                }
            } elseif ($type == 'dropdown') {
                $output = '<option value="none"></option>';
                while ($row = mysqli_fetch_array($result)) {
                    $output .= '<option value="'.clearId($row['nome']).'">'.$row['nome'].'</option>';
                }
    
                $output .= $table.",".$output;
            }
        }

        echo $output;
    }

    mysqli_close($link);
