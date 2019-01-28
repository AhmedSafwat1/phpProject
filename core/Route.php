<?php

class Route{

    /*
        * URL to Array
        * @controller, @action, @params
        */
    static function decoup($url,$request){
        $url = trim($url, '/');
        if ($url)
        {
            $params = explode('/',$url);
            $request->controller = $params[0];
            if(isset($params[1]))
                $request->action = $params[1];
            if(isset($params[2]))
                $request->params = array_slice($params,2);

            return true;
        }
        return false;
    }
}

?>