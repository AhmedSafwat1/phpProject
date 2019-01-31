<?php
 class User extends  Model {
     public $conn ;
     public $table_name ="users";
     public $primary_colum="user_id";
     public $type = array("Admin","User","Writer");
     public function getAllPost($cond, $colm ='post_created' ,$orderBy="DESC")
     {
        try {
            $this->conn = Model::$cnx['news'];
            $result = [];
            $sql = "select * from User_Post where user_id = $cond ORDER BY $colm $orderBy";
            $q = $this->conn->query($sql);
            $result = $q->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("" . $e->getMessage());
        }
        return $result;
     }

     public function login($userName,$password,$admin="")
     {
        $result = [];
        
        try {
            $this->conn = Model::$cnx['news'];
           
            $sql = "select * from users where
             user_name = '$userName'
             and status= '1' 
             and user_password = '$password' $admin limit 1";
            $q = $this->conn->query($sql);
            $result = $q->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("" . $e->getMessage());
        }
        return $result;
     }

 }