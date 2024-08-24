<?php
class Admin
{
    public function __construct()
    {
        global $db;
        $this->db =$db;
    }
    public function find($email)
    {
        try {
            $query = $this->db->query("SELECT * FROM admins WHERE email ='$email' limit 1");
            return $query->fetch();

        } catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}













