<html>
<body>
<center>
<h3>Reviews Posted</h3>
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

$sql="SELECT * FROM review_table order by Comment";
$result=$conn->query($sql);
echo "<table width='100%' id='all_record' cellpadding='5'>";
$count=1;
while($row = $result->fetch_assoc())
{
	echo "<tr class='one_record1'> <td rowspan=2>".$count."</td>";
	echo "<td>Name: <i>".$row['Name']."</i></td>";
	echo "<td>UserId/PIN: <i>".$row['PIN']."</i></td>";
	echo "<td>Rating: <i>".$row['Rating']."</i></td>";
	echo "<tr class='one_record2'><td colspan=3>Message: <i>".$row['Comment']."</i></td></tr>";
	echo "</td></tr>";
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