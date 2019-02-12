<?php
class homeController extends Controller
{
  
    public function index()
    {
        if(func_num_args() > 0)
            $this->error("not Found Url enter correct");
        if(!isset( $_SESSION['user_name']))
             $this->redirect("home/enter");
        $user = new User(); 
        $post = new Post();
        $comment = new Comment();
        $currentUser = $user->getOne($_SESSION['user_name'],"user_name");
        if(empty($currentUser))
            $this->redirect("home/enter");
            
        $Context  = array(
                   'Categories' => $post->categories,
                    'TopSlider' => array_slice($post->getAllPostInfo("where post_status = 1"), 0, 5),
                    "allPosts" => $post->getAllPostInfo("where post_status = 2"),
                    "RatePOst" => array_slice($post->getAllPostHaveComment(),0,3),
                    "lastComments"=> array_slice($comment->getAllPostCommentInfo(),0,3),
                    "latestPost" => array_slice($post->getAll(), 0, 3),
                    "current" => $currentUser[0]
                );
                
        $this->render("index", $Context);
    }
    public function cat($id)
    {
        if(func_num_args() > 1)
            $this->error("not Found Url enter correct");
        if(!isset( $_SESSION['user_name']))
             $this->redirect("home/enter");
        $user = new User(); 
        $post = new Post();
        $comment = new Comment();
        $currentUser = $user->getOne($_SESSION['user_name'],"user_name");
        if(empty($currentUser))
            $this->redirect("home/enter");
            
        $Context  = array(
                   'Categories' => $post->categories,
                    'TopSlider' => array_slice($post->getAllPostInfo("where post_status = 1"), 0, 5),
                    "allPosts" => $post->getAllPostInfo("where post_status = 2 and post_categories = $id"),
                    "RatePOst" => array_slice($post->getAllPostHaveComment(),0,3),
                    "lastComments"=> array_slice($comment->getAllPostCommentInfo(),0,3),
                    "latestPost" => array_slice($post->getAll(), 0, 3),
                    "current" => $currentUser[0],
                    "search" => $post->categories[$id]
                );
                
        $this->render("search", $Context);
    }

    public function search()
    {
        if(func_num_args() > 0)
            $this->error("not Found Url enter correct");
        if(!isset( $_SESSION['user_name']))
             $this->redirect("home/enter");
        $user = new User(); 
        $post = new Post();
        $comment = new Comment();
        $currentUser = $user->getOne($_SESSION['user_name'],"user_name");
        if(empty($currentUser))
            $this->redirect("home/enter");
        if(isset($_GET['search-terms']) && !empty($_GET['search-terms']))
        {
        $search = $_GET['search-terms'];
        $Context  = array(
                   'Categories' => $post->categories,
                    'TopSlider' => array_slice($post->getAllPostInfo("where post_status = 1"), 0, 5),
                    "allPosts" => $post->getAllPostInfo("where post_status = 2 and user_name = '$search' "),
                    "RatePOst" => array_slice($post->getAllPostHaveComment(),0,3),
                    "lastComments"=> array_slice($comment->getAllPostCommentInfo(),0,3),
                    "latestPost" => array_slice($post->getAll(), 0, 3),
                    "current" => $currentUser[0],
                    "search" => $search
                );
                
        $this->render("search", $Context);
        }
        else {
            $this->redirect();
        }
    }
    public function details($id)
    {
        if(func_num_args() > 1)
            $this->error("not Found Url enter correct");
        if(!isset( $_SESSION['user_name']))
            $this->redirect("home/enter");
        
        $user = new User(); 
        $post = new Post();
        $comment = new Comment();
        $currentUser = $user->getOne($_SESSION['user_name'],"user_name");
        if(empty($currentUser))
            $this->redirect("home/enter");
        $postData = $post->getAllPostInfo("where post_id=$id");
        if (empty($postData)) 
            $this->error("not Found Url enter correct");
       
        $Context  = array(
                   'Categories' => $post->categories,
                    'TopSlider' => array_slice($post->getAllPostInfo("where post_status = 2"), 0, 5),
                    "post" =>  $postData[0],
                    "RatePOst" => array_slice($post->getAllPostHaveComment(),0,3),
                    "lastComments"=> array_slice($comment->getAllPostCommentInfo(),0,3),
                    "latestPost" => array_slice($post->getAll(), 0, 3),
                    "postComent" => $comment->getAllPostCommentInfo("where post_fk = $id"),
                    "current" => $currentUser[0]
                );
                
        $this->render("Details", $Context);
    }

    public function comment($id)
    {
        if(func_num_args() > 1)
            $this->error("not Found Url enter correct");
        if(!isset( $_SESSION['user_name']))
            $this->redirect("home/enter");
        $user = new User(); 
        $post = new Post();
        $comment = new Comment();
            
        if(isset($_POST))
        {
            $valid = new Validation();
           
            $valid->name("comment")->value($_POST['comment_content'])
                    ->required();
           
            if(empty($valid->errors))
            {
                $user_id = 7;
                $data = array('user_fk' =>$user_id ,
                                'post_fk' => $id,
                                "comment_content" => $_POST['comment_content'] );
               
                $comment->insert($data);
                echo "
                    <div style = 'padding: 40px;
                        background-color: blue;
                            color: white;
                            size:40px;
                            margin-bottom: 15px;'>
                                Comment sucess 
                            </div>
                    ";
                $this->refresh(2);
            }
            echo "
                    <div style = 'padding: 40px;
                        background-color: red;
                            color: white;
                            size:40px;
                            margin-bottom: 15px;'>
                                Comment Filad 
                            </div>
                    ";
                $this->refresh(2);
        }
                
        $this->redirect();
    }
    public function add()
    {
        if(func_num_args() > 0)
            $this->error("not Found Url enter correct");
        if(!isset( $_SESSION['user_name']))
          $this->redirect("home/enter");
        $user = new User(); 
        $post = new Post();
        $comment = new Comment();
        $currentUser = $user->getOne($_SESSION['user_name'],"user_name");
        if(empty($currentUser))
            $this->redirect("home/enter");
        $data = Array ( "post_title" => "" ,
                        "post_status" => 1 ,
                        "post_categories" => 0,
                        "post_content" => '' );
        $Context  = array(
            'Categories' => $post->categories,
             'TopSlider' => array_slice($post->getAllPostInfo("where post_status = 2"), 0, 5),
             "RatePOst" => array_slice($post->getAllPostHaveComment(),0,3),
             "lastComments"=> array_slice($comment->getAllPostCommentInfo(),0,3),
             "latestPost" => array_slice($post->getAll(), 0, 3),
             'data' => $data,
             "current" => $currentUser[0]
         );
         if(isset($_POST['submit']))
         {
           
            $valid = new Validation();
           
            $valid->name("title")->value($_POST['post_title'])->required()
                                ->max(100);
            $valid->name("post content")->value($_POST['post_content'])->required();
            $ext = ['jpg','png','jpeg'];
            $image = new UploadFile($ext, UPLOAD, 561487);
            //if all valid
            if(empty($valid->errors)  && $image->upload($_FILES['post_image']))
            {
               
                unset($_POST['submit']);
                $_POST['post_image'] = $image->Name;
                $_POST['post_published'] = $currentUser[0]["user_id"];
                $post->insert($_POST);

                echo "
                <div style = 'padding: 40px;
                    background-color: blue;
                        color: white;
                        size:40px;
                        margin-bottom: 15px;'>
                            Add sucess 
                        </div>
                ";
                $this->refresh(2,"home");
            }
            else {
                // if errors happen diplay and return old data
                $Context['data'] = $_POST;
                $Context["errors"] = array_merge($valid->errors, $image->errors);
                
                $this->render("addPost",$Context);
            }
         }
         else {
            $this->render("addPost", $Context);
         }
         
    }
    public function profile($id)
    {
        if(func_num_args() > 1)
            $this->error("not Found Url enter correct");
        if(!isset( $_SESSION['user_name']))
            $this->redirect("home/enter");
        
        $user = new User(); 
        $post = new Post();
        $comment = new Comment();
        $profile =  $user->getOne($id);
        $currentUser = $user->getOne($_SESSION['user_name'],"user_name");
        if(empty($currentUser))
            $this->redirect("home/enter");
        if(empty($profile))
            $this->error("not Found Url enter correct");
        if($currentUser[0]['user_id'] == $id)
            $flag = 1;
        else
            $flag=0;
        $Context  = array(
                   'Categories' => $post->categories,
                    'TopSlider' => array_slice($post->getAll(), 0, 5),
                    "RatePOst" => array_slice($post->getAllPostHaveComment(),0,3),
                    "lastComments"=> array_slice($comment->getAllPostCommentInfo(),0,3),
                    "latestPost" => array_slice($post->getAll(), 0, 3),
                    "user" => $profile[0],
                    "pendingPOst" => $post->getAllPostInfo(" where post_status = 1 and user_id = {$profile[0]['user_id']}"),
                    "approvePost" => $post->getAllPostInfo(" where post_status = 2 and user_id = {$profile[0]['user_id']}"),
                    "RefusePost" => $post->getAllPostInfo(" where post_status = 0 and user_id = {$profile[0]['user_id']}"),
                    "flag" => $flag,
                    "current" => $currentUser[0]
                );
                
        $this->render("profile", $Context);
    }

    public function edit($id)
    {
        if(func_num_args() > 1)
            $this->error("not Found Url enter correct");
        if(!isset( $_SESSION['user_name']))
             $this->redirect("home/enter");
        
        
        $user = new User(); 
        $post = new Post();
        $comment = new Comment();
        $currentUser = $user->getOne($_SESSION['user_name'],"user_name");
        if(empty($currentUser))
             $this->redirect("home/enter");
        $data = $post->getOne($id);
      
        if(empty($data))
            $this->error("not Found Url enter correct");
        $Context  = array(
            'Categories' => $post->categories,
             'TopSlider' => array_slice($post->getAllPostInfo("where post_status = 2"), 0, 5),
             "RatePOst" => array_slice($post->getAllPostHaveComment(),0,3),
             "lastComments"=> array_slice($comment->getAllPostCommentInfo(),0,3),
             "latestPost" => array_slice($post->getAll(), 0, 3),
             'data' => $data[0],
             "current" => $currentUser[0]
         );
         if(isset($_POST['submit']))
         {
           
             //to remove name submit from post
             unset($_POST['submit']);
             // valid befor submit
             
             $valid = new Validation();
             $valid->name("title")->value($_POST['post_title'])->required()
                                 ->max(100);
             $valid->name("post content")->value($_POST['post_content'])->required();
             $ext = ['jpg','png','jpeg'];
             $image = new UploadFile($ext, UPLOAD, 561487);
             //if all valid
             if(empty($valid->errors) && $image->upload($_FILES['post_image'],0,0))
             {   
                 if($_FILES['post_image']['error'] != 4)
                 {
                     $_POST['post_image'] = $image->Name;
                     if(!empty($post->getOne($id)[0]['post_image']))
                          unlink(UPLOAD.$post->getOne($id)[0]['post_image']);
                 }
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
                 $this->refresh(2,"home");
             }
            else {
                // if errors happen diplay and return old data
                $Context['data'] = $_POST;
                $Context["errors"] = array_merge($valid->errors, $image->errors);
                
                $this->render("editPost",$Context);
            }
         }
         else {
            $this->render("editPost", $Context);
         }
         
    }
   public function enter()
   {
        if(func_num_args() > 0)
          $this->error("not Found Url enter correct");
        $user = new User(); 
        $post = new Post();
        $comment = new Comment();
        if(isset( $_SESSION['user_name']))
             $this->redirect();
     if(isset($_POST['submit']))
         {
           
             //to remove name submit from post
             unset($_POST['submit']);
             // valid befor submit
             
             $valid = new Validation();
             $valid->name("User name")->value($_POST['user_name'])->required();
             $valid->name("User Password")->value($_POST['user_password'])->required();
             if(empty($valid->errors))
             {   
                $userName =$_POST['user_name'];
                $password = $_POST['user_password'];
                $loginer = $user->login($userName,$password);
            
                if($loginer)
                {
                    $_SESSION['user_name'] = $loginer['user_name'];
                    $this->redirect("home");
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
                    $this->refresh(2,"home/enter");
                }
               
             }
            else {
                // if errors happen diplay and return old data
                $Context = [];
                $Context["errors"] = $valid->errors;
                
                $this->render("login",$Context);
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
       if(!isset( $_SESSION['user_name']))
            $this->redirect("home/enter");
       $this->logout("home/enter");
       
   }
   public function downlod($id)
   {
    if(func_num_args() > 1)
         $this->error("not Found Url enter correct");
    $user = new User(); 
    $post = new Post();
    $comment = new Comment();
    $postFile = $post->getOne($id)[0];
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    $pdf->Cell(60,10,$postFile['post_title']);
    $pdf->Cell(70,10,$postFile['post_content'],3);
   
    $pdf->Output();
   }
   public function registration()
    {
        if(func_num_args() > 0)
            $this->error("not Found Url enter correct");
        $user = new User(); 
        $post = new Post();
        $comment = new Comment();
        $data = Array ( "user_email" => "" ,
                        "user_name" => "" ,
                        "user_type" => 1,
                       
                        );
        $Context  = array(
             'data' => $data,
         );
         if(isset($_POST['submit']))
         {
            unset($_POST['submit']);
            
             // valid befor submit
            $valid = new Validation();
            
           
                
            $valid->name("user email")->value($_POST['user_email'])->pattern('email')
                ->required()->max(100)
                ->Unique("users", "user_email", $_POST['user_email']);
        

            $valid->name("user name")->value($_POST['user_name'])->required()
                                    ->Unique("users", "user_name", $_POST['user_name']);
            
            $valid->name("Password ")->value($_POST['user_password'])->required();
            if(empty($valid->errors))
            {
                $user->insert($_POST);
                echo "
                <div style = 'padding: 40px;
                    background-color: blue;
                        color: white;
                        size:40px;
                        margin-bottom: 15px;'>
                            insert sucess  , Watit until confirm from admin 
                        </div>
                ";
                $this->refresh(2,"home/enter");
            }
            else {
                $Context['errors'] = $valid->errors;
                $Context['data'] = $_POST;
                $this->render("Reigstration", $Context);
            }
           
         }
         else {
            $this->render("Reigstration", $Context);
         }
         
    }
    
} 

?>