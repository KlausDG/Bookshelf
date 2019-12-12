<?php
include 'Includes/inc-mysql-connect.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function getNome($link, $table, $field, $value)
{
    $result = mysqli_query($link, "SELECT nome FROM $table WHERE $field=$value;");
    $array  = mysqli_fetch_assoc($result);
    return $array['nome'];
}

//Variáveis para uso futuro
$preco_antigo = "";
$em_promo = "";
$novo_item = "";

$query = "";

if (isset($_POST['type'])) {
    $display_type = $_POST['type'];
} else {
    $display_type = "thumb";
}

if ($display_type == "thumb") {
    $query = "SELECT id_book, title, image_cover, preco_venda FROM livro";
} 
if ($display_type == "list") {
    $query = "SELECT id_book, title, id_author, pusblish_date, nr_pages, id_publisher, image_cover, preco_venda FROM livro";
}

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

        if ($display_type == "thumb") {
            echo "<div class='col-sm-3 col-xs-6 text-center' id='item-$id'>";
            echo "    <div class='product-entry-thumb'><a class='item-link' onclick=detalhesAjax(this);>";
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

        if ($display_type == "list") {
            $paginas = $array['nr_pages'];
            //Pega a data e transforma no formato brasileiro
            $dta = date("d/m/Y", strtotime($array['publish_date']));
            //PEGA O NOME DO AUTOR NO BANCO
            $autor = getNome($link, "autor", "id_author", $array['id_author']);
            //PEGA O NOME DA EDITORA NO BANCO
            $editora = getNome($link, "editora", "id_publisher", $array['id_publisher']);

            echo "<div class='col-sm-4 col-xs-6' id='item-$id'>";
            echo "    <div class='product-entry-list'><a class='item-link' onclick=detalhesAjax(this);>";
            echo "        <div class='product-img' style='background-image: url(images/covers/$imagem_url);'>";
            if ($em_promo != "") {
                echo "            <p class='tag'><span class='sale'>Sale</span></p>";
            } elseif ($novo_item != "") {
                echo "            <p class='tag'><span class='new'>New</span></p>";
            }
            echo "        </div></a>";
            echo "        <div class='desc'>";
            echo "            <h2><strong>$titulo</strong></h2>";
            echo "            <h3><strong>Autor: </strong>$autor</h3>";
            echo "            <h3><strong>Editora: </strong>$editora<span> ($dta)</span></h3>";
            echo "            <h3><strong>$paginas</strong> Páginas</h3>";
            echo "            <div class='price'>";
            echo "               <div class='price-text'><p>R$$preco</p></div>";
            if ($preco_antigo != "") {
                echo "                <span class='sale'>R$300.00</span>";
            }
            echo "                <div class='cart-button'>";
            echo "                    <button class='btn btn-success add-cart' data-product-id='$id' data-product-title='$titulo' data-product-price='$preco' data-product-image='$imagem_url' onclick='addCart(this)'><i class='fas fa-shopping-cart'></i></button>";
            echo "                </div>";
            echo "            </div>";
            echo "        </div>";
            echo "    </div>";
            echo "</div>";
        }
    }
} else {
    echo "0 results";
}

mysqli_close($link);
