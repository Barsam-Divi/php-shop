<?php
require_once "../includes/config.php";



$controller = (!empty($_GET['c']) ? $_GET['c'] :'index');
$action = (!empty($_GET['a']) ? $_GET['a'] :'index');




 if (file_exists("../app/controller/user/$controller.php"))
 {
     require_once "../app/controller/user/$controller.php";

//        if ($_COOKIE['user'])
//        {
//         require_once "../app/view/user/section/header.php";
//         require_once "../app/view/user/section/script.php";

            include_once "../app/view/user/$controller/$action.php";

//         require_once "../app/view/user/section/footer.php";
//        }
//        else
//        {
//            header("location:login.php");
//        }

 }
