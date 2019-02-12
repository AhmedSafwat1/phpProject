


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
                            <li class="active"><a href="<?php echo RACINE_URL.'/home/registration' ?>">ٌRegister</a></li>
                            
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
    <div class="viral-story-blog-post section-padding-0-50" width=100%>
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
                               WELOCME..Let's GO:
                            </h2>
        <form class="form-signin w-50 mx-auto mt-5" action='<?php echo RACINE_URL."/home/enter"?>' method="post">
            <span>
                <i class="fas fa-sign-in-alt fa-8x"></i>
            </span>
            <label for="inputEmail" class="sr-only">User Name</label>
            <input type="text" id="inputEmail" class="form-control form-control-lg mb-4" name ="user_name" placeholder="user Name" required="" autofocus="">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control form-control-lg mb-4" name="user_password" placeholder="Password" required="">
            <div class="checkbox mb-3">
                <label>
                <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <p>
                <a href='<?php echo RACINE_URL."/home/registration"?>'>Reigster Now</a>
            </p>
            <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Sign In">
            <p class="mt-5 mb-3 text-muted text-center">© 2018-2019</p>
        </form>
                    

    <!-- ##### Blog Post Area End ##### -->

  

<!-- ##### Footer Area Start ##### -->
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