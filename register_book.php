<?PHP
   function InvalidParameterAlert($text, $redirect_page)
   {
       echo '<script type="text/javascript">';
       echo 'alert("' . $text . '");';
       echo 'window.location.href = "' . $redirect_page . '";';
       echo '</script>';
   }

   function RandomImageName()
   {
       $s = strtoupper(md5(uniqid(rand(),true))); 
       $guidText = 
           substr($s,0,8) . '-' . 
           substr($s,8,4) . '-' . 
           substr($s,12,4). '-' . 
           substr($s,16,4). '-' . 
           substr($s,20); 
       return $guidText;
   }

   function Redirect()
   {
       echo '<script type="text/javascript">';
       echo 'alert("Livro Cadastrado!");';
       echo 'window.location.href = "all_books.php"';
       echo '</script>';
   }

    //Display errors
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    //Define the url of this file
    define ('SITE_ROOT', realpath(dirname(__FILE__)));

    //Sql connection
    // include 'Includes/inc-mysql-connect.php';

    //Ger variables from form //
    $title          = $_POST['input-titulo'];
    $original_title = $_POST['input-titulo-original'];
    $author         = $_POST['input-autor'];
    $language       = $_POST['input-lingua'];
    $category       = $_POST['input-categoria'];
    $publisher      = $_POST['book_publisher'];
    $pages          = $_POST['book_pages'];
    $genre_type     = $_POST['genre_type'];
    $description    = $_POST['book_description'];
    $release_year   = $_POST['releaseYear'];
    $image_url      = $_FILES['book_image']['tmp_name'];



?>