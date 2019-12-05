<?PHP

    define('SITE_ROOT', realpath(dirname(__FILE__)));

    //Display errors
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    
    function clearId($id)
    {
        $LetraProibi = array(" ",",",".","'","\"","&","|","!","#","$","¨","*","(",")","`","´","<",">",";","=","+","§","{","}","[","]","^","~","?","%","ã","Ã");
        $special = array('Á','È','ô','Ç','á','è','Ò','ç','Â','Ë','ò','â','ë','Ø','Ñ','À','Ð','ø','ñ','à','ð','Õ','Å','õ','Ý','å','Í','Ö','ý','Ã','í','ö','ã',
           'Î','Ä','î','Ú','ä','Ì','ú','Æ','ì','Û','æ','Ï','û','ï','Ù','®','É','ù','©','é','Ó','Ü','Þ','Ê','ó','ü','þ','ê','Ô','ß','‘','’','‚','“','”','„');
        $clearspc = array('a','e','o','c','a','e','o','c','a','e','o','a','e','o','n','a','d','o','n','a','o','o','a','o','y','a','i','o','y','a','i','o','a',
           'i','a','i','u','a','i','u','a','i','u','a','i','u','i','u','','e','u','c','e','o','u','p','e','o','u','b','e','o','b','','','','','','');
        $newId = str_replace($special, $clearspc, $id);
        $newId = str_replace($LetraProibi, "", trim($newId));
        return strtolower($newId);
    }

    function Redirect($redirect_page)
    {
        echo '<script type="text/javascript">';
        echo 'alert("Livro Cadastrado!");';
        echo 'window.location.href = "'.$redirect_page.'"';
        echo '</script>';
    }

    function InvalidParameterAlert($text, $redirect_page)
    {
        echo '<script type="text/javascript">';
        echo 'alert("' . $text . '");';
        echo 'window.location.href = "' . $redirect_page . '";';
        echo '</script>';
    }

?>