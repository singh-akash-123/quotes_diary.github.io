<?php
    session_start();
    include 'connection.php';
    $quote = '';
    $username = $_SESSION["user_name"];
    $name  = $_SESSION["name"];
    if(isset($_POST["quotes_submit"])){
        
        $quote = $_POST["quote"];
        $insert_query = "INSERT INTO posts (msg,user_name,status,likes,name) VALUES('$quote','$username',1,0,'$name');";
        if(mysqli_query($connection,$insert_query)){
            echo "Record added successful";
            header('location: profile.php');
        }
        else{
            echo "record not added";
        }
        //echo $quote;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add post | Quotes diary</title>
    <!--for the fonts-->
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <!-- Open Sans for body font -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!-- Lato for Title -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="assests/css/custom1.css">
    <style>
        .add-post-area{
            margin-top: 0px;
            background: url(https://images.pexels.com/photos/851213/pexels-photo-851213.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            padding: 25px 0px;
        }
        textarea{
            height: 200px;
            width: 100%;
        }
        .containers{
            width: 40%;
            margin: auto;
            background: rgba(0,0,0,0.5);
            padding: 50px;
        }
        form > label{
            color: #fff;
            font-size: 24px;
        }
        @media(max-width: 770px){
            .containers{
                width: 60%;
            }
        }
        @media(max-width: 650px){
            .containers{
                width: 80%;
            }
        }
        @media(max-width: 520px){
            .containers{
                width: 90%;
                padding: 20px;
            }
        }
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
    <div class="add-post-area">
        <div class="containers">
            <form action="" method="POST">
                <label>Enter post below: </label><br>
                <textarea name="quote" id="quotes" placeholder="Enter your quotes"></textarea><br>
                <input type="submit" value="submit" name="quotes_submit">
            </form>
        </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>