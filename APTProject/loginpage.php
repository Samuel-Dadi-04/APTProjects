<?php

if(isset($_COOKIE["Name"]))
{
    setcookie("Name","",time()-2*60*60);
    setcookie("PIN","",time()-2*60*60);
    echo "<script>alert('You have successful sign out');</script>";
    echo "<script>window.location.href='homepage.php';</script>";
}
?>

<html>
    <head>
        <title>login page</title>
        <link rel="stylesheet" href="style.css">       
    </head>
    <body background="5.jpg">
    
        <div class="box">
            <form action="loginVaildate.php" method="post">
                <h2>sign in</h2>
                <div class="inputbox">
                    <input type="text" name="username" required="required">
                    <span>Username / PIN</span>
                    <i></i>
                </div>
                <div class="inputbox">
                    <input type="password" name="password" required="required">
                    <span>password</span>
                    <i></i>

                </div>
                <div class="links">
                    <a href="forgotpage.html">forgot password</a>
                    <a href="signuppage.php">sign up</a>
                </div>
                <input type="submit" value="login">
              
            </form>
        </div>
    </body>
</html>