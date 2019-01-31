<?php
class adminController extends Controller
{
  
    public function index()
    {
        if(func_num_args() > 0)
            $this->error("not Found Url enter correct");
        $users = new User();
        $post = new Post();
        $comment = new Comment();
        $type = array("Admin","User","Writer");
        $categories = array("Social News","Political","Economic","Educational","Sports","International");
        $context = array('users' => $users->getAll(),
                         "type" => $type,
                         "posts" => $post->getAllPostInfo(),
                         "cat" =>$categories,
                         "comments" => $comment->getAllPostCommentInfo()
                        );
                    
        $this->render("admin",$context);
    }
    public function del($type,$id)
    {
        if(func_num_args() > 2)
            $this->error("not Found Url enter correct");
        $users = new User();
        $post = new Post();
        if(strcmp($type,"user") == 0)
        {
            $users->delete($id);
            echo "
                <div style = 'padding: 40px;
                background-color: blue;
                color: white;
                size:40px;
                margin-bottom: 15px;'>
                    Delete sucess 
                </div>
          ";
            $this->refresh();
        }
        if(strcmp($type,"post") == 0)
        {
            $post->delete($id);
            echo "
                <div style = 'padding: 40px;
                background-color: blue;
                color: white;
                size:40px;
                margin-bottom: 15px;'>
                    Delete sucess 
                </div>
              ";
            $this->refresh();
        }
        else
        {
            echo "
                <div style = 'padding: 40px;
                background-color: red;
                color: white;
                size:40px;
                margin-bottom: 15px;'>
                    Error not found
                </div>
            ";
            $this->refresh("5","admin");
        }
    }

    public function block($type,$id)
    {
        if(func_num_args() > 2)
            $this->error("not Found Url enter correct");
        $users = new User();
        $post = new Post();
        if(strcmp($type,"user") == 0)
        {
            $users->update(array("status"=>"0"),$id);
            
            echo "
                <div style = 'padding: 40px;
                background-color: blue;
                color: white;
                size:40px;
                margin-bottom: 15px;'>
                    block  sucess 
                </div>
          ";
            $this->refresh();
        }
        if(strcmp($type,"post") == 0)
        {
            $post->update(array("post_status"=>"0"),$id);
            echo "
                <div style = 'padding: 40px;
                background-color: blue;
                color: white;
                size:40px;
                margin-bottom: 15px;'>
                    refuse sucess 
                </div>
              ";
            $this->refresh();
        }
        else
        {
            echo "
                <div style = 'padding: 40px;
                background-color: red;
                color: white;
                size:40px;
                margin-bottom: 15px;'>
                    Error not found
                </div>
            ";
            $this->refresh("5","admin");
        }
    }

    public function active($type,$id)
    {
        if(func_num_args() > 2)
            $this->error("not Found Url enter correct");
        $users = new User();
        $post = new Post();
        if(strcmp($type,"user") == 0)
        {
            $users->update(array("status"=>"1"),$id);
            
            echo "
                <div style = 'padding: 40px;
                background-color: blue;
                color: white;
                size:40px;
                margin-bottom: 15px;'>
                    Approve  sucess 
                </div>
          ";
            $this->refresh();
        }
        if(strcmp($type,"post") == 0)
        {
            $post->update(array("post_status"=>"2"),$id);
            echo "
                <div style = 'padding: 40px;
                background-color: blue;
                color: white;
                size:40px;
                margin-bottom: 15px;'>
                    active sucess 
                </div>
              ";
            $this->refresh();
        }
        else
        {
            echo "
                <div style = 'padding: 40px;
                background-color: red;
                color: white;
                size:40px;
                margin-bottom: 15px;'>
                    Error not found
                </div>
            ";
            $this->refresh("5","admin");
        }
    }

    public function update($type,$id)
    {
        if(func_num_args() > 2)
            $this->error("not Found Url enter correct");
        $users = new User();
        $post = new Post();
        if(strcmp($type,"user") == 0)
        {
            if(isset($_POST['submit']))
            {
                unset($_POST['submit']);
                $users->update($_POST,$id);
            
                echo "
                <div style = 'padding: 40px;
                    background-color: blue;
                        color: white;
                        size:40px;
                        margin-bottom: 15px;'>
                            update sucess 
                        </div>
                ";
                $this->refresh(2,"admin");
            }
            else {
                $context  = array(
                            'data' => $users->getOne($id)[0],
                         );
                $this->render("updateUser",$context);
            }
        }
        else if(strcmp($type,"post") == 0)
        {
            if(isset($_POST['submit']))
            {
                unset($_POST['submit']);
                $post->update($_POST,$id);
            
                echo "
                <div style = 'padding: 40px;
                    background-color: blue;
                        color: white;
                        size:40px;
                        margin-bottom: 15px;'>
                            update sucess 
                        </div>
                ";
                $this->refresh(2,"admin");
            }
            else {
                $context  = array(
                            'data' => $post->getAllPostInfo("where post_id = $id")[0],
                            "cat" => $post->categories,
                         );
                $this->render("updatePost",$context);
            }
        }
        else
        {
            echo "
                <div style = 'padding: 40px;
                background-color: red;
                color: white;
                size:40px;
                margin-bottom: 15px;'>
                    Error not found
                </div>
            ";
            $this->refresh("5","admin");
        }
    }

}
?>