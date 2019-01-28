<?php
abstract class Controller
{
    public $request;
    public  function __construct($_request)
    {
        $this->request = $_request;
    }
    public function render($view,$data=NULL)
    {
        if (is_null($data))
            unset($data);
        elseif (is_array($data) && array_keys($data) !== range(0, count($data) - 1)) 
            extract($data);
        if(strpos($view,"/"))
            $path = VIEW.$view.".php";
        else
            $path = VIEW.DS.$this->request->controller.DS.$view.".php";
        echo $view;
        if(file_exists($path))
            include_once $path;   
        else 
        {
            $message = "file not Found check it";
            
            include_once VIEW.DS."errors/404.php";
            die();
        }
    }
    public function error($message){
       
        header("HTTP/1.0 404 Not Found");
        $this->render('/errors/404',array("message"=>$message));
        die();
    }
}
?>