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
    <!-- start nav bar  -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="<?php echo RACINE_URL.'/admin'?>">Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample04">
            <ul class="navbar-nav ">
            
            <li class="nav-item dropdown mr-5">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php
                    if(isset($_SESSION['user_admin'])) 
                    {
                        echo $_SESSION['user_admin'];
                    }
                    else {
                        echo "User NO-Name";
                    }
                ?>
                <span style="widht:100px;"></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" href="<?php echo RACINE_URL ?>/admin/leave">Logout</a>
                <a class="dropdown-item" href="#">Go Website</a>
                <a class="dropdown-item" href="<?php echo RACINE_URL ?>/admin/update/user/<?php echo $userId ?>">Edit Profile</a>
                </div>
            </li>
            </ul>
        </div>
    </nav>
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
        <form action='<?php echo RACINE_URL."/admin/update/user/".$data["user_id"];?>' method="post">
            <div class="form-group mb-3">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" value = "<?php echo $data['user_email'];?>"id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="user_email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group mb-3">
                <label for="formGroupExampleInput">User Name</label>
                <input type="text" class="form-control" id="formGroupExampleInput" value = "<?php echo $data['user_name'];?>" placeholder="user name" name="user_name">
            </div>
            <select class="form-control mb-3" name="status">
                <option value="1" <?php if($data['status'] == "1"){echo "selected";} ?>>Active</option>
                <option value="0" <?php if($data['status'] == "0"){echo "selected";} ?>>disable</option>
            </select>
            <select class="form-control mb-3" name="user_type">
                <option value="0" <?php if($data['user_type'] == "0"){echo "selected";} ?>>Admin</option>
                <option value="1" <?php if($data['user_type'] == "1"){echo "selected";} ?>>User</option>
                <option value="2" <?php if($data['user_type'] == "2"){echo "selected";} ?>>Journilist</option>
            </select>
                <input type="submit" class="btn btn-primary" value="submit" name="submit">
                <a href="<?php echo  RACINE_URL.'/admin' ;?>" class="btn btn-danger">Cancel</a>
        </form>
    </div>
    <!-- js import for bootstrap  -->
    <script src="<?php echo JS."jquery-3.2.1.min.js"; ?>"></script>
    <script src="<?php echo JS."popper.min.js"; ?>"></script>
    <script src="<?php echo JS."bootstrap.min.js"; ?>"></script>
</body>
</html>