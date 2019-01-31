<?php
 class Post extends  Model {
    public $conn ;
    public $table_name ="post";
    public $primary_colum="post_id";
    public  $categories = array("Social News","Political","Economic","Educational","Sports","International");
    public $status  = array('not approved',"Pending","Approve");
 
    public function getUser($cond, $colm ='post_created' ,$orderBy="DESC")
    {
       try {
           $this->conn = Model::$cnx['news'];
           $result = [];
           $sql = "select * from User_Post where post_id = $cond ORDER BY $colm $orderBy limit 1";
           $q = $this->conn->query($sql);
           $result = $q->fetchAll(PDO::FETCH_ASSOC);
       } catch (PDOException $e) {
           die("" . $e->getMessage());
       }
       return $result;
    }
    public function getAllPostInfo($cond="", $colm ='' , $orderBy="DESC")
     {
        try {
            if(empty($colm))
                $colm = $this->primary_colum;
            $this->conn = Model::$cnx['news'];
            $result = [];
            $sql = "select * from User_Post $cond ORDER BY $colm $orderBy";
            $q = $this->conn->query($sql);
            $result = $q->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("" . $e->getMessage());
        }
        return $result;
     }

    

     
 }