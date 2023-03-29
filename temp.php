<?php
$host= "aws.connect.psdb.cloud";
$username = "dyqfalf1sm3dmn7cspck";
$password = "pscale_pw_wo35W9VAZyo3455MOFvesduxKMmgoMb1gC0iRvWR7KQ";


// Create connection
$conn = mysqli_init();
  $conn->ssl_set(NULL, NULL, "aws.connect.psdb.cloud/etc/ssl/certs/ca-certificates.crt", NULL, NULL);
  $conn->real_connect($host, $username, $password,"APTWEBPAGEDB");
//$conn = mysqli_connect($host, $username, $password,"APTWEBPAGEDB");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    echo "nothing";
}
else
{
	echo "Done";
}
?>