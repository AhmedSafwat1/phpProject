<?php
 class Comment extends  Model {
    public $conn ;
    public $table_name ="comment";
    public $primary_colum="id";

    public function getAllCommentsInfo($cond="", $colm ='', $orderBy="DESC")
    {
       try {
           if(empty($colm))
               $colm = $this->primary_colum;
           $this->conn = Model::$cnx['news'];
           $result = [];
           $sql = "select * from Post_Comment_User $cond ORDER BY $colm $orderBy";
           $q = $this->conn->query($sql);
           $result = $q->fetchAll(PDO::FETCH_ASSOC);
       } catch (PDOException $e) {
           die("" . $e->getMessage());
       }
       return $result;
    }
    public function getAllPostCommentInfo($cond="", $colm ='' , $orderBy="DESC")
    {
       try {
           if(empty($colm))
               $colm = $this->primary_colum;
           $this->conn = Model::$cnx['news'];
           $result = [];
           $sql = "select * from UserPostPublishComent $cond ORDER BY $colm $orderBy";
           $q = $this->conn->query($sql);
           $result = $q->fetchAll(PDO::FETCH_ASSOC);
       } catch (PDOException $e) {
           die("" . $e->getMessage());
       }
       return $result;
    }

 }