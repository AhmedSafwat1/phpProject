<?php
class homeController extends Controller
{
  
    public function view($id)
    {
        if(func_num_args() > 1)
             $this->error("not Found Url enter correct");
       
        $data = array(
                        'user_name' => 'ahmedup',
                        'user_email' => "testup",
                        'user_password'=> "test",
                        'user_type'=> "3",
                        'status'=>"1"
                     ); 
      
        $x = new Post(); 
        echo $x->update($data,'user_id',1);
        $this->render("home");
    }
} 

?>