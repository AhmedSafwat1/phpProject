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
                                    <li><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></li>
                                    <li><a href="#">Welcome to Colorlib Family.</a></li>
                                    <li><a href="#">Nam eu metus sitsit amet, consec!</a></li>
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
                                <li class="active"><a href="catagory.html">Home</a></li>
                                <li><a href="#"><?php  echo $current['user_name'] ;?></a>
                                    <ul class="dropdown">
                                        <li><a href="<?php echo RACINE_URL.'/home/leave' ?>">Logout</a></li>
                                        <?php
                                        if($current['user_type'] == 2)
                                        {
                                        ?>
                                        <li><a href="<?php echo RACINE_URL.'/home/profile/'.$current['user_id']?>">Profile</a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <li><a href="#">Categories</a>
                                    <ul class="dropdown">
                                        <?php
                                            foreach ($Categories as $value) {
                                               echo  "<li><a href=''>$value</a></li>";
                                            }
                                        ?>
                                       
                                    </ul>
                                </li>
                            </ul>

                            <!-- Search Button -->
                            <div class="search-btn">
                                <i id="searchbtn" class="fa fa-search" aria-hidden="true"></i>
                            </div>

                            <!-- Search Form -->
                            <div class="viral-search-form">
                                <form id="search" action="#" method="get">
                                    <input type="text" name="search-terms" placeholder="Enter Name Of Author To search...">
                                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </div>

                            <!-- Video Post Button -->
                            <?php
                            if($current['user_type'] == 2)
                            {
                            ?>
                            <div class="add-post-button">
                                <a href="<?php echo RACINE_URL.'/home/add' ?>" class="btn add-post-btn">Add Post</a>
                            </div>
                            <?php } ?>
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ##### Header Area End ##### -->