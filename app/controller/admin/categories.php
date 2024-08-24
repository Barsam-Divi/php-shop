<?php
require_once "../app/model/categories.php";
$categories_OBJ = new categories();
switch ($action)
{
    case 'list' :

        $categories =$categories_OBJ->categories();

        break;

    case 'add' :

        $categories =$categories_OBJ->categories();

        break;


    case 'create' :
            $_POST['parent_id'] =(isset($_POST['parent_id']) ? $_POST['parent_id'] : NULL);

            $_POST['slug'] = str_replace(array(
                ' ',
                '!',
                '(',
                ')',
            ),"-",$_POST['title']);

            $categories_OBJ->create($_POST);

            header("location:index.php?c=categories&a=list");


        break;

    case 'delete' :

        $categories_OBJ->delete($_GET['id']);

        header("location:index.php?c=categories&a=list");


        break;

    case 'read' :

            $cat = $categories_OBJ->read($_GET['id']);

            $categories =$categories_OBJ->categories();

        break;

    case 'update' :
    {

        $_POST['parent_id'] =(isset($_POST['parent_id']) ? $_POST['parent_id'] : NULL);

        $_POST['slug'] = str_replace(array(
            ' ',
            '!',
            '(',
            ')',
        ),"-",$_POST['title']);

        $_POST['category_id'] = $_GET['id'];

        $categories_OBJ->update((object)$_POST);

        header("location:index.php?c=categories&a=list");


    }
}
