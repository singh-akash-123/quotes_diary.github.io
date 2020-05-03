<?php
    include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quotes Diary</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!--for the fonts-->
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <!-- Open Sans for body font -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!-- Lato for Title -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assests/css/custom1.css"/>
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
                                <li><a href="index.php" class="active">Home</a></li>
                                <li><a href="users.php">Users</a></li>
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

    <section class="showcase-area">
        <div class="container">
            <div class="inner-bg">
                <div class="text">
                    <h2>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, tenetur!</h2>
                    <a href="#">Read more</a>
                </div>
            </div>
        </div>
    </section>

    <section class="recent-post-area">
        <div class="profile-display">
            <div class="containers">
                <h1>Here are some posts by our users</h1>
                <div class="display-area">
                    <div class="display-posts">
                        
                        <?php
                            $select_posts = "
                                SELECT * FROM posts
                                WHERE status=1
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
                                            <p class="mt-4 text-right" style="font-size: 16px;">Posted by: '.$row['user_name'].'</p>
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
    </section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>