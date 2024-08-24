<?php
require_once "../app/model/Admin.php";
$admin_obj =new Admin();
switch ($action)
{
    case 'login' :
        $email = $_POST['email'];
        if (filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            $password_regex = "/^(?=.*?[a-z])(?=.*?[0-9]).{8,}$/";

            if (preg_match($password_regex,$_POST['password']))
            {
                $password = $_POST['password'];

                $admin = $admin_obj->find($email);

                $admin_password = $admin['password'];

                if ($admin && password_verify("$password","$admin_password"))
                {
                    setcookie('admin',$email, time() + (86400 * 30));

                    header("location:index.php?c=dashboard&a=index");

                } else
                {

                    header("location:login.php") ;

                }
            } else
            {

                header("location:login.php") ;

            }

        } else
        {

            header("location:login.php") ;

        }
        break ;
    case 'logout' :
        {
            setcookie('admin','',time() - 3600);
            header("location:login.php");
        }
        break;
}





