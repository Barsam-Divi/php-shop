<?php
class carts
{
    public function __construct()
    {
        global $db;
        $this->db =$db;
    }
    public function find_card_code($user_id)
    {

        try
        {
                $query = $this->db->query("SELECT unique_code 
            from carts
            WHERE user_id = '$user_id' && status = 0 GROUP BY unique_code 
            ");
                return $query->fetch();
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public function find_card($user_id)
    {
        try
        {
            $query = $this->db->query("SELECT carts.* ,products.title as products_title,products.slug as products_slug,products.pic as products_pic ,products.quantity as products_quantity
            from carts
            LEFT JOIN  products on products.id = carts.product_id
            WHERE user_id = '$user_id' && status = 0 
            ");
            return $query->fetchAll();
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public function add_to_card($data)
    {
        try
        {
            $this->db->exec("DELETE FROM carts WHERE user_id =$data->user_id && status = 0 && product_id = $data->product_id");
            $this->db->exec("INSERT INTO carts (user_id,product_id,unique_code,count,price) values (
                                                                       $data->user_id,
                                                                       $data->product_id,
                                                                       '$data->unique_code',
                                                                       $data->count,
                                                                       $data->price
)");
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public function remove_card($id,$user_id)
    {
       $query = $this->db->prepare("DELETE FROM carts WHERE user_id ='$user_id' && status = 0 && id = '$id'");
           return $query->execute();
    }
    public function update_carts_status($unique_code)
    {
        try
        {
            $query = $this->db->prepare("UPDATE carts set status = 1 where unique_code = '$unique_code'");
            $query->execute();
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }

    }

}