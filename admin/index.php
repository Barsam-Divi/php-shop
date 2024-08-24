<?php
require_once "../includes/config.php";



$controller = (!empty($_GET['c']) ? $_GET['c'] :'index');
$action = (!empty($_GET['a']) ? $_GET['a'] :'index');




 if (file_exists("../app/controller/admin/$controller.php"))
 {
     require_once "../app/controller/admin/$controller.php";
     if (isset($_COOKIE['admin']))
     {
         require_once "../app/view/admin/section/header.php";
         require_once "../app/view/admin/section/script.php";

         include_once "../app/view/admin/$controller/$action.php";

         require_once "../app/view/admin/section/footer.php";
     }
     else
     {
         header("location:login.php");
     }
 }

