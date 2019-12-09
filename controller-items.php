<?php
include 'Includes/inc-mysql-connect.php';

//Variáveis para uso futuro
$preco_antigo = "";
$em_promo = "";
$novo_item = "";

$query = "SELECT id_book, title, image_cover, preco_venda FROM livro";

if ($_POST['value'] == "Todos") {
    $sql = $query . ";";
} elseif ($_POST['value'] == "HQs") {
    $sql = $query . " WHERE id_category = 1";
} elseif ($_POST['value'] == "Livros") {
    $sql = $query . " WHERE id_category = 2";
} elseif ($_POST['value'] == "Mangás") {
    $sql = $query . " WHERE id_category = 3";
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

        echo "<div class='col-sm-3 col-xs-6 text-center' id='item-$id'>";
        echo "    <div class='product-entry'><a class='item-link' onclick=detalhesAjax(this);>";
        echo "        <div class='product-img' style='background-image: url(images/covers/$imagem_url);'>";
        if ($em_promo != "") {
            echo "            <p class='tag'><span class='sale'>Sale</span></p>";
        } elseif ($novo_item != "") {
            echo "            <p class='tag'><span class='new'>New</span></p>";
        }
        echo "        </div></a>";
        echo "        <div class='desc'>";
        echo "            <h3><strong>$titulo</strong></h3>";
        echo "            <p class='price'><span>R$$preco</span>";
        if ($preco_antigo != "") {
            echo "                <span class='sale'>R$300.00</span>";
        }
        echo "            </p>";
        echo "        </div>";
        echo "        <div class='cart-button'>";
        echo "            <button class='btn btn-success add-cart' data-product-id='$id' data-product-title='$titulo' data-product-price='$preco' data-product-image='$imagem_url' onclick='addCart(this)'>Adicionar ao carrinho</button>";
        echo "        </div>";
        echo "    </div>";
        echo "</div>";
    }
} else {
    echo "0 results";
}

mysqli_close($link);
