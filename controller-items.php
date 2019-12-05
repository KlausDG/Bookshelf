<?php
    include 'Includes/inc-mysql-connect.php';

    if ($_POST['value'] == "Todos") {
        $sql = "SELECT * FROM livro;";
    } elseif ($_POST['value'] == "HQs") {
        $sql = "SELECT * FROM livro WHERE id_category = 1";
    } elseif ($_POST['value'] == "Livros") {
        $sql = "SELECT * FROM livro WHERE id_category = 2";
    } elseif ($_POST['value'] == "Mangás") {
        $sql = "SELECT * FROM livro WHERE id_category = 3";
    } else {
        $sql = $_POST['value'];
    }
    $result   = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($array = mysqli_fetch_assoc($result)) {
            $id         = $array['id_book'];
            $titulo     = $array['title'];
            $imagem_url = $array['image_cover'];
            $preco      = $array['preco_venda'];

            echo "<div class='item-card'>";
            echo "    <img class='item-image p-0' src='images/covers/$imagem_url'>";
            echo "    <div class='text-center pt-1'>";
            echo "        <h4 class='item-text-name'>$titulo</h2>";
            echo "        <h6 class='item-text-price'>$$preco</h3>";
            echo "        <input type='hidden' name='livro_id' value='$id'>";
            echo "    </div>";
            echo "</div>";
        }
    } else {
        echo "0 results";
    }

    mysqli_close($link);
