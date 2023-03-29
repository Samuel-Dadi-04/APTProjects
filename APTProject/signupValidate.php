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
//check for similarity
$sql="SELECT Username FROM useraccounts WHERE Username='".$_POST["userid"]."';";
$result=$conn->query($sql);
if($result->num_rows>0)
{
	echo "<script>if(alert('Account already exist for user, Check userid')){history.back();}
	else{window.location.href='signuppage.php'}</script>";
}
else
{
	$sql="INSERT INTO useraccounts(Username, `Full Name`, Password, DOB, Email, Mobile) VALUES ('".$_POST["userid"]."','".$_POST["fullname"]."','".$_POST["password"]."','".date("Y-m-d",strtotime($_POST["DOB"]))."','".$_POST["email"]."',".$_POST["mobile"].");";
	$result=$conn->query($sql);

	if($result)
	{
		if($_POST["typeOfUser"]=="nostd")
		{
			$num=intval(substr($_POST["userid"],10))+1;
			$sql="UPDATE imp_value SET Avaliabe_UserId=".$num.";";
			$result=$conn->query($sql);
		}
		
		echo "<B> <CENTER>Your Account Created and LOGGINED sucessfully</br>NOW YOU ARE A PART OF APT<br/><br/>autoredirects to homepage in 5 sec</CENTER></B>";
        	setcookie("Name",$_POST["fullname"],time()+2*60*60);
        	setcookie("PIN",$_POST["userid"],time()+2*60*60);
        	echo "<script>setTimeout(goHome,5000);
        		function goHome(){window.location.href='homepage.php';}</script>";
	}
	else
	{
		echo "<script>alert('Something goes wrong');window.location.href='signuppage.php';</script>";
	}
}

mysqli_close($conn);

?>