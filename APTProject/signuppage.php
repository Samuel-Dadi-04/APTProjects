<html>
    <head>
        <title>SignUp page</title>
        <link rel="stylesheet" href="style.css">
        <script>
            function mess()
            {
              document.write("<B> <CENTER>you are LOGGINED sucessfully</br>NOW YOU ARE A PART OF APT</CENTER></B>");
            }
        </script>
       <style type="text/css">
           .radioType input{
            margin-left: 20%;
            display: inline;
           }
           .radioType span, .radioType label{
            color: #ff7200;;
           }
       </style>
       <script type="text/javascript">
        function unsetUserId() {
            document.getElementById('usernameLabel').innerHTML='PIN';
            document.getElementById('usernameInput').value='';
        }
        function setUserId()
        {
            document.getElementById('usernameLabel').innerHTML='User Name';
            document.getElementById('usernameInput').value='APT_Guest_'+<?php echo getUserId(); ?>;

        }
    </script>
    </head>
    <body background="5.jpg">
    
        <div class="box" style="height: 900px">
            <form action="signupValidate.php" method="post">
                <h2>sign up</h2>
                <div class="radioType">
                    <br/>
                    <label>Type of Sign Up</label><br/><br/>
                    <input type="radio" name="typeOfUser" value="std" id="studentLabel" required onclick="unsetUserId();">
                    <span><label for="studentLabel">Students</label></span>
                    <input type="radio" name="typeOfUser" value="nostd" id="othersLabel" required onclick="setUserId();">
                    <span><label for="othersLabel">Others</label></span>
                </div>
                <div class="inputbox">
                    <input type="text" name="userid" required="required" id="usernameInput">
                    <span id="usernameLabel">Username / PIN</span>
                    <i></i>
                </div>
                <div class="inputbox">
                    <input type="text" name="fullname" required="required">
                    <span >Full Name</span>
                    <i></i>
                </div>
                <div class="inputbox">
                    <input type="password" name="password" required="required">
                    <span>password</span>
                    <i></i>
                </div>
                <div class="inputbox">
                    <input type="email" name="email" required="required">
                    <span >Email</span>
                    <i></i>
                </div>
                <div class="inputbox">
                    <input type="date" name="DOB" required="required">
                    <span >Date Of Birth</span>
                    <i></i>
                </div>
                <div class="inputbox">
                    <input type="number" name="mobile" required="required" max=9999999999 min=1000000000>
                    <span >Mobile</span>
                    <i></i>
                </div>
                <div class="links">
                    <a href="forgetpage.html">forgot password</a>
                    <a href="loginpage.php">sign in</a>
                </div>
                <input type="submit" value="Sign Up" >
              
            </form>
        </div>
    </body>
    
</html>

<?php 

function getUserId()
{

$host= "127.0.0.1";
$username = "root";
$password = "";


// Create connection
$conn = mysqli_connect($host, $username, $password,"APTWEBPAGEDB");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql="SELECT Avaliabe_UserId FROM imp_value";
$result=$conn->query($sql);
$row=$result->fetch_assoc();  
mysqli_close($conn);  
return $row["Avaliabe_UserId"];
}

?>