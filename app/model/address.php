<?php
class address
{
    public function __construct()
    {
        global $db;
        $this->db =$db;
    }
    public function find($id)
    {
        try {
            $query = $this->db->query("SELECT * FROM addresses WHERE user_id ='$id'  ORDER BY id DESC LIMIT 1");
            return $query->fetch();

        } catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public function create ($data)
    {
        try
        {
            $query = $this->db->prepare("INSERT INTO addresses (user_id,province,city,address,zip_code,mobile) values (:user_id,:province,:city,:address,:zip_code,:mobile)");
            $query->bindParam(':user_id',$user_id,PDO::PARAM_INT);
            $query->bindParam(':province',$province);
            $query->bindParam(':city',$city);
            $query->bindParam(':address',$address);
            $query->bindParam(':zip_code',$zip_code,PDO::PARAM_INT);
            $query->bindParam(':mobile',$mobile);
            $user_id = $data['user_id'];
            $province = $data['province'];
            $city = $data['city'];
            $address = $data['address'];
            $zip_code = $data['zip_code'];
            $mobile = $data['mobile'];

            $query->execute();

            return true;
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();

        }
    }
    public function update($data)
    {
        try
        {
            $query = $this->db->prepare("UPDATE addresses set 
            province =:province,
            city = :city,
            address =:address,
            zip_code =:zip_code,
            mobile =:mobile 
            WHERE user_id = :user_id  ");
            $query->bindParam(':province',$province);
            $query->bindParam(':city',$city);
            $query->bindParam(':address',$address);
            $query->bindParam(':zip_code',$zip_code,PDO::PARAM_INT);
            $query->bindParam(':mobile',$mobile);
            $query->bindParam(':user_id',$user_id,PDO::PARAM_INT);
            $province = $data['province'];
            $city = $data['city'];
            $address = $data ['address'];
            $zip_code = $data['zip_code'];
            $mobile = $data['mobile'];
            $user_id = $data['user_id'];

            $query->execute();

            return true;
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}
