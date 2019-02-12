<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- css import for bootstrap  -->
    <link rel="stylesheet" href="<?php echo CSS."bootstrap.min.css" ?>" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo CSS."font-awesome/css/all.min.css" ?>" >
    <title>Admin</title>
</head>
<body>
    
    <!-- start form  -->
    <?php ?>
    <div class="container mt-5">
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
        <h2 class='h1 text-center text-primary mb-4'>Welcom In New Registration </h2>
        <form action='<?php echo RACINE_URL."/home/registration";?>' method="post" class='shadow-lg p-3 mb-5 bg-white rounded py-5'>
            <div class="form-group mb-4">
                <label for="exampleInputEmail1 " class='text-success h3'>Email address</label>
                <input type="email" class="form-control form-control-lg" value = "<?php echo $data['user_email'];?>"id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="user_email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group mb-4">
                <label for="formGroupExampleInput " class='text-success h3'>User Name</label>
                <input type="text" class="form-control form-control-lg" id="formGroupExampleInput" value = "<?php echo $data['user_name'];?>" placeholder="user name" name="user_name">
            </div>
            <div class="form-group mb-4">
                <label for="formGroupExampleInput " class='text-success h3'>Password</label>
                <input type="password" class="form-control form-control-lg" id="formGroupExampleInput" value = "" placeholder="user name" name="user_password">
            </div>
            <div class="form-group mb-4">
            <label for="formGroupExampleInput"  class='text-success h3'>Type</label>
                <select class="form-control form-control-lg mb-3" name="user_type">
                    <option value="1" <?php if($data['user_type'] == "1"){echo "selected";} ?>>User</option>
                    <option value="2" <?php if($data['user_type'] == "2"){echo "selected";} ?>>Journilist</option>
                </select>
            <div class="form-group mb-4">
                <input type="submit" class="btn btn-primary btn-lg" value="submit" name="submit">
                <a href="<?php echo  RACINE_URL.'/home/enter' ;?>" class="btn btn-danger btn-lg">Cancel</a>
        </form>
    </div>
    <!-- js import for bootstrap  -->
    <script src="<?php echo JS."jquery-3.2.1.min.js"; ?>"></script>
    <script src="<?php echo JS."popper.min.js"; ?>"></script>
    <script src="<?php echo JS."bootstrap.min.js"; ?>"></script>
</body>
</html>