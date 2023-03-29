<?php 
$host= "127.0.0.1";
$username = "root";
$password = "";


// Create connection
$conn = mysqli_connect($host, $username, $password,"APTWEBPAGEDB");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql="SELECT * FROM useraccounts WHERE Username='".$_POST["username"]."';";

$result=$conn->query($sql);

	if($result->num_rows>0)//$result->num_rows>0)
    {
        $row = $result->fetch_assoc();
        if($row["Password"]==$_POST["password"])
        {
        	echo "<B> <CENTER>You have LOGGINED sucessfully<br/><br/>autoredirects to homepage in 5 sec</CENTER></B>";
        	setcookie("Name",$row["Full Name"],time()+2*60*60);
        	setcookie("PIN",$row["Username"],time()+2*60*60);
        	echo "<script>setTimeout(goHome,5000);
        		function goHome(){window.location.href='homepage.php';}</script>";
        }
        else
        {
        	echo "<script>alert('Password Incorrect');</script>";
        	echo "<script>window.location.href='loginpage.php';</script>";
        }
    }
    else
    {
        echo "<script>alert('UserId details not found');window.location.href='loginpage.php';</script>";
    }
    mysqli_close($conn);
?>