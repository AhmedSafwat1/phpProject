  <!-- ##### Footer Area Start ##### -->
  <footer class="footer-area">

<!-- Main Footer Area -->
<div class="main-footer-area">
    <div class="container">
        <div class="row">

            <!-- Footer Widget Area -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="footer-widget-area">
                    <!-- Footer Logo -->
                    <div class="footer-logo">
                        <a href="index.html"><img src=" <?php echo TEMP ;?>img/core-img/logo.png" alt=""></a>
                    </div>
                    <!-- Footer Nav -->
                    <div class="footer-nav">
                        <ul>
                            <li class="active"><a href="#">Top 10</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Funny</a></li>
                            <li><a href="#">Advertising</a></li>
                            <li><a href="#">Celebs</a></li>
                            <li><a href="#">Lifestyle</a></li>
                            <li><a href="#">Videos</a></li>
                            <li><a href="#">Travel</a></li>
                            <li><a href="#">Features</a></li>
                            <li><a href="#">Submit a video</a></li>
                            <li><a href="#">Don’tMiss</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <!-- Newsletter Widget -->
                <div class="newsletter-widget">
                    <h4>Sign up to <br>our newsletter</h4>
                    <form action="#" method="post">
                        <input type="text" name="text" placeholder="Name">
                        <input type="email" name="email" placeholder="Email">
                        <button type="submit" class="btn w-100">Subscribe</button>
                    </form>
                </div>
            </div>

            <!-- Footer Widget Area -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="footer-widget-area">
                    <!-- Widget Title -->
                    <h4 class="widget-title">Latest articles</h4>
                    <!-- Single Latest Post -->
                    <?php
                    foreach ($latestPost as $key => $value) {
                        # code...
                        if(empty($value['post_image']))
                        $img = TEMP.'img/bg-img/3.jpg';
                        else
                         $img = UPLOADIMG.$value['post_image'];
                        echo "
                        <div class='single-blog-post style-2 d-flex align-items-center'>
                            <div class='post-thumb'>
                                <a href='#'><img src='$img' ></a>
                            </div>
                            <div class='post-data'>
                                <a href='#' class='post-title'>
                                    <h6>{$value['post_title']}</h6>
                                </a>
                                <div class='post-meta'>
                                    <p class='post-date'><a href='#'>".time_elapsed_string($value['post_created'])."</a></p>
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

<!-- Bottom Footer Area -->
<div class="bottom-footer-area">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <!-- Copywrite -->
                <p><a href="#"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
        </div>
    </div>
</div>
</footer>
<!-- ##### Footer Area Start ##### -->