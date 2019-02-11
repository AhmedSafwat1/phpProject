<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Viral News</title>

    <!-- Favicon -->
    <link rel="icon" href=" <?php echo TEMP ;?>img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href=" <?php echo TEMP ;?>style.css">

</head>

<body>
 
    <!-- nav -->
    <?php include_once VIEW."/layout/mainHeader.php" ?>
    <!-- end -->
    <!-- ##### Hero Area Start ##### -->
    <div class="hero-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="hero-slides owl-carousel">
                        <!-- Single Blog Post -->
                         <?php 
                     
                            foreach ($TopSlider as $value) 
                            {
                                if(empty($value['post_image']))
                                    $img = TEMP.'img/bg-img/3.jpg';
                                else
                                    $img = UPLOADIMG.$value['post_image'];
                                    echo "
                                        <div class='single-blog-post d-flex align-items-center mb-50'>
                                            <div class='post-thumb'>
                                                <a href='#'><img src='$img' width='130' height='130' style='height:130px !important;'></a>
                                            </div>
                                            <div class='post-data'>
                                                <a href='#' class='post-title'>
                                                    <h6>{$value['post_title']}</h6>
                                                </a>
                                                <div class='post-meta'>
                                                    <p class='post-date'>
                                                    ".time_elapsed_string($value['post_created']) ."
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    ";
                            }
                            
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Blog Post Area Start ##### -->
    <div class="viral-story-blog-post section-padding-0-50">
        <div class="container pt-5">
            <div class="row">
                <!-- Blog Posts Area -->
                <div class="col-12 col-lg-8">
                    <div class="row">
                        <?php
                        foreach ($allPosts as $key => $value) {
                            if(empty($value['post_image']))
                            $img = TEMP.'img/bg-img/3.jpg';
                            else
                                $img = UPLOADIMG.$value['post_image'];
                        
                            echo "
                            <div class='col-12 col-lg-6'>
                                <div class='single-blog-post style-3'>
                                    <!-- Post Thumb -->
                                    <div class='post-thumb'>
                                        <a href='".RACINE_URL.'/home/details/'.$value['post_id']."'><img src='$img' class='w-100' style='height:400px !important' alt=''></a>
                                    </div>
                                
                                    <div class='post-data'>
                                        <a href='#'' class='post-catagory'>{$Categories[$value['post_categories']]}</a>
                                        <a href='".RACINE_URL.'/home/details/'.$value['post_id']."' class='post-title'>
                                            <h6>{$value['post_title']}</h6>
                                        </a>
                                        <div class='post-meta'>
                                            <p class='post-author'>By <a href='".RACINE_URL.'/home/profile/'.$value['user_id']."'>{$value['user_name']}</a></p>
                                            <p class='post-date'>".time_elapsed_string($value['post_created'])."</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ";
                      
                        }
                        
                        

                       ?>

                    </div>

                    
                </div>

                <!-- Sidebar Area -->
                <div class="col-12 col-lg-4">
                    <div class="sidebar-area">

                       
                        <!-- Trending Articles Widget -->
                        <div class="treading-articles-widget mb-70">
                            <h4>Trending Articles</h4>

                            
                         <!-- Single Trending Articles -->
                            <?php 
                            $RatePOst = array_reverse($RatePOst);
                            foreach ($RatePOst as $key => $value) {
                                if(empty($value['post_image']))
                                    $img = TEMP.'img/bg-img/3.jpg';
                                else
                                    $img = UPLOADIMG.$value['post_image'];
                                echo "
                                <div class='single-blog-post style-4'>
                                    <!-- Post Thumb -->
                                    <div class='post-thumb'>
                                        <a href='".RACINE_URL.'/home/details/'.$value['post_id']."'><img src='$img ' class='w-100' style='height:200px !important' ></a>
                                        <span class='serial-number'>".($key+1)."</span>
                                    </div>
                                    <!-- Post Data -->
                                    <div class='post-data'>
                                        <a href='".RACINE_URL.'/home/details/'.$value['post_id']."' class='post-title'>
                                            <h6>{$value['post_title']}</h6>
                                        </a>
                                        <div class='post-meta'>
                                            <p class='post-author'>By <a href='".RACINE_URL.'/home/details/'.$value['user_id']."'>{$value['user_name']}</a></p>
                                        </div>
                                    </div>
                                </div>
                                ";
                            }
                        ?>
                        </div>

                        <!-- Add Widget -->
                        <div class="add-widget mb-70">
                            <a href="#"><img src=" <?php echo TEMP ;?>img/bg-img/add.png" alt=""></a>
                        </div>

                        <!-- Latest Comments -->
                        <div class="latest-comments-widget">
                            <h4>Latest Comments</h4>
                              <!-- Single Comment Widget -->
                            <?php 
                            foreach ($lastComments as $key => $value) {
                                # code...
                                if(empty($value['post_image']))
                                $img = TEMP.'img/bg-img/3.jpg';
                                else
                                 $img = UPLOADIMG.$value['post_image'];
                                echo "
                                        <div class='single-comments d-flex'>
                                            <div class='comments-thumbnail'>
                                                <img src= '$img' >
                                            </div>
                                            <div class='comments-text'>
                                                <a href='#'><span>Sandy Doe</span>{$value['comment_content']}</a>
                                                <p>".time_elapsed_string($value['comment_create'])."</p>
                                            </div>
                                        </div>
                                    ";
                                }
                            ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Blog Post Area End ##### -->

  

    <!-- start footer -->
    <?php include_once VIEW."/layout/mainFooter.php" ?>
    <!-- end footer -->
    <!-- ##### All Javascript Files ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src=" <?php echo TEMP ;?>js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src=" <?php echo TEMP ;?>js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src=" <?php echo TEMP ;?>js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src=" <?php echo TEMP ;?>js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src=" <?php echo TEMP ;?>js/active.js"></script>
</body>

</html>