<?php
class user
{
    public function __construct()
    {
        global $db;
        $this->db =$db;
    }
    public function find($email)
    {
            $query = $this->db->query("SELECT * FROM users WHERE email ='$email' limit 1");
            return $query->fetch();
    }
    public function register($data)
    {
        try
        {
            $query =  $this->db->prepare("INSERT INTO users (first_name,last_name,email,password) values (:first_name,:last_name,:email,:password)");
            $query->bindParam(':first_name',$fist_name);
            $query->bindParam(':last_name',$last_name);
            $query->bindParam(':email',$email);
            $query->bindParam(':password',$password);
            $fist_name =$data['first_name'];
            $last_name =$data['last_name'];
            $email =$data['email'];
            $password =$data['password'];
            $query->execute();
            return true;
        } catch (PDOException $e)
        {
            echo $e->getMessage();
            return false;
        }
    }

}