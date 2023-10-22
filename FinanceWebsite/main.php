<?php
// Start the session
    session_start();

    if (!isset($_SESSION['user_id'])) {

        $home = '<a href="main.php">Home</a>';
        $blog ='<a href="register.php">Blog</a>';
        $resources ='<a href="resources.php">Resources</a>';
        $sign= '<a href ="register.php"><button class = "sign-up-button">Sign Up/Log In</button></a>';
        
        
    } else {
        $home ='<a href="main.php">Home</a>';
        $blog ='<a href="webhome.php">Blog</a>';
        $resources ='<a href="resources.php">Resources</a>';
        $sign= '<form class = "nav-barr" method="post" action="">
            <button type="submit" name="logout" class="log-out-button">Logout</button>
            </form>';
        
    }
?>

<?php
// Start the session

if (isset($_POST['logout'])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the login or home page
    header("Location: main.php"); // Replace "login.php" with the appropriate page

    // Ensure no more code is executed after the redirect
    exit;
}
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playpen+Sans:wght@200&family=Roboto+Condensed:wght@600;900&display=swap" rel="stylesheet">
    <style>
        /* Add some basic CSS for styling the navigation bar */
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
            margin-right: -20px; /* Adjust this value */
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
        .nav-barr{
                font-size:16px;
                color:black;
                font-weight: 500;
                text-decoration: none;
                margin-left:50px;
    
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
        
        
        .sign-up-button {
            top: 0;
            left: 0;
            margin-left:5%;
        }
        .button2{
            margin-right:5%;
            float:right;
        }
        .home{
            display:flex;
            justify-content:space-between;
            align-items:center;
        }
        h1 {
            margin-top:5%;
            margin-left:5%;
            font-size:60px;
        }
        img{
            width:40%;
            margin-right:3%;
            margin-top:5%;
            transition: transform 0.3s ease;
        }
        img:hover{
            transform:scale(1.1);
        }
        p {
            margin-top:3%;
            font-size:20px;
            font-weight:normal;
        }
        .typing-animation {
            display: inline-block;
            white-space: nowrap;
            overflow: hidden;
            border-right: 1px solid black;
            animation: typing 3s steps(30, end), blink-caret 0.3s step-end infinite;
        }

        @keyframes typing {
            from {
                width: 0;
            }
            to {
                width: 38%;
            }
        }

        @keyframes blink-caret {
            from, to {
                border-color: transparent;
            }
            50% {
                border-color: black;
            }
        }

        


        
    </style>
</head>
<body>


    <header class ="header">
        <h3 href = "#" class = "logo">Teens Earn and Learn</h3>
        <nav class="navbar">
                
            <?php
                    if (!empty($home)) {
                        echo $home;
                    }
                    if (!empty($blog)) {
                        echo $blog;
                    }
                    if (!empty($resources)) {
                        echo $resources;
                    }
                    if (!empty($sign)) {
                        echo $sign;
                    }
                ?>
            </nav>
       
            
    </header>

    <div class = "home">
        <h1>Let Teens Earn While They Learn<br><p class = "typing-animation">Keep your eye on the prize!</p></h1>
        
        <img src = "eye.png">

    </div>

    

   

    
    
    
    
</body>
</html>