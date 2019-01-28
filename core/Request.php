

<?php

        /*
         * All information from URl
         */

        class Request{

            public $url;
            public $action = "";
            public $controller = "";
            public $params = array();
            public function __construct()
            {
                if(isset($_SERVER['PATH_INFO']))
                    $this->url = $_SERVER['PATH_INFO'];
                else
                    $this->url="";
            }
        }


?>