<?php
    // Starts the session
    session_start();
?>

<?php
    include("config.php");
    $error_message = "";

    if (isset($_POST['submit'])) { 
        //Gets the user input from the form
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password']; //changes password to hashed password, so it can be compared with user passwords later
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        //checks if user has an account with the same email
        $verify_query = mysqli_query($con, "SELECT Email FROM users WHERE Email='$email'");
        if (mysqli_num_rows($verify_query) != 0) {
            $error_message = "Do you have an account? ";
        } else {
            mysqli_query($con, "INSERT INTO users(Username, Email, Passwords) VALUES ('$username', '$email', '$hashedPassword')") or die("Error Occurred");
            header("Location: webhome.php");
            exit; 
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>

        <!-- Links Google Fonts -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playpen+Sans:wght@200&family=Roboto+Condensed:wght@600;900&display=swap" rel="stylesheet">
        <style>

            /*Styling for all elements*/
            *{

                margin:0;
                padding:0;
                box-sizing: border-box;
                

            }

            body{
                min-height:100vh;
                background-color: #E8DFF5;
                font-family: 'Roboto Condensed', sans-serif;

            }
        
           /*Styling for navigation bar*/
            header{
                width:100%;
                padding: 20px 100px;
                display:flex;
                justify-content: space-between;
                align-items:center;
                z-index:100;
            }

            .logo{

                font-size: 20px;
                color: black;
                text-decoration: none;
                font-weight: 700px;
                margin-left:-5%;
                margin-top:2%;
            }

            .navbar {
                display: flex;
                align-items: center;
                margin-right: -20px;
                margin-top:2%;
            }

            .navbar a{
                font-size:16px;
                color:black;
                font-weight: 500;
                text-decoration: none;
                margin-left:50px;
                transition: color 0.3s ease;
            }

            .navbar a:hover{
                color: #5E5E5E;
            }

            .navbar button{
                width:100%;
                padding:10px;
                border-radius: 50px;
                background-color:black;
                color:white;
                transition: all 0.3s ease;
            }

            .navbar button:hover{
                width:100%;
                padding:10px;
                border-radius: 50px;
                background-color:white;
                color:black;
                box-shadow: 2px 2px 2px 0px rgba(0,0,0,0.75);  
            }

            
            /*Styling for register elements*/
            .register-container {
                background-color: #fff;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                padding: 20px;
                max-width: 400px;
                width: 100%;
                margin: 0 auto;
                margin-top: 4%;
                text-align: center;
            }
    
            h1 {
                margin-bottom: 5%;
            }
    
            .register-form {
                display: flex;
                flex-direction: column;
            }
    
            .register-input {
                margin: 10px 0;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 3px;
                font-size: 16px;
            }
    
            .register-button {
                background-color: #007BFF;
                color: #fff;
                padding: 10px;
                border: none;
                border-radius: 3px;
                font-size: 16px;
                cursor: pointer;
            }
    
            .register-button:hover {
                background-color: #0056b3;
            }

            .buttons{

                display:flex;
                flex-direction:row;
                justify-content:space-between;
                align-items:center;
                margin-top:5%;
            }

            .click{
                background-color: black;
                color: #fff;
                border-radius: 50px;
                border-style: none;
                width:50%;
                padding: 10px;
                transition: all 0.3s ease;
            }

            .click:hover{
                
                background-color: #383838;
                color: white;

            }

            .register-header{
                margin-top:3%;

            }

            .textLog{
                margin-top:3%;
            }
        </style>
    </head>

    <body>

        <!-- Navigation bar -->
        <header class ="header">
            <h3 href = "#" class = "logo">Teens Earn and Learn</h3>
            <nav class="navbar">
                <a href="main.php">Home</a>
                <a href="register.php">Blog</a>
                <a href="resources.php">Resources</a>
                <a href ="register.php"><button class = "sign-up-button">Sign Up/Log In</button></a>
            </nav>
        </header>

        <!-- Register form layout -->
        <div class ="register-container">
            <h1 class = "register-header">Register</h1>
            <form action="" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" required name = "username"><br><br>
                
                <label for="email">Email:</label>
                <input type="email" id="email" required name = "email"><br><br>
                
                <label for="password">Password:</label>
                <input type="password" id="password" required name = "password"><br><br>

                <div clas ="buttons">
                    <input class = "click" type="submit" name = 'submit' value="Register">
                </div>

                
                <?php
                    //displays error message if there is any
                    if (!empty($error_message)) {
                        echo "<p class = 'textLog'>$error_message<a class = 'textLog' href = 'login.php'>Log In</a></p>";
                    }

                    else{
                        echo '<p class = "textLog">Already a member? <a href ="login.php">Log In</a></p>';
                    }
                ?>
            </form>   
        </div>
    </body>
</html>