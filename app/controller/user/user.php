<?php
require_once "../app/model/user.php";
$user_OBJ = new user();
switch ($action)
{
    case 'login' :

        $email = $_POST['email'];
        if (filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $password_regex = "/^(?=.*?[a-z])(?=.*?[0-9]).{8,}$/";

            if (preg_match($password_regex,$_POST['password']))
            {
                $password = $_POST['password'];

                $user = $user_OBJ->find($email);

                $user_pass = $user['password'];

                if ($user && password_verify("$password","$user_pass"))
                {

                    setcookie('user', $email, time() + (86400 * 30) ,'/');

                    header("location:index.php?c=dashboard&a=index");

                }
                else
                {

                    header("location:login.php");
                    echo "رمز عبور یا ایمیل اشتباه است";
                }

            } else
            {

                header("location:login.php");
            }
        } else
        {

            header("location:login.php");

        }

        break ;
    case 'register' :

        if ($_POST['password']==$_POST['re_password'])
        {
            $email = $_POST['email'];
            if (filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $password_regex = "/^(?=.*?[a-z])(?=.*?[0-9]).{8,}$/";

                if (preg_match($password_regex, $_POST['password']))
                {
                    $password = $_POST['password'];
                    $_POST['password'] = password_hash("$password",PASSWORD_ARGON2ID,['memory_cost'=>2024,'time_cost'=>4,'threads'=>4]);
                    $user = $user_OBJ->find($email);

                    if (!$user)
                    {
                        $user_register = $user_OBJ->register($_POST);

                        if ($user_register)
                        {
                            header("location:login.php");
                        } else {
                            header("location:register.php");
                            echo "خطایی ایجاد شده لطفا دوباره تلاش کنید";

                        }
                    }
                    else
                    {

                        header("location:register.php");
                        echo "ایمیل از قبل استفاده شده";
                    }

                }
                else
                {

                    header("location:register.php");
                }
            }
            else
            {

                header("location:register.php");

            }

        }
        else
        {

            header("location:register.php");


        }


    break;
    case 'logout' :
        {
            setcookie('user','',time() - 3600,'/');
            header("location:login.php");
        }
        break;



}