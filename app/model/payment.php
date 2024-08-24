<?php
class payment
{
    public function __construct()
    {
        global $db;
        $this->db =$db;
    }
    public function create_transaction($data)
    {
        return $this->curl_post('https://pay.ir/pg/send', [
            'api' => 'test',
            'amount' => $data['total'],
            'redirect' => 'http://localhost/amozesh%20php/project(SHOP)/index.php?c=products&a=callback',
            'mobile' => $data['mobile'],
            'factorNumber' => $data['order_id'],
            'description' => $data['description'] = null,
        ]);
    }
    public function verify_transaction($data)
    {
        return $this->curl_post('https://pay.ir/pg/verify', [
            'api' => 'test',
            'token' => $data,
        ]);
    }
    public function curl_post($url, $params)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
        ]);
        $res = curl_exec($ch);
        curl_close($ch);

        return $res;
    }
    public function create ($data)
    {
        try
        {
            $query = $this->db->prepare("INSERT INTO payments (user_id,order_id,tracking_code,transaction_code,status,card_pan,amount_irr) values (:user_id,:order_id,:tracking_code,:transaction_code,:status,:card_pan,:amount_irr)");
            $query->bindParam(':user_id',$user_id,PDO::PARAM_INT);
            $query->bindParam(':order_id',$order_id,PDO::PARAM_INT);
            $query->bindParam(':tracking_code',$tracking_code);
            $query->bindParam(':transaction_code',$transaction_code);
            $query->bindParam(':status',$status,PDO::PARAM_INT);
            $query->bindParam(':card_pan',$card_pan);
            $query->bindParam(':amount_irr',$amount_rr,PDO::PARAM_INT);
            $user_id = $data['user_id'];
            $order_id = $data['order_id'];
            $tracking_code = $data['tracking_code'];
            $transaction_code = $data['transaction_code'];
            $status = $data['status'];
            $card_pan = $data['card_pan'];
            $amount_rr = $data['amount_irr'];

            $query->execute();

            return true;
        }
        catch (PDOException $e)
        {
            return $e->getMessage();
        }
    }
    public function find ($tracking_code)
    {
        try
        {
            $query = $this->db->query("SELECT * FROM payments WHERE tracking_code = '$tracking_code' limit 1");
            return $query->fetch();

        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}