<?php
class homeController extends Controller
{
  
    public function index()
    {
        if(func_num_args() > 0)
            $this->error("not Found Url enter correct");
        $this->render("home");
    }
    public function view($id)
    {
        if(func_num_args() > 1)
             $this->error("not Found Url enter correct");
       
        $data2 = array(
                        'post_title' => 'ahmedup',
                        'post_content' => "testup",
                        'post_status'=> "0",
                        'post_published'=> "4",
                     );
        $data3 = array(
        'user_fk' => '4',
        'post_fk' => "4",
        'comment_content'=> "0",
        ); 
      
        $x = new User(); 
        $y = new Post();
        $z = new Comment();
        $data = array(
            'user_name' => 'ahmedup',
            'user_email' => "testup",
            'user_password'=> "test",
            'user_type'=> "3",
            'status'=>"1"
         ); 
         //$x->insert($data);
        // $x->insert($data);
        // $x->insert($data);
        //echo $x->update($data,'user_id',1);
        //$y->insert($data2);       
        print_r($z->getAllCommentsInfo());
        $this->render("home");
    }
    
} 

?>