<?php
class payments_fail
{
    public function __construct()
    {
        global $db;
        $this->db =$db;
    }
    public function create ($data)
    {
        try
        {
            $query = $this->db->prepare("INSERT INTO payments_fail (user_id,order_id,transaction_code,status,error_code) values (:user_id,:order_id,:transaction_code,:status,:error_cide)");
            $query->bindParam(':user_id',$user_id,PDO::PARAM_INT);
            $query->bindParam(':order_id',$order_id,PDO::PARAM_INT);
            $query->bindParam(':transaction_code',$transaction_code);
            $query->bindParam(':status',$status,PDO::PARAM_INT);
            $query->bindParam(':error_code',$error_code,PDO::PARAM_INT);
            $user_id = $data['user_id'];
            $order_id = $data['order_id'];
            $transaction_code = $data['transaction_code'];
            $status = $data['status'];
            $error_code = $data['error_code'];

            $query->execute();

            return true;
        }
        catch (PDOException $e)
        {
            return $e->getMessage();
        }
    }
}