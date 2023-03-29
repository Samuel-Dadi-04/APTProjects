<html>
<body>
<center>
<h3>Contacted People</h3>
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

if(isset($_GET['read']))
{
	if($_GET['read']=='all')
	{
		$sql="UPDATE peoplecontacted SET Status=1";
		$result=$conn->query($sql);
		$_GET['read']='none';
	}
}


$sql="SELECT * FROM peoplecontacted order by Status";
$result=$conn->query($sql);
echo "<table width='100%' id='all_record' cellpadding='5'>";
$count=1;
while($row = $result->fetch_assoc())
{
	echo "<tr class='one_record1'> <td rowspan=2>".$count."</td>";
	echo "<td>Name: <i>".$row['Full_Name']."</i></td>";
	echo "<td>Email: <i>".$row['Email']."</i></td>";
	echo "<td width='8%'><input type='checkbox' disabled ".($row['Status']?"checked":"")."/></td></tr>";
	echo "<tr class='one_record2'><td colspan=3>Message: <i>".$row['Message']."<i/></td></tr>";
	echo "</td></tr>";
	$count+=1;
}
echo "</table>";

mysqli_close($conn);
?>
<button class="upbtn" onclick="location.href='contact_result.php?read=all'">Mark All As Reviewed</button>
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
	.upbtn{
		margin-top: 5%;
        width:fit-content;
        background: #ff7200;
        color: #fff;
        border: none;
        cursor: pointer;
        padding: 10px;
        font-size: 18px;
    }
</style>
</html>