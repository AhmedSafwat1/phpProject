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

    <div class="container mt-5">
        <form action='<?php echo RACINE_URL."/admin/update/post/".$data["post_id"];?>' method="post">
            
            <div class="form-group mb-3">
                <label for="formGroupExampleInput">post title</label>
                <input type="text" class="form-control" id="formGroupExampleInput" value = "<?php echo $data['post_title'];?>" placeholder="post title" name="post_title">
            </div>
            <div class="form-group mb-3">
                <label for="formGroupExampleInput">post publish</label>
                <input type="text" class="form-control" id="formGroupExampleInput" disabled value = "<?php echo $data['user_name'];?>" placeholder="user publish">
            </div>
            <select class="form-control mb-3" name="post_status">
                <option value="2" <?php if($data['post_status'] == "2"){echo "selected";} ?>>Aprove</option>
                <option value="1" <?php if($data['post_status'] == "1"){echo "selected";} ?>>Pending</option>
                <option value="0" <?php if($data['post_status'] == "0"){echo "selected";} ?>>not approved</option>
            </select>
            <select class="form-control mb-3" name="post_categories">
                <?php
                $selected = "";
                    foreach ($cat as $key => $value) {
                        if($data['post_categories'] == $key)
                            $selected = "selected";
                        else
                            $selected = "";
                       echo "<option value='$key' $selected >$value</option>";
                    }
                ?>
            </select>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Content</label>
                <textarea class="form-control" name="post_content" id="exampleFormControlTextarea1" rows="3">
                 <?php echo $data['post_content'] ?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Choose Image</label>
                <input type="file"  accept="image/png, image/jpeg, image/jpg" class="form-control-file" id="exampleFormControlFile1" name="post_image">
            </div>
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