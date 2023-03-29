<html>
    <head>
        <title> review</title>
        <link rel="stylesheet" href="style6.css">
    </head>
    <body>
   
        <div class="bidda">
            <h1> STUDENTS REVIEWS</h1>
            <div class="contactform">
                <form action="reviewSubmit.php" method="POST">
                    <h2>Send REVIEW</h2>
                    <div class="inputbox">
                        <input type="text" name="fullName" id="fullname" required="required">
                        <span>Full Name</span>
                    </div>
                    <div class="inputbox"> 
                        <input type="text" name="PIN" id="PIN" required="required">
                        <span> PIN / UserId</span>
                    </div>
                    <div class="inputbox"> 
                        <textarea  required="required" name="textComment"></textarea>
                        <span>Type your message...</span>
                    </div>
                    <div class="inputbox">
                        <input type="NUMBER" name="rating" max="5" min="1" required="required" /><span>Rating: </span>
                    </div>
                    <div class="inputbox"> 
                        <i id="info" style="display: block;color:red"></i>
                        <input type="submit" name="" id="submitBtn" value="Send">                        
                    </div>
                    <div class="inputbox"> 
                        <input type="button" name="" value="Back" onclick="document.location.href='homepage.php'">
                    </div>
                </form>
            </div>
        </div>

    </body>
</html>
<?php
loadMyDetails();
loadAllReviews();
function loadMyDetails()
{
    if(isset($_COOKIE["Name"]))
    {
        echo "<script>document.getElementById('fullname').value='".$_COOKIE["Name"]."';document.getElementById('PIN').value='".$_COOKIE["PIN"]."';</script>";
        loadMyReview($_COOKIE["PIN"]);
    }
    else
    {
        echo "<script>document.getElementById('info').innerHTML='Your are not able to give review until you sign in';document.getElementById('submitBtn').disabled=true;</script>";
    }
}
function loadMyReview($person)
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

$sql="SELECT * FROM review_table WHERE PIN='".$person."';";
$result=$conn->query($sql);

if($result->num_rows>0)
    {
        while($row = $result->fetch_assoc())
        {
            loadOneComment($row);   
        }
    }
    else
    {
    }
mysqli_close($conn);
}
function loadAllReviews()
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

$sql="SELECT * FROM review_table";
$result=$conn->query($sql);

if($result->num_rows>0)
    {
        while($row = $result->fetch_assoc())
        {
            if(isset($_COOKIE["Name"]))
            {
                if($row["PIN"]==$_COOKIE["PIN"])
                    continue;
            }
            loadOneComment($row);   
        }
    }
    else
    {
        echo "No Reviews found";
    }
mysqli_close($conn);
}

function loadOneComment($row)
{
    $profilePicPath="img/commonProfile.png";
$data="
<head>
        <title> review</title>
        <link rel='stylesheet' href='style6.css'>
    </head>
    <body>
        <div class='bidda'>
            
            <div class='review-box'>
                <div class='slide'>
                    <div class='card'>
                        <div class='profile'>
                        <img src='".$profilePicPath."'>
                        <div>
                        <h3>".$row["Name"]."</h3>
                        <p>".$row["PIN"]."</div>
                        </div>
                        <p>  ".$row["Comment"]."
                        </p>
                        <b>RATING:".$row["Rating"]."/5</b>
                        
                    </div>
                    
                </div>
          </div>
            </div>
        </div>
    </body>
"; 
echo $data;

}
?>
      