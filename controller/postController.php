<?php
class postController extends Controller
{
  
    public function view()
    {
        if(func_num_args() > 0)
            $this->error("not Found Url enter correct");
        $this->render("post");
    }
    public function index()
    {
        if(func_num_args() > 0)
            $this->error("not Found Url enter correct");
        $this->redirect();
    }
    
} 

?>