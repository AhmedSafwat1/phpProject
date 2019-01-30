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
        $this->redirect("home");
   }
   public function show($id)
    {
        if(func_num_args() > 1)
           $this->error("not Found Url enter correct");
        $p =  new Post();
        $context = array('$data' => $p->getOne($id)[0]
                        , );
        $this->render("post",$context);

    }
}
?>