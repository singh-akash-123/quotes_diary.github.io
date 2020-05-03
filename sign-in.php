<?php
        //session_start();
        $connection = mysqli_connect("localhost","root","","quotes-diary") or die("Unsuccessfull connection");
        $email = $password1 = $pwd = '';

        if(isset($_POST["submit"])){
            $email = $_POST["email"];
            $pwd = $_POST["pwd"];


            $email_search = "SELECT * FROM users WHERE user_name='$email' or email='$email'";
            $result_email = mysqli_query($connection,$email_search);
            $email_count = mysqli_num_rows($result_email);
            if($email_count){
                $row = mysqli_fetch_assoc($result_email);
                $db_pass = $row['pwd'];
                $pass_decode = password_verify($pwd, $db_pass);
                if($pass_decode){
                    //echo "Login successfull";
                    $email = $row["email"];
                    $name = $row["name"];
                    $profile_img = $row["profile_img"];
                    $tag_line = $row["tag_line"];
                    $username = $row["user_name"];
                    session_start();
                    $_SESSION['email'] = $email;
                    $_SESSION['profile_img'] = $profile_img;
                    $_SESSION['name'] = $name;
                    $_SESSION['tag_line'] = $tag_line;
                    $_SESSION['user_name'] = $username;
                    header('location: profile.php');
                }
                else{
                    echo "<script>alert('Password not matched!!!')</script>";
                }
            }else{
                echo "<script>alert('Email not found!!!')</script>";  
            }
        }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
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

    <title>LogIn</title>
    <style>
        *{
            margin: 0;
            padding: 0px;
        }
        body{
            padding: 0;
            margin: 0px !important;
        }
        .add-post-area{
            margin-top: 0px !important;
            background: url(https://images.pexels.com/photos/132037/pexels-photo-132037.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            padding: 25px 0px;
        }
        .containers{
            width: 40%;
            margin: auto;
            background: rgba(0,0,0,0.5);
            padding: 50px;
        }
        form{
            color: rgba(255,255,255);
        }
        h1{
            color: #fff;
            text-align: center;
            margin: 0;
            width: 25%;
            margin: auto;
            padding-bottom: 5px;
            border-bottom: 2px solid #2bc;
        }
        input[type=text],
        input[type=email],
        input[type=password]{
            width: 80% !important;
            height: 35px;
            padding-left: 15px;
            border-radius: 20px;
            color: #000;
        }
        input[type=submit]{
            margin-top: 15px;
            height: 35px;
            width: 100px;
            font-size: 18px;
        }
        label{
            font-size: 20px;
            margin-top: 10px;
        }
        p,a{
            font-size: 18px;
        }
        a{
            color: #2bc;
        }
        a:hover{
            color: #2bc;
        }
        @media(max-width: 770px){
            .containers{
                width: 60%;
            }
        }
        @media(max-width: 600px){
            .containers{
                width: 80%;
            }
            input[type=text],
            input[type=email],
            input[type=password]{
                width: 90% !important;
            }
        }
        @media(max-width: 500px){
            
            input[type=text],
            input[type=email],
            input[type=password]{
                width: 95% !important;
            }
        }
        @media(max-width: 420px){
            .containers{
                width: 95%;
            }
            input[type=text],
            input[type=email],
            input[type=password]{
                width: 100% !important;
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
                                <li> <a href="profile.php">Profile</a></li>
                                <li><a href="about-us.php">About us</a></li>
                                <li><a href="sign-in.php" class="active">Sign In</a></li>
                            </ul>
                        </div><!--/.nav-collapse -->
                    </div>
                </div>
            </div>
        </nav>
    </section>
    <div class="header">
    </div>
    <div class="add-post-area">
        <div class="containers">
            <h1>LogIn</h1>
            
            <form action="" method="POST">

                
                    <label>Username or email</label><br>
                    <input type="text" name="email" placeholder="username"/><br>
                
                    <label for="">Password</label><br>
                    <input type="password" name="pwd" placeholder="password"/><br>
               
                <input type="submit" value="Submit" name="submit" class="btn-primary"/>
                <p>
                    Not yet a member? <a href="add_user.php">Register</a>
                </p>
            </form>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</html>