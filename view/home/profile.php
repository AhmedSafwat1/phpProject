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
    <link rel="stylesheet" href="<?php echo CSS."font-awesome/css/all.min.css" ?>" >
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
                   <!-- statrt -->
                    <div class="pending">
                            <h2 class='h1 text-center text-warning mb-5'>
                                Pending Article
                            </h2>
                            <!-- ================= -->

                            <div class="row">
                            <?php
                            if(empty($pendingPOst))
                            {
                                echo "<div class='alert alert-warning text-center w-100' role='alert'>
                                Empty!
                              </div>";
                            }
                            foreach ($pendingPOst as $key => $value) {
                                if(empty($value['post_image']))
                                $img = TEMP.'img/bg-img/3.jpg';
                                else
                                    $img = UPLOADIMG.$value['post_image'];
                            
                                echo "
                                <div class='col-12 col-lg-6'>
                                    <div class='single-blog-post style-3'>
                                        <!-- Post Thumb -->
                                        <div class='post-thumb'>
                                            <a href='#'><img src='$img' class='w-100' style='height:400px !important' alt=''></a>
                                        </div>
                                    
                                        <div class='post-data'>
                                            <a href='#'' class='post-catagory'>{$Categories[$value['post_categories']]}</a>
                                            <a href='#' class='post-title'>
                                                <h6>{$value['post_title']}</h6>
                                            </a>
                                            <div class='post-meta'>
                                                
                                            
                                ";
                                if ($flag)
                                echo "<p class='post-author'><a href='#'>Edit</a></p>"; 
                                echo "
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

                    <!-- approve -->

                    <!-- statrt -->
                    <div class="pending">
                            <h2 class='h1 text-center text-primary mb-5'>
                                Approve Article
                            </h2>
                            <!-- ================= -->

                            <div class="row">
                            <?php
                             if(empty($approvePost))
                             {
                                 echo "<div class='alert alert-warning text-center w-100' role='alert'>
                                 Empty!
                               </div>";
                             }
                            foreach ($approvePost as $key => $value) {
                                if(empty($value['post_image']))
                                $img = TEMP.'img/bg-img/3.jpg';
                                else
                                    $img = UPLOADIMG.$value['post_image'];
                            
                                echo "
                                <div class='col-12 col-lg-6'>
                                    <div class='single-blog-post style-3'>
                                        <!-- Post Thumb -->
                                        <div class='post-thumb'>
                                            <a href='#'><img src='$img' class='w-100' style='height:400px !important' alt=''></a>
                                        </div>
                                    
                                        <div class='post-data'>
                                            <a href='#'' class='post-catagory'>{$Categories[$value['post_categories']]}</a>
                                            <a href='#' class='post-title'>
                                                <h6>{$value['post_title']}</h6>
                                            </a>
                                            <div class='post-meta'>
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

                    <!-- refuse -->

                 

                    <!-- statrt -->
                    <div class="pending">
                            <h2 class='h1 text-center text-danger mb-5'>
                                Refuse Article
                            </h2>
                            <!-- ================= -->

                            <div class="row">
                            <?php
                            if(empty($RefusePost))
                            {
                                echo "<div class='alert alert-warning text-center w-100' role='alert'>
                                Empty!
                              </div>";
                            }
                            foreach ($RefusePost as $key => $value) {
                                if(empty($value['post_image']))
                                $img = TEMP.'img/bg-img/3.jpg';
                                else
                                    $img = UPLOADIMG.$value['post_image'];
                            
                                echo "
                                <div class='col-12 col-lg-6'>
                                    <div class='single-blog-post style-3'>
                                        <!-- Post Thumb -->
                                        <div class='post-thumb'>
                                            <a href='#'><img src='$img' class='w-100' style='height:400px !important' alt=''></a>
                                        </div>
                                    
                                        <div class='post-data'>
                                            <a href='#'' class='post-catagory'>{$Categories[$value['post_categories']]}</a>
                                            <a href='#' class='post-title'>
                                                <h6>{$value['post_title']}</h6>
                                            </a>
                                            <div class='post-meta'>
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
                    
                </div>

                <!-- Sidebar Area -->
                <div class="col-12 col-lg-4">
                <ul class="list-group bg-secondary shadow-sm p-3 mb-5 bg-white rounded">
                    <li class="list-group-item py-5 ">
                        <span><i class="fas fa-user-tag fa-2x mr-2"></i></span>
                        <?php echo $user['user_name']?>
                    </li>
                    <li class="list-group-item py-5 ">
                        <span><i class="fas fa-envelope fa-2x mr-2"></i></span>
                        <?php echo $user['user_email']?>
                    </li>
                    </ul>
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