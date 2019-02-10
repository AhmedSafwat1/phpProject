<?php
class adminController extends Controller
{
  
    public function index()
    {
        if(func_num_args() > 0)
            $this->error("not Found Url enter correct");
        if(!isset( $_SESSION['user_admin']))
            $this->redirect("admin/enter");
        $users = new User();
        $post = new Post();
        $comment = new Comment();
        $type = array("Admin","User","Writer");
        $categories = array("Social News","Political","Economic","Educational","Sports","International");
        $context = array('users' => $users->getAll(),
                         "type" => $type,
                         "posts" => $post->getAllPostInfo(),
                         "cat" =>$categories,
                         "comments" => $comment->getAllPostCommentInfo(),
                         "adminId" =>$_SESSION['user_admin'],
                         "userId" => $users->getOne($_SESSION['user_admin'],"user_name")[0]["user_id"]
                        );
                    
        $this->render("admin",$context);
    }
    public function del($type,$id)
    {
        if(func_num_args() > 2)
            $this->error("not Found Url enter correct");
        if(!isset( $_SESSION['user_admin']))
            $this->redirect("admin/enter");
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
        if(!isset( $_SESSION['user_admin']))
            $this->redirect("admin/enter");
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
        if(!isset( $_SESSION['user_admin']))
            $this->redirect("admin/enter");
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
        if(!isset( $_SESSION['user_admin']))
            $this->redirect("admin/enter");
        $users = new User();
        $post = new Post();
        if(strcmp($type,"user") == 0)
        {
            if(isset($_POST['submit']))
            {
                unset($_POST['submit']);
                $user = $users->getOne($id)[0];
                
                 // valid befor submit
                $valid = new Validation();
                
                if(strcmp($_POST['user_email'],$user['user_email']) != 0)
                {
                    
                    $valid->name("user email")->value($_POST['user_email'])->pattern('email')
                        ->required()->max(100)
                        ->Unique("users", "user_email", $_POST['user_email']);
                }
                if(strcmp($_POST['user_name'],$user['user_name']) != 0)
                {
                    $valid->name("user name")->value($_POST['user_name'])->pattern('alphanum')->required()
                                            ->Unique("users", "user_name", $_POST['user_name']);
                }
                 
                if(empty($valid->errors))
                {
                    $s_id =$users->getOne($_SESSION['user_admin'],"user_name")[0]["user_id"];
                    $users->update($_POST,$id);
                    if($id == $s_id)
                    {
                        $newNmae = $users->getOne($id)[0]["user_name"];
                        $_SESSION["user_admin"] = $newNmae;
                        $_SESSION["user_name"] = $newNmae;
                    }
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
                        'data' => $_POST,
                        "userId" => $users->getOne($_SESSION['user_admin'],"user_name")[0]["user_id"],
                        "errors" => $valid->errors
                     );
                   $this->render("updateUser",$context);
                }
              
            
            }
            else {
                $context  = array(
                            'data' => $users->getOne($id)[0],
                            "userId" => $users->getOne($_SESSION['user_admin'],"user_name")[0]["user_id"]
                         );
                $this->render("updateUser",$context);
            }
        }
        else if(strcmp($type,"post") == 0)
        {
            if(isset($_POST['submit']))
            {
                //to remove name submit from post
                unset($_POST['submit']);
                // valid befor submit
                $valid = new Validation();
                $valid->name("title")->value($_POST['post_title'])->pattern('alphanum')->required()
                                    ->max(100);
                $valid->name("post content")->value($_POST['post_content'])->pattern('alphanum')->required();
                $ext = ['jpg','png','jpeg'];
                $image = new UploadFile($ext, UPLOAD, 561487);
                //if all valid
                if(empty($valid->errors) && empty($image->errors) && $image->upload($_FILES['post_image']))
                {
                    unset($_POST['user_name']);
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
                    // if errors happen diplay and return old data
                    $data = $_POST;
                    $context  = array(
                        'data' => $data,
                        "cat" => $post->categories,
                        "userId" => $users->getOne($_SESSION['user_admin'],"user_name")[0]["user_id"],
                        "errors" =>array_merge($valid->errors, $image->errors)
                     );
                    $this->render("updatePost",$context);
                }
            }
            else {
                $context  = array(
                            'data' => $post->getAllPostInfo("where post_id = $id")[0],
                            "cat" => $post->categories,
                            "userId" => $users->getOne($_SESSION['user_admin'],"user_name")[0]["user_id"]
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

    public function enter()
    {
        if(func_num_args() > 0)
            $this->error("not Found Url enter correct");
        if(isset($_POST["submit"]))
        {
            $userName = $_POST["user_name"];
            $password = $_POST['user_password'];
            $user = new User();
            $admin = $user->login($userName,$password);
            
            if($admin)
            {
                $_SESSION['user_admin'] = $admin['user_name'];
                $_SESSION['user_name'] = $admin['user_name'];
                $this->redirect("admin");
            }
            else {
                echo "
                <div style = 'padding: 40px;
                    background-color: red;
                        color: white;
                        size:40px;
                        margin-bottom: 15px;'>
                            login errot passord or use name sucess 
                        </div>
                ";
                $this->refresh(2,"admin/enter");
            }
        }
        else {
            $this->render("login");
        }
    }
    public function leave()
    {
        if(func_num_args() > 0)
             $this->error("not Found Url enter correct");
        if(!isset( $_SESSION['user_admin']))
             $this->redirect("admin/enter");
        $this->logout("admin/enter");
        
    }

}
?>