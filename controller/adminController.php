<?php
class adminController extends Controller
{
  
    public function index()
    {
        if(func_num_args() > 0)
            $this->error("not Found Url enter correct");
        $this->render("admin");
    }
} 

?>