
<?php

if(!isset($_COOKIE["Name"]))
{
echo "<script>alert('You not yet signed. Navigating to Home');history.back();</script>";
}
else
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

$sql="SELECT * FROM useraccounts WHERE Username='".$_COOKIE["PIN"]."';";
$result=$conn->query($sql);
$row = $result->fetch_assoc();

$profilePicPath="img/commonProfile.png";
$data="
<head>
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
                        <h3>".$row["Full Name"]."</h3>
                        <p>".$row["Username"]."</p>
                    	</div>
                        </div>
                        <p><b>Date Of Birth: </b><i>".$row["DOB"]."</i></p>
                        <p><b>Email Id: </b><i></i><i>".$row["Email"]."</i></p>
                        <p><b>Mobile: </b><i>".$row["Mobile"]."</i></p>
                        

                    </div>
                    
                </div>
          </div>
            </div>
        </div>
    </body>
";
echo $data;
}

//if user is admin then show details.
?>

<!DOCTYPE html>
<html>
<head><title>Self Profile</title></head>
<style type="text/css">
    .fbtn{
        width:fit-content;
        background: #ff7200;
        color: #fff;
        border: none;
        cursor: pointer;
        padding: 10px;
        font-size: 18px;
    }
    #btnGroup{
        margin: 5%;
    }
    #frameBox{
        border:2px solid #000000;
        border-radius: 20px;
    }
    body{
        background: #f6fbff;
    }
</style>
<body >
    <center>
    <div style="width: 50%" id="extraPage" hidden>
        <h2>Want to see more details use following</h2>
        <div id="btnGroup">
            <button class="fbtn" onclick="buttonClick(1);">Reviews not seen</button>
            <button class="fbtn" onclick="buttonClick(2);">Contacted People and Info</button>
            <button class="fbtn" onclick="buttonClick(3);">See All User Profiles</button>
        </div>
        <iframe src="filename" id="frameBox" style="width: 100%;height:75%" hidden></iframe>
    </div>
    </center>
</body>
<script>
    function buttonClick(x)
    {
        document.getElementById("frameBox").hidden=false;
        switch(x)
        {
            case 1:document.getElementById('frameBox').src='review_result.php';location.href="#frameBox";break;
            case 2:document.getElementById('frameBox').src='contact_result.php';location.href="#frameBox";break;
            case 3:document.getElementById('frameBox').src='profiles_result.php';location.href="#frameBox";break;
            default:document.getElementById("frameBox").hidden=true;break;
        }
    }
    </script>
</html>

<?php
if(isset($_COOKIE["Name"]))
{
    if($_COOKIE["PIN"]=="Admin")
    {
        echo "<script>document.getElementById('extraPage').hidden=false;</script>";
    }
}
?>