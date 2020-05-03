<?php
    include 'connection.php';
   $get_username = $_GET['user_name'];
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $get_username ?></title>
    <link rel="stylesheet" href="assests/css/custom1.css">
    <!--for the fonts-->
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <!-- Open Sans for body font -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!-- Lato for Title -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

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
                                <li><a href="users.php" class="active">Users</a></li>
                                <li> <a href="profile.php">profile</a> </li>
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
                <?php 
                    $select_user = "
                        SELECT * FROM users
                        WHERE user_name ='$get_username';
                    ";
                    $result_select_user = mysqli_query($connection,$select_user);
                    $output_profile = '<div class="profile">';
                    if(mysqli_num_rows($result_select_user) > 0){
                        while($row = mysqli_fetch_array($result_select_user)){
                            $output_profile .= '
                                <div class="img-container">
                                    <img src="upload-images/'.$row["profile_img"].'" alt="">
                                </div>
                                <div class="text-container text-center">
                                    <h3>'.$row["name"].'</h3>
                                    <h3>'.$row["tag_line"].'</h3>
                                </div>
                            ';
                        }
                        $output_profile .= '</div>';
                        echo $output_profile;
                    }
                ?>
                <div class="display-posts">
                    
                    <?php
                        $select_posts = "
                            SELECT * FROM posts
                            WHERE user_name='$get_username'
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
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
