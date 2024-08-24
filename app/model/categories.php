<?php
class categories
{
    public function __construct()
    {
        global $db;
        $this->db =$db;
    }
    public function categories()
    {
        try {
            $query = $this->db->query(
                "SELECT main.*,
		parent.title as parent_title,
        parent.slug as parent_slug
        from categories main
        LEFT JOIN categories parent
        ON parent.id = main.parent_id
        order by main.id DESC ");
            return $query->fetchAll();
        } catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public function create($data)
    {
        try {
            $query = $this->db->prepare("INSERT INTO categories (title,slug,type,parent_id) values (:title,:slug,:type,:parent_id)");
            $query->bindParam(':title', $title);
            $query->bindParam(':slug', $slug);
            $query->bindParam(':type', $type);
            $query->bindParam(':parent_id', $parent_id,PDO::PARAM_INT);
            $title = $data['title'];
            $slug = $data['slug'];
            $type = $data['type'];
            $parent_id = $data['parent_id'];
            $query->execute();


        } catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public function update($data)
    {
        try {

             $this->db->query("UPDATE categories SET
                     title = '$data->title',
                     parent_id = '$data->parent_id',
                     slug = '$data->slug'
                    WHERE id = '$data->category_id'
                     
                                                    ");



        } catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public function read($id)
    {
        try
        {

            $query = $this->db->query("SELECT * FROM categories WHERE id ='$id'");
            return $query->fetch();

        }
        catch (PDOException $e)
        {
            $e->getMessage();
        }

    }
    public function delete($id)
    {
        try
        {

            $this->db->query("DELETE FROM categories WHERE id ='$id'");


        } catch (PDOException $e)
        {

            $e->getMessage();

        }



    }
    public function parent()
    {
        try {
            $query = $this->db->query(
                "SELECT main.id,main.title,main.slug,main.type,main.parent_id from categories main where main.parent_id is null
         ");
            return $query->fetchAll();
        } catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }
    public function child($id)
    {
        try {
            $query = $this->db->query(
                "SELECT main.title,main.slug,main.type,main.parent_id from categories main where main.parent_id ='$id'
         ");
            return $query->fetchAll();
        } catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }


}