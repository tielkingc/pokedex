<?php

$search = $_POST['search'];

$servername = "localhost";
$username = "root";
$password = "2wlkj77g";
$db = "pokemon";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "select * from students where name like '%$search%'";

$result = $conn->query($sql);

if ($result->num_rows > 0){
while($row = $result->fetch_assoc() ){
	echo $row["Name"]."  ".$row["Type 1"]."  ".$row["Type 2"]."<br>";
}
} else {
	echo "0 records";
}

$conn->close();

?>