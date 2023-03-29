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

$sql="INSERT INTO peoplecontacted (Full_Name,Email,Message,Status)VALUES ('".$_POST["name"]."','".$_POST["email"]."','".$_POST["message"]."',0);";
$result=$conn->query($sql);

if($result === TRUE)
{
	echo "<script>alert('Your Message has been submitted to College Team, Will reach you soon...');location.href='contact us.html'</script>";
}
else
{
	echo "<script>alert('Soory your review not submitted');history.back();</script>";
}
mysqli_close($conn);
?>