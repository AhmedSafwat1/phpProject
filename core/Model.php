<?php
class Model {
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
}