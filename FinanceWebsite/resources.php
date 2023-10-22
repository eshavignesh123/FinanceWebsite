<?php
    // Starts the session
    session_start();

    //Checks if user is logged in and displays certain elements when loggged in and logged out
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
    // Checks if the user clicked the logout button and redirects user to login page
    if (isset($_POST['logout'])) {
        $_SESSION = array();
        session_destroy();
        header("Location: main.php");
        exit;
    }
?>

<html>
    <head>
        <title>Resources</title>

        <!-- Links Google Fonts -->
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

            .nav-barr{
                font-size:16px;
                color:black;
                font-weight: 500;
                text-decoration: none;
                margin-left:50px;
                transition: color 0.3s ease;
            }

            .navbarr a:hover{
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

            /*Styling for resource elements*/
            .youtube-links{

                display:flex;
                flex-direction:row;
                margin-left:4%;
                margin-bottom:5%;
                flex-wrap: wrap;
                
            }

            .video-container{
                display:inline-block;
                margin-left:3%;
                margin-top:3%;
            }

            h1{
                text-align:center;
                margin-top:1%
            }

            .link-container{
                display:flex;
                flex-direction:row;
                margin-left:4%;
                margin-bottom:5%;
                flex-wrap: wrap;
            }
        
            .link{
                display:inline-block;
                margin-left:2.3%;
                margin-top:3%;
                width:29%;
                text-align:center;
                background-color:#f2f2f2;
                padding:10px;
                border-radius:5px;
            }

            .text{
                text-align: center;
                margin-top:2%
            }

            .form-link{
                display: flex;
                flex-direction: row;
                margin-bottom: 5%;
                flex-wrap: wrap;
                justify-content: space-between; /* Center horizontally */
                margin-top:3%;
                margin-left:40%;
                margin-right:40%;
            };
        </style>
    </head>
    <body>

        <!-- Navigation bar -->
        <header class ="header">
            <h3 href = "#" class = "logo">Teens Earn and Learn</h3>
            <nav class="navbar">
                <?php
                    /*Displays navigation bar elements depending on if user is logged in or not*/
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

        <!-- Youtube Videos Layout -->
        <h1 class="youtube-title">YouTube Videos</h1>
        <div class = "youtube-links">
            <div class = "video-container">
                <iframe width="100%"  src="https://www.youtube.com/watch?v=JNL7ZsfKD_4&ab_channel=CharlieChang" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <p class = "text">Raising Your Crdit Score Quickly</p>
            </div>
            <div class = "video-container">
                <iframe width="100%"   src="https://youtu.be/xzz5y_yYVKs?si=gKWtupOcfmii05yj" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <p class = "text">Taxes For Teenagers!</p>
            </div>
            <div class = "video-container">
                <iframe width="100%"   src="https://www.youtube.com/watch?v=Cox8rLXYAGQ&ab_channel=LYFEAccounting" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <p class = "text">Tax Basics For Beginners (Taxes 101)</p>
            </div>
            <div class = "video-container">
                <iframe width="100%"   src="https://youtu.be/YuCRDlEFaw4?si=tRQepDNf0NPQdMO1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <p class = "text">Investing Advice for Teenagers (2023)</p>
            </div>
            <div class = "video-container">
                <iframe width="100%"   src="https://youtu.be/fTTGALaRZoc?si=5KEcj5aMEe8zB7Sl" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <p class = "text">Banking Explained – Money and Credit</p>
            </div>
            <div class = "video-container">
                <iframe width="100%"   src="https://youtu.be/9so90hH4vgc?si=v3jagonEu6dN82C_" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <p class = "text">Credit Scores - Finance for Teens!</p>
            </div>

        </div>

        <!-- Useful Links Layout -->
        <h1 class="link-title">Useful Links</h1>
        <div class = "other-link">
            <div class="link-container">
                <div class="link">
                    <a href="https://www.khanacademy.org/economics-finance-domain/core-finance" target="_blank">Khan Academy Finance</a>
                    <p>Free online courses on finance and economics</p>
                </div>
                <div class="link">
                    <a href="https://www.investopedia.com/" target="_blank">Investopedia</a>
                    <p>Financial education website with articles, tutorials, and videos</p>
                </div>
                <div class="link">
                    <a href="https://www.mint.com/" target="_blank">Mint</a>
                    <p>Free budgeting tool to track your spending and manage your money</p>
                </div>
                <div class="link">
                    <a href="https://www.bls.gov/" target="_blank">Bureau of Labor Statistics</a>
                    <p>Government agency that provides data on employment, wages, and inflation</p>
                </div>
                <div class="link">
                    <a href="https://www.nerdwallet.com/" target="_blank">NerdWallet</a>
                    <p>Personal finance website with reviews and advice on credit cards, loans, and more</p>
                </div>
                <div class="link">
                    <a href="https://www.fool.com/" target="_blank">The Motley Fool</a>
                    <p>Investment advice and stock market news</p>
                </div>
            </div>  
        </div>

        <!-- Leave Other useful links layout -->
        <h1 class="contact-title">Know any other useful resources?</h1>
        <p class = "text">Leave the link down below and we'll add it!<p>
        <form class ="form-link" action="">
            <input type="text" id="link" placeholder="Link" required>
            <input type="submit" name="submit" value="Submit" onclick="auth()">
        </form>

        <script>
            //gives an alert when submitted depending on whether the link was valid or not
            function auth() {
                var linkText = document.getElementById("link").value;

                if (isValidURL(linkText)) {
                    alert("Thanks for submitting! We'll get back to you soon!");
                    return true;
                }

                else{
                    alert("Please enter a valid URL!");
                    event.preventDefault(); // Prevent form submission
                }

                return false;
            }

            //checks if URL is valid and retursn true/false value
            function isValidURL(url) {
                // Regular expression for a valid URL
                const urlRegex = /^(https?|ftp):\/\/[^\s/$.?#].[^\s]*$/;
                return urlRegex.test(url);
            }
        </script>
    </body>
</html>