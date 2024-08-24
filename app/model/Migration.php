<?php
class Migration
{
    public function __construct()
    {
        global $db ;
        $this-> db = $db;
    }
    public function check_tbl($name)
    {
        try {


       $query = $this->db->query("SELECT * FROM '$name'");
       return $query->fetchAll();
        }
        catch (PDOException $e)
        {
            return false;
        }
    }
    public function admins()
    {
        try
        {
            $this->db->query("CREATE TABLE admins(
                id  int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,                 
                first_name varchar(50) NOT NULL ,
                last_name varchar(50) NOT NULL ,
                nick_name varchar (50) NOT NULL ,
                email varchar(100) NOT NULL UNIQUE ,
                mobile varchar(20) NOT NULL UNIQUE ,
                password varchar(255) NOT NULL  ,
                create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,      
                update_at TIMESTAMP NULL  ,      
                delete_at TIMESTAMP NULL      
                        
                        
                        )");
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function users()
    {
        try
        {
            $this->db->query("CREATE TABLE users(
                id  int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,                 
                first_name varchar(50) NOT NULL ,
                last_name varchar(50) NOT NULL ,
                email varchar(100) NOT NULL UNIQUE ,
                password varchar(255) NOT NULL  ,
                create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,      
                update_at TIMESTAMP NULL,      
                delete_at TIMESTAMP NULL     
 )");
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function addresses()
    {
        try
        {
            $this->db->query("CREATE TABLE addresses(
                id  int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,                 
                user_id int(6) UNSIGNED  ,                
                province_id INT(6) UNSIGNED   ,
                city_id INT(50) UNSIGNED  ,
                address varchar (70) ,
                tell varchar (50) ,
                mobile varchar (50) ,
                create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,      
                update_at TIMESTAMP NULL,      
                delete_at TIMESTAMP NULL,      
                CONSTRAINT user_address_fk FOREIGN KEY (user_id) REFERENCES users(id)
                        
                        
                        )");
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public function messages()
    {
        try
        {
            $this->db->query("CREATE TABLE messages(
                id  int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,                                 
                admin_id int(6) UNSIGNED  ,  
                user_id int(6) UNSIGNED  ,              
                unique_code varchar (100) ,
                title varchar (50) ,
                messages varchar (255) ,
                create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,      
                update_at TIMESTAMP NULL,      
                delete_at TIMESTAMP NULL,      
                CONSTRAINT admin_address_fk FOREIGN KEY (admin_id) REFERENCES admins(id),
                CONSTRAINT user_massages_fk FOREIGN KEY (user_id) REFERENCES users(id)

                        
                        
                        )");
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public function categories()
    {
        try
        {
            $this->db->query("CREATE TABLE categories(
                id  int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,                 
                title varchar (50) ,
                slug varchar (50) ,
                type varchar (50) ,
                parent_id int(6) NULL ,
                create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,      
                update_at TIMESTAMP NULL,      
                delete_at TIMESTAMP NULL      
                
                        
                        
                        )");
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public function products()
    {
        try
        {
            $this->db->query("CREATE TABLE products(
                id  int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,                 
                admin_id int (6) UNSIGNED ,
                category_id int(6) UNSIGNED,
                title varchar (50) ,
                slug varchar (50) ,
                description TEXT ,
                price int(10)  ,
                discount  int(10)  ,
                sellingprice int(10) NULL ,
                quantity  int(10)  ,
                pic varchar (255) NULL ,
                create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,      
                update_at TIMESTAMP NULL,      
                delete_at TIMESTAMP NULL,      
                 CONSTRAINT category_product_fk FOREIGN KEY (caregory_id) REFERENCES categories(id)

                        
                        
                        )");
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public function comments()
    {
        try
        {
            $this->db->query("CREATE TABLE comments(
                id  int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,                                 
                user_id int(6) UNSIGNED  ,
                type varchar(50) ,             
                data_id int(6) ,
                comment TEXT,
                status int(6),
                create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,      
                update_at TIMESTAMP NULL,      
                delete_at TIMESTAMP NULL,      
                CONSTRAINT user_comment_fk FOREIGN KEY (user_id) REFERENCES users(id)
               /* CONSTRAINT data_comment_fk FOREIGN KEY (data_id) REFERENCES products(id)*/

                        
                        
                        )");
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public function carts()
    {
        try
        {
            $this->db->query("CREATE TABLE carts(
                id  int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,                                 
                user_id int(6) UNSIGNED  ,
                product_id int (6) UNSIGNED ,
                unique_code varchar(255) ,             
                count int(6),
                price int(10),
                create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,      
                update_at TIMESTAMP NULL,      
                delete_at TIMESTAMP NULL,      
                CONSTRAINT user_card_fk FOREIGN KEY (user_id) REFERENCES users(id),
                CONSTRAINT product_card_fk FOREIGN KEY (product_id) REFERENCES products(id)

                        
                        
                        )");
            $this->db->query("CREATE  INDEX idx_unique_code on carts(unique_code)");

        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public function orders()
    {
        try
        {
            $this->db->query("CREATE TABLE orders(
                id  int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,                                 
                user_id int(6) UNSIGNED  ,    
                unique_code varchar(255) ,     
                address_id int(6) UNSIGNED,           
                gate varchar(10) ,                
                price int(10),
                status int(6) NULL,
                create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,      
                update_at TIMESTAMP NULL,      
                delete_at TIMESTAMP NULL,      
                CONSTRAINT user_order_fk FOREIGN KEY (user_id) REFERENCES users(id),
                CONSTRAINT unique_order_fk FOREIGN KEY (unique_code) REFERENCES carts(unique_code),
                CONSTRAINT address_order_fk FOREIGN KEY (address_id) REFERENCES addresses(id)

                        
                        
                        )");
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public function payments()
    {
        try
        {
            $this->db->query("CREATE TABLE payments(
                id  int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,                                 
                user_id int(6) UNSIGNED  ,    
                order_id int(6) UNSIGNED  ,    
                tracking_code varchar(255) ,     
                create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,      
                update_at TIMESTAMP NULL,      
                delete_at TIMESTAMP NULL,      
                CONSTRAINT user_payment_fk FOREIGN KEY (user_id) REFERENCES users(id),
                CONSTRAINT order_payment_fk FOREIGN KEY (order_id) REFERENCES orders(id)
 
                        
                        
                        )");
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function blog()
    {
        try
        {
            $this->db->query("CREATE TABLE blog(
                id  int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,                                 
                admin_id int(6) UNSIGNED  ,    
                caregory_id int(6) UNSIGNED,
                title varchar(50)   ,    
                description TEXT ,     
                pic varchar(255) NULL,
                create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,      
                update_at TIMESTAMP NULL,      
                delete_at TIMESTAMP NULL,      
                CONSTRAINT admin_blog_fk FOREIGN KEY (admin_id) REFERENCES admins(id),
                CONSTRAINT category_blog_fk FOREIGN KEY (caregory_id) REFERENCES categories(id)
 
                        
                        
                        )");
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public function rules()
    {
        try
        {
            $this->db->query("CREATE TABLE rules(
                id  int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,                                 
                messages TEXT  ,
                create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,      
                update_at TIMESTAMP NULL,      
                delete_at TIMESTAMP NULL     


                        
                        
                        )");
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function faqs()
    {
        try
        {
            $this->db->query("CREATE TABLE faqs(
                id  int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,                 
                question varchar (50) ,
                answer TEXT ,
                caregory_id int(6) UNSIGNED,
                create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,      
                update_at TIMESTAMP NULL,      
                delete_at TIMESTAMP NULL,      
                CONSTRAINT category_faqs_fk FOREIGN KEY (caregory_id) REFERENCES categories(id)

                        
                        
                        )");
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }




}



