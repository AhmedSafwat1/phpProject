<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- css import for bootstrap  -->
    <link rel="stylesheet" href="<?php echo CSS."bootstrap.min.css" ?>" crossorigin="anonymous">
    <title>Admin</title>
</head>
<body>
    <!-- start nav bar  -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample04">
            <ul class="navbar-nav ml-auto">
            
            <li class="nav-item dropdown mr-4">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" href="#">Logout</a>
                <a class="dropdown-item" href="#">Go Website</a>
                <a class="dropdown-item" href="#">Edit Profile</a>
                </div>
            </li>
            </ul>
        </div>
    </nav>

    <!-- start table for display user -->
    <div class="container">
        <div class="table-responsive mt-5" style="max-height:600px!important; overflow: auto;">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">User Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Type</th>
                    <th scope="col"class="w-25">Action</th>
                    </tr>
                </thead>
                <?php
                if(!empty($users))
                {
                    foreach ($users as $value) {
                        echo "
                        <tr>
                            <th scope='row'>{$value['user_name']}</th>
                            <td>{$value['user_email']}</td>
                            <td>{$type[intval($value['user_type'])]}</td>
                            <td class=''>
                                <a class='mr-2 mb-1 btn btn-danger' href='del/".$value["user_id"]."'>Delete</a>
                                <a   class='mr-2 mb-1 btn btn-primary' href='update/".$value["user_id"]."'>Update</a>
                        ";
                        if($value['status'])
                            echo "<a class ='btn btn-dark' href='block/".$value["user_id"]."'>Block</a> </td>";
                        else
                            echo "<a class ='btn btn-success' href='active/".$value["user_id"]."'>Active</a> </td>";

                    }
                }
                ?>
            </table>
        </div>

        <!-- post -->
        <div class="table-responsive mt-5" style="max-height:600px!important; overflow: auto;">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Post title</th>
                    <th scope="col">Post Content</th>
                    <th scope="col">Post Published</th>
                    <th scope="col">Post Categoriesed</th>
                    <th scope="col">Post Created</th>
                    <th scope="col"class="w-25">Action</th>
                    </tr>
                </thead>
                <?php
                if(!empty($posts))
                {
                    foreach ($posts as $value) {
                        echo "
                        <tr>
                            <th scope='row'>{$value['post_title']}</th>
                            <td>{$value['post_content']}</td>
                            <td>{$value['user_name']}</td>
                            <td>{$cat[intval($value['post_categories'])]}</td>
                            <td>{$value['post_created']}</td>
                            <td class=''>
                                <a class='mr-2 mb-1 btn btn-danger' href='del/".$value["post_id"]."'>Delete</a>
                                <a   class='mr-2 mb-1 btn btn-primary' href='update/".$value["post_id"]."'>Update</a>
                        ";
                        if($value['post_status'])
                            echo "</td>";
                        else
                            echo "<a class ='btn btn-success' href='active/".$value["post_id"]."'>Active</a> </td>";

                    }
                }
                ?>
            </table>
        </div>


         <!-- comment -->
         <div class="table-responsive mt-5" style="max-height:600px!important; overflow: auto;">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Post title</th>
                    <th scope="col">Post Published</th>
                    <th scope="col">Post Categoriesed</th>
                    <th scope="col">comment content</th>
                    <th scope="col">comment Create</th>
                    <th scope="col">comment publish</th>
                    <th scope="col"class="">Action</th>
                    </tr>
                </thead>
                <?php
                if(!empty($comments))
                {
                    foreach ($comments as $value) {
                        echo "
                        <tr>
                            <th scope='row'>{$value['post_title']}</th>
                            
                            <td>{$value['published']}</td>
                            <td>{$cat[intval($value['post_categories'])]}</td>
                            <td>{$value['comment_content']}</td>
                            <td>{$value['comment_create']}</td>
                            <td>{$value['user_name']}</td>
                            <td class=''>
                                <a class='mr-2 mb-1 btn btn-danger' href='del/".$value["id"]."'>Delete</a>
                                <a   class='mr-2 mb-1 btn btn-primary' href='update/".$value["id"]."'>Update</a>
                            </td>
                        ";

                    }
                }
                ?>
            </table>
        </div>
    </div>

    <!-- js import for bootstrap  -->
    <script src="<?php echo JS."jquery-3.2.1.min.js"; ?>"></script>
    <script src="<?php echo JS."popper.min.js"; ?>"></script>
    <script src="<?php echo JS."bootstrap.min.js"; ?>"></script>
</body>
</html>