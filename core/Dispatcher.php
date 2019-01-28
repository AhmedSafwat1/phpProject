<?php

class Dispatcher
{
    public $requeste;
    public  function __construct()
    {
        $this->requeste = new Request();
        Route::decoup($this->requeste->url,$this->requeste);
        if (empty($this->requeste->controller))
            $this->requeste->controller = "home";
        $controller = $this->loadController();
        if(get_class_methods($controller))
        {
            if(empty($this->requeste->action))
                 $this->requeste->action = "index";
            if(!in_array($this->requeste->action,get_class_methods($controller)))
                 $controller->error("not found");
            try {
                call_user_func_array(array($controller,$this->requeste->action),
                $this->requeste->params);
            } catch (Throwable $e) {
                //throw $th;
                $controller->error("not found");
            }  
        }
    }
   
    public function loadController()
    {
        $name = $this->requeste->controller."Controller";
        if(file_exists(CONTROLLER.DS.$name.".php"))
             return new $name($this->requeste);
        else {
            $message = "Not found page";
            include_once VIEW.DS."errors/404.php";
            die();
        }
    }

}

?>