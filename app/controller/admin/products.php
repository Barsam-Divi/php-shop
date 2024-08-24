<?php
require_once "../app/model/categories.php";
require_once "../app/model/products.php";
require_once "../app/model/Admin.php";
require_once "../app/model/fileupload.php";
$categories_OBJ = new categories();
$products_OBJ = new  products();
$admin_OBJ = new  Admin();
$fileupload_OBJ = new  fileupload();
switch ($action)
{
    case 'list' :

        $products = $products_OBJ->products();
        $categories = $categories_OBJ->categories();

        break;

    case 'add' :

        $categories = $categories_OBJ->categories();

        break;


    case 'create' :

        $pic = "storage/other/noimage.PNG";
        if ($_FILES['pic']['size'] > 0)
        {
            $_POST['pic'] =  $fileupload_OBJ->uploader($_FILES['pic']);
        }
        $_POST['pic'] = (!empty($_POST['pic'])? $_POST['pic'] : $pic);

        if (isset($_COOKIE['admin']))
        {
            $admin_id = $admin_OBJ->find($_COOKIE['admin']);

            $_POST['admin_id'] = $admin_id['id'];

        } else
        {
            header("location:login.php");
        }
        $_POST['slug'] = str_replace(array(
            ' ',
            '!',
            '(',
            ')',
        ),"-",$_POST['title']);
        if ($_POST['discount'] > 0)
        {
                $_POST['sellingprice'] = $products_OBJ->selingprice($_POST['price'],$_POST['discount']);
        }
        else
        {
            $_POST['sellingprice'] = $_POST['price'];
        }
        $products_OBJ->create($_POST);
        header("location:index.php?c=products&a=list");
        break;

    case 'delete' :
        $products_OBJ->delete($_GET['id']);
        header("location:index.php?c=products&a=list");

        break;

    case 'read' :

        $products = $products_OBJ->read($_GET['id']);


        $categories = $categories_OBJ->categories();

        break;

    case 'update' :
    {

        if (isset($_COOKIE['admin']))
        {
            $admin_id = $admin_OBJ->find($_COOKIE['admin']);
            $_POST['admin_id'] =$admin_id;

        } else
        {
            header("location:login.php");
        }
        $_POST['slug'] = str_replace(array(
            ' ',
            '!',
            '(',
            ')',
        ),"-",$_POST['title']);
        if ($_POST['discount'] > 0)
        {
            $_POST['sellingprice'] = $products_OBJ->selingprice($_POST['price'],$_POST['discount']);
        }
        else
        {
            $_POST['sellingprice'] = $_POST['price'];
        }
        if ($_FILES['pic']['size'] > 0)
        {
            $_POST['pic'] =  $fileupload_OBJ->uploader($_FILES['pic']);
        } else
        {
            $_POST['pic'] = $_GET['pn'];
        }
        $_POST['id'] = $_GET['id'];
        $products_OBJ->update($_POST);
        header("location:index.php?c=products&a=list");

    }
}