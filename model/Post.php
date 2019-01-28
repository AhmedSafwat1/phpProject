<?php
 class Post extends  Model {
     public $id;
     public $title;
     public $description;
     public $publisher;
     public $publish_time;
     public $update_time;
     public $conn ;
     public $table_name ="users";
     public function insert(array $data)
     {
        $this->conn = Model::$cnx['news'];
        $sql  = $this->make_insert($data);
        $stmt = $this->conn->prepare($sql);
        try {
            $stmt->execute($data);
            }
        catch (PDOException $e) {
            if ($e->getCode() == 1062) {
                // Take some action if there is a key constraint violation, i.e. duplicate name
                } else {
                    throw $e;
                }
                return 0;
            }
        return 1;
     }

     public function update(array $data,$colum,$cond)
     {
        $this->conn = Model::$cnx['news'];
        $sql  = $this->make_update($data,$colum,$cond);
        $stmt = $this->conn->prepare($sql);
        try {
            $stmt->execute($data);
            }
        catch (PDOException $e) {
            if ($e->getCode() == 1062) {
                // Take some action if there is a key constraint violation, i.e. duplicate name
                } else {
                    echo $e;
                }
                return 0;
            }
        return $stmt->rowCount();
     }

     /*
     *
     * helper function make the sql
     * 
     */
     public function make_insert(array $data)
     {
         $first = "insert into {$this->table_name}(";
         $second = "values(";
         foreach ($data as $key => $value) {
             $first .= " ".$key.",";
             $second .= " :".$key.",";
         }
         $first = rtrim($first,",").")";
         $second = rtrim($second,",").")";
         return $first." ".$second;
     }
     public function make_update(array $data,$colum,$cond)
     {
         $first = "UPDATE {$this->table_name} SET ";
         foreach ($data as $key => $value) {
             $first .= " ".$key."= :".$key." ,";
         }
         $first = rtrim($first,",")." where $colum = '$cond' ";
         return $first;
     }

 }