<?php
class products
{
    public function __construct()
    {
        global $db;
        $this->db =$db;
    }
    public function create($data)
    {
        try {
            $query = $this->db->prepare("INSERT INTO products (admin_id,category_id,title,slug,description,price,discount,quantity,pic,sellingprice) values (:admin_id,:category_id,:title,:slug,:description,:price,:discount,:quantity,:pic,:sellingprice)");
            $query->bindParam(':title', $title);
            $query->bindParam(':admin_id', $admin_id,PDO::PARAM_INT);
            $query->bindParam(':slug', $slug);
            $query->bindParam(':price', $price,PDO::PARAM_INT);
            $query->bindParam(':description', $description);
            $query->bindParam(':discount', $discount,PDO::PARAM_INT);
            $query->bindParam(':quantity', $quantity,PDO::PARAM_INT);
            $query->bindParam(':category_id', $category_id,PDO::PARAM_INT);
            $query->bindParam(':pic', $pic);
            $query->bindParam(':sellingprice', $sellingprice,PDO::PARAM_INT);
            $title = $data['title'];
            $slug = $data['slug'];
            $pic = $data['pic'];
            $discount = $data['discount'];
            $description = $data['description'];
            $price = $data['price'];
            $quantity = $data['quantity'];
            $category_id = $data['category_id'];
            $admin_id = $data['admin_id'];
            $sellingprice = $data['sellingprice'];
            $query->execute();


        } catch (PDOException $e)
        {
            return $e->getMessage();
        }

    }
    public  function products ()
    {
        try {


            $query = $this->db->query(

                "SELECT id,admin_id,category_id,title,description,price,discount,quantity,pic,sellingprice from products"
            );
            return $query->fetchAll();
        } catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public function selingprice (int $x , int $y)
    {
      (int)$price = $x - ($x*($y/100));
        return $price;
    }
    public function read($id)
    {
        try
        {

            $query = $this->db->query("SELECT * FROM products WHERE id ='$id'");
            return $query->fetch();

        }
        catch (PDOException $e)
        {
          return  $e->getMessage();
        }

    }
    public function update($data)
    {
        try {


            $query = $this->db->prepare("UPDATE  products set admin_id = :admin_id,category_id =:category_id,title=:title,slug =:slug,description=:description,price =:price,discount =:discount,quantity =:quantity,pic =:pic,sellingprice=:sellingprice WHERE id =:id");
            $query->bindParam(':title', $title);
            $query->bindParam(':admin_id', $admin_id,PDO::PARAM_INT);
            $query->bindParam(':slug', $slug);
            $query->bindParam(':price', $price,PDO::PARAM_INT);
            $query->bindParam(':description', $description);
            $query->bindParam(':pic', $pic);
            $query->bindParam(':discount', $discount,PDO::PARAM_INT);
            $query->bindParam(':quantity', $quantity,PDO::PARAM_INT);
            $query->bindParam(':category_id', $category_id,PDO::PARAM_INT);
            $query->bindParam(':id', $id,PDO::PARAM_INT ,PDO::PARAM_INT);
            $query->bindParam(':sellingprice', $sellingprice,PDO::PARAM_INT);
            $title = $data['title'];
            $slug = $data['slug'];
            $pic = $data['pic'];
            $id = $data['id'];
            $discount = $data['discount'];
            $description = $data['description'];
            $price = $data['price'];
            $quantity = $data['quantity'];
            $category_id = $data['category_id'];
            $admin_id = $data['admin_id'];
            $sellingprice = $data['sellingprice'];
            $query->execute();






        } catch (PDOException $e)
        {
            return $e->getMessage();
        }
    }
    public function delete($id)
    {
        try
        {

            $this->db->query("DELETE FROM products WHERE id ='$id'");


        } catch (PDOException $e)
        {

            $e->getMessage();

        }



    }
    public function readproduct($slug = null)
    {
        try
        {
            $query = $this->db->query
            (
                "SELECT products.* ,categories.id as categories_id,categories.title as categories_title,categories.slug as   categories_slug,cat.id as cat_id,cat.title as cat_title , cat.slug as cat_slug
                FROM products
                LEFT JOIN categories on categories.id = products.category_id 
                LEFT JOIN categories cat ON categories.parent_id = cat.id
                WHERE products.slug ='$slug'  LIMIT 1    
                
            ");
            return $query->fetch();
        } catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public function list ($slug , $offset =0 ,$limit = 6 )
    {
        try
        {
            $query = $this->db->query
            (
                "SELECT  products.* ,categories.title as categories_title ,cat.title as cat_title
                FROM categories
                LEFT JOIN products  on categories.id = products.category_id
                LEFT JOIN categories cat on categories.parent_id = cat.id
                 WHERE categories.slug = '$slug' LIMIT $limit OFFSET $offset     
                
            ");
            return $query->fetchAll();
        } catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public function products_number ($slug)
    {
        try
        {
            $query = $this->db->query
            (
                "SELECT  products.*
                FROM categories
                LEFT JOIN products  on categories.id = products.category_id
                 WHERE categories.slug = '$slug'     
                
            ");
            return $query->fetchAll();
        } catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public function similar($category_id,$product_id)
    {
        try
        {
            $query = $this->db->query
            (
                "SELECT products.*,categories.title as categories_title
                FROM products
                LEFT JOIN categories on categories.id = products.category_id 
                WHERE products.id !='$product_id' && categories.id = '$category_id'  LIMIT 4      
            ");
            return $query->fetchAll();
        } catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public function update_quantity ($count,$product_id)
    {
        try
        {
            $query = $this->db->prepare("UPDATE products set quantity ='$count' WHERE id ='$product_id'");
            $query->execute();
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }







}