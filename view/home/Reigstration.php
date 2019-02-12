




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Viral News Registration</title>

    <!-- Favicon -->
    <link rel="icon" href=" <?php echo TEMP ;?>img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href=" <?php echo TEMP ;?>style.css">

</head>

<body>
 

   <!-- ##### Header Area Start ##### -->
   <header class="header-area">

<!-- Top Header Area -->
<div class="top-header-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="top-header-content d-flex align-items-center justify-content-between">
                    <!-- Breaking News Area -->
                    <div class="top-breaking-news-area">
                        <div id="breakingNewsTicker" class="ticker">
                            <ul>
                                <li><a href="#">Urgent and 100% News.</a></li>
                                <li><a href="#">You can be Journalist in out team.</a></li>
                                <li><a href="#">Respect all opinions is our first rule.</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Social Info Area-->
                    <div class="top-social-info-area">
                        <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Navbar Area -->
<div class="viral-news-main-menu" id="stickyMenu">
    <div class="classy-nav-container breakpoint-off">
        <div class="container">
            <!-- Menu -->
            <nav class="classy-navbar justify-content-between" id="viralnewsNav">

                <!-- Logo -->
                <a class="nav-brand" href="index.html"><img src=" <?php echo TEMP ;?>img/core-img/logo.png" alt="Logo"></a>

                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>

                <!-- Menu -->
                <div class="classy-menu">

                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>

                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li class="active"><a href="<?php echo RACINE_URL.'/home/enter' ?>">Login</a></li>
                            
                        </ul>

                      
                       

                    
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>
        </div>
    </div>
</div>
</header>
<!-- ##### Header Area End ##### -->





    <!-- ##### Blog Post Area Start ##### -->
    <div class="viral-story-blog-post section-padding-0-50">
        <div class="container pt-5">
            <div class="row">
                <!-- Blog Posts Area -->
                <div class="col-12 ">
                   
                            <!-- =================== -->
                            <?php
           if(isset($errors))
           {
                foreach ($errors as $key => $value) {
                    echo "<div class='alert alert-danger alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <strong>$key!</strong> $value.
                  </div>";
                }
           }
        ?>
        <h2 class='h1 text-center text-muted'>
                               WELOCME..Please Fill your info:
                            </h2>
        <form form action='<?php echo RACINE_URL."/home/registration";?>' method="post" class="w-75 mx-auto">
            
            <div class="form-group mb-3">
                <label label for="formGroupExampleInput">Your E-mail:</label>
                <input type="email" class="form-control" value = "<?php echo $data['user_email'];?>"id="formGroupExampleInput" aria-describedby="emailHelp" placeholder="Enter email" name="user_email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>

            <div class="form-group mb-3">
                <label label for="formGroupExampleInput">Your Name:</label>
                <input type="text" class="form-control" value = "<?php echo $data['user_name'];?>" id="formGroupExampleInput" placeholder="user name" name="user_name" aria-describedby="nameHelp">
                <small id="nameHelp" class="form-text text-muted">This Name will show on your posts(for Journalists) and on your comments.</small>
            </div>

            <div class="form-group mb-3">
                <label label for="formGroupExampleInput">Your Password:</label>
                <input type="password" class="form-control" value = "" id="formGroupExampleInput" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="user_password" aria-describedby="passHelp" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
                <small id="passHelp" class="form-text text-muted">You must enter strong password (at least 8 characteres containas at least one capital leeter, one small letter and digits).</small>
            </div>

<!-- Safwat -->
            <div class="form-group mb-3">
            <label for="formGroupExampleInput">Type</label>
                <select class="text-success form-control" name="user_type">
                    <option value="1" <?php if($data['user_type'] == "1"){echo "selected";} ?>>User</option>
                    <option value="2" <?php if($data['user_type'] == "2"){echo "selected";} ?>>Journilist</option>
                </select>
            <div class="form-group mt-4 mb-3">
                <input type="submit" class="btn btn-primary" value="submit" name="submit">
                <a href="<?php echo  RACINE_URL.'/home/enter' ;?>" class="btn btn-danger">Cancel</a>
            </div>
<!-- -->
            
            
        </form>
                    

    <!-- ##### Blog Post Area End ##### -->

  

    <!-- start footer -->
      <!-- ##### Footer Area Start ##### -->

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