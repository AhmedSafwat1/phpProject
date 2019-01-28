<?php
/*
*
*  will use to encryptio passwod
*  function password_hash($pass) will return pass encrypt
*   to check if password true use password_verify($pass,$passhash)
*/

abstract class Model {
    static $cnx =array(); //
    public $db = 'news'; // name database
        public function __construct()
        {
            $config = config::$database[$this->db];
            $options = array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'",
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                );  
            /*
             * test connexion to database
             */
            try{
                if (isset(Model::$cnx[$this->db]))
                { return true;}
                $db = new PDO('mysql:host='.$config['host'].
                              ';dbname='.$config['database'].
                              ';',$config['login'],$config['password']
                              ,$options);
                Model::$cnx[$this->db] = $db;
            }
            catch (PDOException $e){
                if(config::$debug == 1)
                    die($e->getMessage());
                else
                    die('Error');
            }
        }
       

     //==============================================
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

     public function update(array $data, $cond, $colum = "" )
     {
        $this->conn = Model::$cnx['news'];
        $sql  = $this->make_update($data,$colum,$cond);
        $stmt = $this->conn->prepare($sql);
        if(empty($colum))
            $colum = $this->primary_colum;
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

     public function getAll($colm ='' ,$orderBy="DESC")
     {
        try {
            if(empty($colm))
                $colm = $this->primary_colum;
            $this->conn = Model::$cnx['news'];
            $result = [];
            $sql = "select * from {$this->table_name} ORDER BY $colm $orderBy";
            $q = $this->conn->query($sql);
            $result = $q->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("" . $e->getMessage());
        }
        return $result;
     }

     public function getOne($cond, $colm ='', $oper = "=")
     {
        try {
            $this->conn = Model::$cnx['news'];
            if(empty($colm))
                $colm = $this->primary_colum;
            $result = [];
            $sql = "select * from {$this->table_name} where $colm $oper $cond LIMIT 1";
            $q = $this->conn->query($sql);
            $result = $q->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("" . $e->getMessage());
        }
        return $result;
     }

     public function delete($cond, $colm ='', $oper = "=")
     {
        try {
            $this->conn = Model::$cnx['news'];
            if(empty($colm))
                $colm = $this->primary_colum;
            $result =0;
            $sql = "delete FROM {$this->table_name} WHERE $colm $oper '$cond' ";  
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->rowCount();
        } catch (PDOException $e) {
            die( $e->getMessage());
        }
        return $result;
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