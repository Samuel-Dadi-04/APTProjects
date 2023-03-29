<?php 
$name=$_POST["fullName"];
$PIN=$_POST["PIN"];
$comment="Posted on ".date("d-m-Y")."   ".$_POST["textComment"];
$rating=$_POST["rating"];


/*
Code to add it into database add, 4 attribute and by  whom
*/

$host= "127.0.0.1";
$username = "root";
$password = "";


// Create connection
$conn = mysqli_connect($host, $username, $password,"APTWEBPAGEDB");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql="INSERT INTO review_table (Name,PIN,Comment,Rating) VALUES ('".$name."','".$PIN."','".$comment."',".$rating.")";

$result=$conn->query($sql);
    if($result === TRUE )
    {
        echo "<script>
        function loadMyData()
        {
            document.getElementById('myName').innerHTML='".$name."'
            document.getElementById('myPIN').innerHTML='".$PIN."'
            document.getElementById('mySubmission').innerHTML='".$comment."'
            document.getElementById('myRating').innerHTML='RATING:".$rating."/5'
        }
        </script>";
    }
    else
        echo "<script>
        alert('Something error try again later".$conn->error."');
        window.location.href='review.php';
        </script>";

     mysqli_close($conn);



?>
<!DOCTYPE html>
<html>
<head>
        <title> review submission</title>
        <link rel="stylesheet" href="style6.css">
    </head>
    <body>
        <center>
        <p> You Review has been submitted kindly click continue to go to Review page</p>
        <div class="contactform">
        <div class="inputbox" > 
            <form action="review.php" method="post">
                <input type="submit" name="continue">
            </form>
        </div>
        </div>
        </center>
        <div class="bidda">
            
            <div class="review-box">
                <div class="slide">
                    <div class="card">
                        <div class="profile">
                        <img src="img/commonProfile.png">
                        <div>
                        <h3 id="myName"></h3>
                        <p id="myPIN"></div>
                        </div>
                        <p id="mySubmission"> 

                        </p>
                        <b id="myRating">RATING:</b>

                    </div>
                    
                </div>
          </div>
            </div>
        </div>
        <script>loadMyData()</script>
        
        
         
    </body>
</html>
