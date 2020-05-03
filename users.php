<?php
    include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!--for the fonts-->
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <!-- Open Sans for body font -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!-- Lato for Title -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
    <title>Users</title>
    <link href="assests/css/custom1.css" rel="stylesheet">
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
                                <li> <a href="profile.php">Profile</a> </li>
                                <li><a href="about-us.php">About us</a></li>
                                <li><a href="sign-in.php">Sign In</a></li>
                            </ul>
                        </div><!--/.nav-collapse -->
                    </div>
                </div>
            </div>
        </nav>
    </section>


    <?php 
        $query_users = "SELECT * FROM users WHERE status=1";
        $output = '';
        $result_users = mysqli_query($connection, $query_users);
        if(mysqli_num_rows($result_users) > 0){
            $output .= '<div class="display-card row">
                        <div class="container card">';
                        
            while($row = mysqli_fetch_array($result_users)){
                $output .= '<a href="user.php?user_name='.$row["user_name"].'">
                            <div class="display-card-outer col col-lg-3 col-md-4 col-sm-6 col-xs-6">
                               <div class="display-card-inner">
                                    <div class="img-container">
                                        <img src="upload-images/'.$row["profile_img"].'" alt="'.$row["name"].'">
                                    </div>
                                    <h3 class="text-center">'.$row["name"].'</h3>
                                    <h5 class="text-center">Total posts: </h5>
                                </div>
                            </div>
                            </a>
                        ';
                
            }
            $output .= '</div></div>';
            echo $output;
        }
        else{
            echo "No user found!!!";
        }
    ?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>