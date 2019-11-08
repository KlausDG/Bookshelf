<html>

<?php
    if (isset($_POST['submit'])) 
    {
        $connect = mysqli_connect('localhost', 'root', '', 'mybookshelf');

        if (!$connect) 
        {
            die("Connection failed: " . mysqli_connect_error());
        }

        $value = fopen("data.txt", "r") or die("Unable to open file!");
        $array = array();
        $array = file("data.txt", FILE_IGNORE_NEW_LINES);
        // print_r($array);
        fclose($value);

        for ($i = 0; $i < count($array); $i++) 
        {
            $tmp = $array[$i];
            echo $tmp;
            $queryText = "INSERT INTO condicao (nome) VALUES ('$tmp');";
            $query = mysqli_query($connect, $queryText);

            if (!$query) 
            {
                die('Invalid query: ' . mysqli_error($connect));
            }

            $queryText = "";
        }
    }
?>

<body>
    <form action="#" method="post">
        <input type="submit" name="submit" value="submit">
    </form>
</body>

</html>