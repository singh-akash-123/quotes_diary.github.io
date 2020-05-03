<?php
    session_start();
    include 'connection.php';
    //initializing all the necessary variable for storing result
    $name = "";
    $email = "";
    $password_1 = "";
    $tag_line = "";
    $username = "";
    
    $errors = array();
    //if submit btn is clicked
    
    if(isset($_POST["submit"])){
        $username  = $_POST["user_name"];
        //for uploaded image
        $file = $_FILES['profile_img'];
        //print_r($file);
        $fileName = $_FILES['profile_img']['name'];
        $fileTmpName = $_FILES['profile_img']['tmp_name'];
        $fileSize = $_FILES['profile_img']['size'];
        $fileError = $_FILES['profile_img']['error'];
        $fileType = $_FILES['profile_img']['type'];
        //echo $fileName;
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        //file extension allowance variable
        $allowed = array('jpg', 'jpeg', 'png');

        if(in_array($fileActualExt, $allowed)){
            //checking file for no error
            if($fileError === 0){
                $profile_img = $username."_$fileName";
                //checking file for limited size
                if($fileSize < 1000000){
                    //running main function
                    $newFileName = uniqid('',true).".".$fileActualExt;
                    $fileDestination = 'upload-images/'.$profile_img;
                    move_uploaded_file($fileTmpName, $fileDestination);
                }else{
                    echo "Your file is too big!!!";
                }
            }else{
                array_push($errors,"Error in uploading Image");
                echo "There was error uploading your Image!!!";
            }
        }
        else{
            array_push($errors,"File type error");
            echo "You cannot upload files of this type!!!";
        }
        
        if(empty($fileName)){
            array_push($errors,"File must be uploaded");
            echo "File must be uploaded";
        }
        //
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password_1 = $_POST["password_1"];
        $password_2 = $_POST["password_2"];
        $tag_line = $_POST["tag_line"];
        $username  = $_POST["user_name"];
        $pwd = password_hash($password_1, PASSWORD_BCRYPT);
        //checking name entered or not?
        if(empty($name)){
            array_push($errors,"Name must be required");
            echo "Name field cannot be empty <br/>";
        }
        if(empty($username)){
            array_push($errors,"username must be required");
            echo "Username cannot be empty";
        }
        else{
            $username_query = "
                SELECT * FROM users
                WHERE user_name = '".$username."';
            ";
            $store_username = mysqli_query($connection,$username_query);
            if(mysqli_query($connection,$username_query)){
                //echo "Query successful";
            }
            else{
                echo "Query unsuccessful";
            }
            if(mysqli_num_rows($store_username) > 0){
                array_push($errors,"This username is already taken");
                echo "This username is already taken";
            }
        }
        if(empty($email)){
            array_push($errors,"Email must be required");
            echo "Email cannot be empty";
        }
        if(empty($password_1)){
            array_push($errors,"Password must be required");
            echo "Password field cannot be empty";
        }
        if(empty($tag_line)){
            array_push($errors,"Please enter your tag line");
            echo "tag line required";
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            //echo "statement true";
            array_push($errors, "Please add valid email ID");
            echo "";
        }else{
            //echo "valid email";
            $email_query = "
            SELECT * FROM users 
            WHERE email='".$email."';
           ";
           //print_r($query);
           $store_email = mysqli_query($connection, $email_query);
           $email_num = mysqli_num_rows($store_email);
           //echo $email_num;
           if($email_num > 0){
               array_push($errors, "Email is alreday added");
               echo "Email is already exists";
           }
        }
        
        if($password_1 != $password_2){
            array_push($errors,"Password not match");
            echo "Password not matched!";
        }
    
        if(count($errors) == 0){
            //echo "No error is found";
            $pwd = password_hash($password_1, PASSWORD_DEFAULT);
            //echo $profile_img;
            $insert_query = "INSERT INTO users(name,email,pwd,tag_line,user_name,status,profile_img) VALUES('$name','$email','$pwd','$tag_line','$username',1,'$profile_img')";
            if(mysqli_query($connection,$insert_query)){
                //echo "Record added successfully!!!";
                //mkdir($username);
                header('location: sign-in.php');

            }else{
                echo "Error:". $insert_query . "<br>" . mysqli_error($connection);;
                print_r($errors);
            }
        }
        else{
            echo "Error before execution";
        }
    }
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
    <link rel="stylesheet" href="assests/css/custom1.css"/>
    <title>Add User</title>
    <style>
        .add-post-area{
            margin-top: 0px;
            background: url(https://images.pexels.com/photos/303383/pexels-photo-303383.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940);
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
            height: 35px;
            width: 100px;
            font-size: 18px;
        }
        label{
            font-size: 20px;
            margin-top: 10px;
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
        }
        @media(max-width: 500px){
            
            input[type=text],
            input[type=email],
            input[type=password]{
                width: 90% !important;
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

    <div class="add-post-area">
        <div class="containers">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <label for="">Name: &nbsp &nbsp</label><br><input type="text" name="name" placeholder="Enter name"/><br/>
                <label>Username: </label><br><input type="text" name="user_name" placeholder="enter username"/><br>
                <label>Email : &nbsp &nbsp</label><br><input type="email" name="email" placeholder="email@gmail.com"/><br/>
                <label>Password: </label><br><input type="password" name="password_1" placeholder="Enter password"/><br/>
                <label>Confirm password: </label><br><input type="password" name="password_2" placeholder="enter password again"/><br/>
                <label>Enter your tag line: </label><br><input type="text" name="tag_line" placeholder="Tag line"/><br>
                <label>Upload: </label><input type="file" name="profile_img"><br>
                <input type="submit" value="Submit" name="submit" class="btn-primary"/>
            </div>    
        </form>
        </div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>