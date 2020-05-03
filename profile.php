<?php
    session_start();
    if( !$_SESSION['email']){
        echo "Sign in first";
        header('location: sign-in.php');
    }
    $username = $_SESSION['user_name'];
    include 'connection.php';
    //echo "<h1>Hello ".$_SESSION['name']."</h1>";
    if(isset($_POST["add_post"])){
        echo "<script>Add Post</script>";

        header('location: add_post.php');
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=s, initial-scale=1.0">
    <title><?php echo $_SESSION['name']; ?></title>
    <!--for the fonts-->
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <!-- Open Sans for body font -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!-- Lato for Title -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assests/css/custom1.css">
    <style>

    </style>
</head>
<body>
    <section id="menu-area">
        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="navbar-header">
                            <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <!-- LOGO -->
                            <!-- TEXT BASED LOGO -->

                            <a class="navbar-brand" href="index.php">Quotes Diary</a>
                            
                            <!-- IMG BASED LOGO  -->
                            <!-- <a class="navbar-brand" href="index.html"><img src="assets/images/logo.png" alt="logo"></a> -->
                        </div>
                        <div id="navbar" class="navbar-collapse collapse">
                            <ul id="top-menu" class="nav navbar-nav  navbar-right main-nav non-radius-menu">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="users.php">Users</a></li>
                                <li> <a href="profile.php" class="active">Profile</a> </li>
                                <li><a href="about-us.php">About us</a></li>
                                <li><a href="sign-in.php">Sign In</a></li>
                            </ul>
                        </div><!--/.nav-collapse -->
                    </div>
                </div>
            </div>
        </nav>
    </section>

    <div class="profile-display">
        <div class="containers">
            <div class="display-area">
                <div class="img-container">
                    <img src='upload-images/<?php echo $_SESSION['profile_img']; ?>' alt=''>
                </div>
                <div class="text-container">
                    <h3 class="text-center"><?php echo $_SESSION['name']; ?></h3>
                    <h3><?php echo $_SESSION['tag_line']; ?></h3>
                </div>
                <form action="" method="POST">
                    <button type="submit" name="add_post">Add post</button>
                </form>
                <div class="display-posts">
                <?php
                    $select_posts = "
                        SELECT * FROM posts
                        WHERE user_name='$username'
                        ORDER BY id DESC;
                    ";
                    $result_posts = mysqli_query($connection,$select_posts);
                    $result_posts_num = mysqli_num_rows($result_posts);
                    
                    $output = '';
                    if($result_posts_num > 0){
                        while($row = mysqli_fetch_array($result_posts)){
                            $output .= '
                                <div class="post-card">
                                    <div class="quotes">
                                        <h3><i>"'.$row['msg'].'"</i></h3>
                                    </div>
                                </div>

                            ';
                        }
                        echo $output;
                    }
                ?>
                </div>
            </div>
            
        </div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>