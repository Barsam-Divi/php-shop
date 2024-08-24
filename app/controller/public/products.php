<?php
require_once "app/model/products.php";
require_once "app/model/carts.php";
require_once "app/model/address.php";
require_once "app/model/orders.php";
require_once "app/model/payment.php";
require_once "app/model/payments_fail.php";
$product_OBJ = new products();
$carts_OBJ = new  carts();
$address_OBJ = new  address();
$orders_OBJ = new  orders();
$payment_OBJ = new payment();
$payment_fail_OBJ = new  payments_fail();
switch ($action)
{
    case 'show' :
        $product = $product_OBJ->readproduct($_GET['slug']);
        $similar = $product_OBJ->similar($product['category_id'],$product['id']);
        break;
    case 'list' :
        $limit = 6;
        $page = ($_GET['page'] ?? 1);
        $slug = $_GET['category'];
        $offset = ($limit * $page) -$limit;
        $products = $product_OBJ->list($slug,$offset,$limit);
        $products_number  = count($product_OBJ->products_number($slug));


        break;
    case 'AddToCart' :
        $product_value =$product_OBJ->readproduct($_GET['slug']);
            if ($product_value['id'] == $_POST['product_id'] && $product_value['sellingprice'] == $_POST['price'] && $product_value['quantity'] > $_POST['count'])
            {
                $unique_code = $carts_OBJ->find_card_code($user_info->id)['unique_code'];

                    if (empty($unique_code))
                    {
                        $unique_code = rand();
                    }

                $_POST['unique_code'] = $unique_code;
                $_POST['user_id'] = $user_info->id;

                $carts_OBJ->add_to_card((object)$_POST);

                header("location:index.php?c=products&a=show&slug=".$_GET['slug']."");
            }
            else
            {
                header("location:index.php?c=products&a=show&slug=".$_GET['slug']."");

            }
        break;
    case 'RemoveCard' :
        foreach ($carts_info as $item)
        {
            $user_id = $item['user_id'];
        }
        $remove = $carts_OBJ->remove_card($_GET['id'],$user_id);
        if ($remove)
        {
            header("location:javascript://history.go(-1)");
        }
        else
        {
            header("location:javascript://history.go(-1)");

        }
        break;
    case 'checkout' :

            $user_address = $address_OBJ->find($user_info->id);

        break;
    case 'idPay' :
    $price = 0;

        if (is_numeric($_POST['zip_code']) && is_numeric($_POST['mobile']) && !empty($_POST['address'] && $_POST['city'] && $_POST['province']))
        {

            if (strlen($_POST['mobile']) == 11)
            {

                $email = $_POST['email'];
                if (filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                    foreach ($carts_info as $item)
                    {
                        $price += $item['price'] * $item['count'];
                    }
                    $price =str_replace($price,$price.'0',$price);
                    $_POST['user_id'] = $user_info->id;
                    $_POST['city'] = trim($_POST['city']);
                    $_POST['province'] = trim($_POST['province']);
                    $user_address = $address_OBJ->find($_POST['user_id']);
                    if (empty($user_address)) {
                        unset($_POST['first_name']);
                        unset($_POST['last_name']);
                        unset($_POST['email']);
                        $address = $address_OBJ->create($_POST);
                        if ($address)
                        {
                            $order_address = $address_OBJ->find($_POST['user_id']);
                            $data['user_id'] = $_POST['user_id'];
                            $data['address_id'] .= $order_address['id'];
                            $data['unique_code'] .= $carts_OBJ->find_card_code($user_info->id)['unique_code'];
                            $data['description'] .= $_POST['description'];
                            $data['price_irr'] .= $price;
                            $order = $orders_OBJ->create($data);
                            if ($order)
                            {
                                $transaction['order_id'] = $orders_OBJ->find($carts_OBJ->find_card_code($user_info->id)['unique_code'])['id'];
                                $transaction['mobile'] = $address_OBJ->find($_POST['user_id'])['mobile'];
                                $transaction['total'] = (integer)$price;
                                $transaction_result = $payment_OBJ->create_transaction($transaction);
                                $result_tran = json_decode($transaction_result);
                                if($result_tran->status == 1) {
                                    $go = "https://pay.ir/pg/$result_tran->token";
                                    header("Location: $go");
                                } else {
                                    echo $result_tran->errorMessage;
                                    $orders_OBJ->remove_orders($carts_OBJ->find_card_code($user_info->id)['unique_code']);

                                }
//
                            } else
                            {
                                header("location:?c=products&a=checkout");

                            }

                        } else
                        {
                            header("location:?c=products&a=checkout");

                        }
                    } elseif ($user_address['address'] == $_POST['address'] && $user_address['province'] == $_POST['province'] && $user_address['city'] == $_POST['city'] && $user_address['mobile'] == $_POST['mobile'] && $user_address['zip_code'] == $_POST['zip_code'])
                    {
                        $data['user_id'] = $_POST['user_id'];
                        $data['address_id'] .= $user_address['id'];
                        $data['unique_code'] .= $carts_OBJ->find_card_code($user_info->id)['unique_code'];
                        $data['description'] .= $_POST['description'];
                        $data['price_irr'] .= $price;
                        $order = $orders_OBJ->create($data);
                        if ($order)
                        {
                            $transaction['order_id'] = $orders_OBJ->find($carts_OBJ->find_card_code($user_info->id)['unique_code'])['id'];
                            $transaction['mobile'] = $address_OBJ->find($_POST['user_id'])['mobile'];
                            $transaction['total'] = (integer)$price;
                            $transaction_result = $payment_OBJ->create_transaction($transaction);
                            $result_tran = json_decode($transaction_result);
                            if($result_tran->status == 1) {
                                $go = "https://pay.ir/pg/$result_tran->token";
                                header("Location: $go");
                            } else {
                                echo $result_tran->errorMessage;
                                $orders_OBJ->remove_orders($carts_OBJ->find_card_code($user_info->id)['unique_code']);

                            }


                        } else
                        {

                            header("location:?c=products&a=checkout");



                        }

                    } else
                    {
                        unset($_POST['first_name']);
                        unset($_POST['last_name']);
                        unset($_POST['email']);
                        $new_address = $address_OBJ->create($_POST);
                        if ($new_address)
                        {
                            $order_address = $address_OBJ->find($_POST['user_id']);
                            $data['user_id'] = $_POST['user_id'];
                            $data['address_id'] .= $order_address['id'];
                            $data['unique_code'] .= $carts_OBJ->find_card_code($user_info->id)['unique_code'];
                            $data['description'] .= $_POST['description'];
                            $data['price_irr'] .= $price;
                            $order = $orders_OBJ->create($data);
                            if ($order)
                            {
                                $transaction['order_id'] = $orders_OBJ->find($carts_OBJ->find_card_code($user_info->id)['unique_code'])['id'];
                                $transaction['mobile'] = $address_OBJ->find($_POST['user_id'])['mobile'];
                                $transaction['total'] = (integer)$price;
                                $transaction_result = $payment_OBJ->create_transaction($transaction);
                                $result_tran = json_decode($transaction_result);
                                if($result_tran->status == 1) {
                                    $go = "https://pay.ir/pg/$result_tran->token";
                                    header("Location: $go");
                                } else {
                                    echo $result_tran->errorMessage;
                                    $orders_OBJ->remove_orders($carts_OBJ->find_card_code($user_info->id)['unique_code']);

                                }
//

                            } else {

                                header("location:?c=products&a=checkout");

                            }
                        } else {

                            header("location:?c=products&a=checkout");

                        }

                    }
                } else {
                    header("location:?c=products&a=checkout");

                }

            } else {
                header("location:?c=products&a=checkout");
            }

        } else {
            header("location:javascript://history.go(-1)");
        }

        break;
    case 'callback' :
        $unique_code = $carts_OBJ->find_card_code($user_info->id)['unique_code'];

        if ($_GET['status'] = 1)
        {

            $result_payment = json_decode($payment_OBJ->verify_transaction($_GET['token']));

            if ($result_payment->status == 1)
            {
                $data1['amount_irr']   = $result_payment->amount ;
                $data1['tracking_code']   .= $result_payment->transId;
                $data1['order_id'] .= $result_payment->factorNumber;
                $data1['status'] .= $result_payment->status;
                $data1['card_pan'] .= $result_payment->cardNumber;
                $data1['user_id'] .=$user_info->id;
                $data1['transaction_code'] .= $_GET['token'];
                if ($payment_OBJ->find($data1['tracking_code']) == null)
                {
                    $payment_OBJ->create($data1);
                    $carts_OBJ->update_carts_status($unique_code);
                    $orders_OBJ->update_status_orders($unique_code);
                    foreach ($carts_info as $item)
                    {
                        $quantity = $item['products_quantity'] - $item['count'];
                        $product_id = $item['product_id'];
                        $product_OBJ->update_quantity($quantity, $product_id);
                    }
                    header("location:?c=products&a=Invoice");

                }
                else
                {
                    echo "<h1>سفارش شما از قبل ثبت شده است</h1>";

                }

            }
            else
            {
                $orders_OBJ->remove_orders($unique_code);
//                $data2['transaction_code'] =$_GET['token'];
//                $data2['user_id'] = $user_info->id;
//                $data2['order_id'] = $orders_OBJ->find($carts_OBJ->find_card_code($user_info->id)['unique_code'])['id'];
//                $data2['error_code'] = $result_payment->errorCode;
//                $data2['status'] = $result_payment->status;
//                $payment_fail_OBJ->create($data2);
                echo "<h1>تراکنش با خطا مواجه شد</h1>";


            }

        }
        else
        {
            $orders_OBJ->remove_orders($unique_code);
//            $data2['transaction_code'] =$_GET['token'];
//            $data2['user_id'] = $user_info->id;
//            $data2['order_id'] = $orders_OBJ->find($carts_OBJ->find_card_code($user_info->id)['unique_code'])['id'];
//            $data2['error_code'] = $result_payment->errorCode;
//            $data2['status'] = $_GET['status'];
//            $payment_fail_OBJ->create($data2);
            echo "<h1>تراکنش با خطا مواجه شد</h1>";
        }

        break;
    case 'Invoice' :

        break;
}