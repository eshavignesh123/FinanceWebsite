

<?php

if (isset($_POST['logout'])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the login or home page
    header("Location: login.php"); // Replace "login.php" with the appropriate page

    // Ensure no more code is executed after the redirect
    exit;
}
?>

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
                margin-right: -35px; /* Adjust this value */
                margin-top:2%;
    
            }
    
    
            .nav-barr{
                font-size:16px;
                color:black;
                font-weight: 500;
                text-decoration: none;
                margin-left:50px;
    
            }
    
            .navbar button{
                
            }
            
            
            .log-out-button {
                top: 0;
                left: 0;
                margin-left:5%;
                width:100%;
                padding:10px;
                border-radius: 50px;
                background-color:black;
                color:white;
                transition: all 0.3s ease;
            }

            .log-out-button:hover{
                width:100%;
                padding:10px;
                border-radius: 50px;
                background-color:white;
                color:black;
                box-shadow: 2px 2px 2px 0px rgba(0,0,0,0.75); 
            }


            .create-blog-container{
                background-color: #fff;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                padding: 20px;
                max-width: 400px;
                width: 100%;
                margin: 0 auto; /* Center the container horizontally */
                margin-top: 2%;
                text-align: center;

            }
    
            h1 {
                margin-bottom: 5%;
                
            }
    
            .blog-form {
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

            .blogContainer {
                background-color: #fff;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                padding: 20px;
                max-width: 25%; /* Allow it to take up the full available width */
                width: 20%; /* Set a smaller width */
                margin: 3% 3% 20px 2%; /* Adjust margin as needed */
                display: inline-block;


            }
        
            
            .blogg{
                width: 100%;
                display: flex;
                flex-wrap: wrap; /* Set flex-wrap to wrap */

            }


    
            
        </style>
    </head>
    <body>
        <header class="header">
            <h3 href="#" class="logo">Teens Earn and Learn</h3>
            <nav class="navbar">
                <a class = "nav-barr" href="main.php">Home</a>
                <a class = "nav-barr" href="blog.php">Blog</a>
                <a class = "nav-barr" href="resources.php">Resources</a>
                <form class = "nav-barr" method="post" action="">
                    <button type="submit" name="logout" class="log-out-button">Logout</button>
                </form>
            </nav>
        </header>
        <div class="create-blog-container">
            <h1>Create Blog Post</h1>
            <form id="blogForm">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required><br><br>
                
                <label for="content">Content:</label>
                <textarea id="content" name="content" required></textarea><br><br>
        
                <!-- Use type="button" to prevent form submission -->
                <input type="button" value="Submit" onclick="auth()">
                
            </form>
        </div>

        <div id = "blogg">


        </div>
    
        <!-- Add a container for the blog posts with the id "blogContainer" -->

        <script>
            // Function to store a user's blog post data in a cookie
            function storeBlogPost(title, content) {
                // Retrieve existing data from the cookie (if any)
                var existingData = getBlogPostDataFromCookie();

                // Add the new data to the existing data
                existingData.push({ title: title, content: content });

                // Store the combined data in the cookie
                document.cookie = "blogPostData=" + JSON.stringify(existingData);

                // Refresh the displayed blog posts
                displayBlogPosts(existingData);
            }

            // Function to retrieve existing blog post data from the cookie
            function getBlogPostDataFromCookie() {
                var data = [];
                var cookies = document.cookie.split(';');
                for (var i = 0; i < cookies.length; i++) {
                    var cookie = cookies[i].trim();
                    if (cookie.indexOf("blogPostData=") === 0) {
                        var cookieValue = cookie.substring("blogPostData=".length);
                        data = JSON.parse(cookieValue);
                        break;
                    }
                }
                return data;
            }

            // Function to display blog posts on the page
            function displayBlogPosts(data) {
                var blogg = document.getElementById("blogg");
                blogg.innerHTML = ""; // Clear the existing content

                data.forEach(function (post) {
                    var blogContainer = document.createElement("div");
                    blogContainer.classList.add("blogContainer");

                    var titleElement = document.createElement("h2");
                    titleElement.innerText = post.title;

                    var contentElement = document.createElement("p");
                    contentElement.innerText = post.content;

                    // Add "Read More" functionality
                    if (post.content.length > 10) {
                        var newHTML = '<h2>' + titleElement.innerText + '</h2><p>' + contentElement.innerText + '</p>';
                        
                    
                        var blob = new Blob([newHTML], { type: 'text/html' });
                        var url = URL.createObjectURL(blob);
                    
                        var link = document.createElement("a");
                        link.textContent = "Read More";
                        link.href = url;

                        contentElement.innerText = post.content.substring(0, 10) + '... ';
                        contentElement.appendChild(link);
                    }

                    blogContainer.appendChild(titleElement);
                    blogContainer.appendChild(contentElement);

                    blogg.appendChild(blogContainer);
                });
            }

            // Function to be called when the "Submit" button is clicked
            function auth() {
                var title = document.getElementById("title").value;
                var content = document.getElementById("content").value;

                if (title !== "" && content !== "") {
                    storeBlogPost(title, content);
                }
            }

            // When the page loads, retrieve the data from the cookie and display it
            var existingData = getBlogPostDataFromCookie();
            displayBlogPosts(existingData);
        </script>
    </body>
    </html>