<?PHP

$id = $_POST['id'];
$titulo = $_POST['title'];
$preco = $_POST['price'];
$imagem = $_POST['image'];

$return = "";
$return .= " <div class='cart-item' id='$id'>";
$return .= "     <img src='images/covers/$imagem.jpg' alt='product'>";
$return .= "     <div>";
$return .= "         <h4>$titulo</h4>";
$return .= "         <h5>R$ $preco</h5>";
$return .= "         <span class='remove-item'>";
$return .= "             remover";
$return .= "         </span>";
$return .= "     </div>";
$return .= " </div>";

echo $return;
