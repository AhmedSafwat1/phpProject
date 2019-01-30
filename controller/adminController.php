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
}
?>