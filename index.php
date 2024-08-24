<?php
#age bargashti site ro kamel koni az user panle shoro kon bakhash haye dige taghirab kamel shodan faghat validate mikhan
require_once  "includes/config.php";
require_once "app/model/products.php";
require_once "app/model/categories.php";
require_once "app/model/user.php";
require_once "app/model/carts.php";

$categories_OBJ = new categories();

$categories = $categories_OBJ->parent();

if (isset($_COOKIE['user']))
{
    $user_OBJ = new  user();
    $user_info = (object)$user_OBJ->find($_COOKIE['user']);
    $carts_OBJ = new carts();
    $carts_info = $carts_OBJ->find_card($user_info->id);

}

$controller = (!empty($_GET['c']) ? $_GET['c'] :'home');
$action = (!empty($_GET['a']) ? $_GET['a'] :'index');




if (file_exists("app/controller/public/$controller.php"))
{
    require_once "app/controller/public/$controller.php";

        require_once "app/view/public/section/header.php";
        include_once "app/view/public/$controller/$action.php";
        require_once "app/view/public/section/script.php";
        require_once "app/view/public/section/footer.php";


}