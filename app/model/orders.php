<?php
class orders
{
    public function __construct()
    {
        global $db;
        $this->db =$db;
    }
    public function find($unique_code)
    {
        try
        {
            $query = $this->db->query("SELECT * FROM orders WHERE unique_code = '$unique_code' && status = 0");
            return $query->fetch();
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();

        }
    }
    public function create ($data)
    {
        try
        {
            $query = $this->db->prepare("INSERT INTO orders (user_id,unique_code,address_id,gate,price_irr,description) values (:user_id,:unique_code,:address_id,:gate,:price_irr,:description)");
            $query->bindParam(':user_id',$user_id,PDO::PARAM_INT);
            $query->bindParam(':unique_code',$unique_code);
            $query->bindParam(':address_id',$address_id,PDO::PARAM_INT);
            $query->bindParam(':gate',$gate);
            $query->bindParam(':price_irr',$price,PDO::PARAM_INT);
            $query->bindParam(':description',$description);
            $user_id = $data['user_id'];
            $unique_code = $data['unique_code'];
            $address_id = $data['address_id'];
            $gate = 'idPay';
            $price = $data['price_irr'];
            $description = $data['description'];

            $query->execute();

            return true;
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public function remove_orders($unique_code)
    {
        try
        {
            $query = $this->db->prepare("DELETE  FROM orders WHERE unique_code = '$unique_code' && status = 0");
            $query->execute();
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();

        }
    }
    public function update_status_orders($unique_code)
    {
        try
        {
            $query = $this->db->prepare("UPDATE orders SET status = 1 where unique_code = '$unique_code'");
            $query->execute();
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();

        }
    }

}