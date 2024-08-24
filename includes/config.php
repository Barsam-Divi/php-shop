<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$database = '';
$database ="online_shop";
try
{
    $db = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e){
    echo 'Error :'.$e->getMessage();
}















