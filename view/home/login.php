<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- css import for bootstrap  -->
    <link rel="stylesheet" href="<?php echo CSS."bootstrap.min.css" ?>" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo CSS."font-awesome/css/all.min.css" ?>" >
    <title>Login</title>
</head>
<body class="text-center">
    <!-- start login bar  -->
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
    <form class="form-signin w-25 mx-auto" action='<?php echo RACINE_URL."/home/enter"?>' method="post">
        <span>
            <i class="fas fa-sign-in-alt fa-8x"></i>
        </span>
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="inputEmail" class="sr-only">User Name</label>
        <input type="text" id="inputEmail" class="form-control mb-4" name ="user_name" placeholder="user Name" required="" autofocus="">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control mb-4" name="user_password" placeholder="Password" required="">
        <div class="checkbox mb-3">
            <label>
            <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <p>
            <a href='<?php echo RACINE_URL."/home/registration"?>'>Reigster Now</a>
        </p>
        <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Sign In">
        <p class="mt-5 mb-3 text-muted">© 2018-2018</p>
    </form>
    <!-- js import for bootstrap  -->
    <script src="<?php echo JS."jquery-3.2.1.min.js"; ?>"></script>
    <script src="<?php echo JS."popper.min.js"; ?>"></script>
    <script src="<?php echo JS."bootstrap.min.js"; ?>"></script>
</body>
</html>