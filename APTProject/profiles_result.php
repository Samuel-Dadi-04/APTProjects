<html>
<body>
<center>
<h3>Profiles found</h3>
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

$sql="SELECT * FROM useraccounts order by Username";
$result=$conn->query($sql);
echo "<table width='100%' id='all_record' cellpadding='5'>";
$count=1;
while($row = $result->fetch_assoc())
{
	echo "<tr class='one_record1'> <td rowspan=2>".$count."</td>";
	echo "<td colspan=3>Full Name: <i>".$row['Full Name']."</i></td>";
	echo "<td colspan=3>Username: <i>".$row['Username']."</i></td>";
	echo "<tr class='one_record2'><td colspan=2>DOB: <i>".$row['DOB']."</i></td>";
	echo "<td colspan=2>Email: <i>".$row['Email']."</i></td>";
	echo "<td colspan=2>Mobile: <i>".$row['Mobile']."</i></td></tr>";
	$count+=1;
}
echo "</table>";

mysqli_close($conn);
?>
</center>
</body>
<style type='text/css'>
	#all_record{
		background: black;
	}
	.one_record1{
		background: #ffffaa;
	}
	.one_record2{
		background: #aaffff;
		margin-bottom: 2px;
	}
	body{
		background: #aacccc;
		padding: 5%;
	}
</style>
</html>