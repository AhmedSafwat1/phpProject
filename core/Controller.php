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
        if(file_exists($path))
            include_once $path;   
        else 
        {
            $message = "Cant Acecess to this ";
            
            include_once VIEW.DS."errors/404.php";
            die();
        }
    }
    public function error($message){
       
        header("HTTP/1.0 404 Not Found");
        $this->render('/errors/404',array("message"=>$message));
        die();
    }
    public function redirect($location = "")
    {
        if(empty($location))
        {   
            if(isset($_SERVER['HTTP_REFERER'])) 
                $location = $_SERVER['HTTP_REFERER'];
            else
                $location=RACINE_URL;
            
        }
        else {
            $location = RACINE_URL."/".$location;
        }
       
        header('Location: ' .$location);
        die();
    }
    public function refresh($time=4, $location = "")
    {
        if(empty($location))
        {   
            if(isset($_SERVER['HTTP_REFERER'])) 
                $location = $_SERVER['HTTP_REFERER'];
            else
                $location=RACINE_URL;
            
        }
        else {
            $location = RACINE_URL."/".$location;
        }
       
        header("Refresh:$time; url=$location");
        die();
    }
    public function logout($location="home")
    {
        if(isset( $_SESSION['user_admin']))
            unset( $_SESSION['user_admin']);
        if(isset( $_SESSION['user_name']))
            unset( $_SESSION['user_name']);
        session_destroy();
        $this->redirect($location);
    }
}
?>