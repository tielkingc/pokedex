<?php

$search = $_POST['search'];

$servername = "localhost";
$username = "root";
$password = "2wlkj77g";
$db = "poke";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "select * from pokemon where type1 or type2 like '%$search%'";

$result = $conn->query($sql);

if ($result->num_rows > 0){
	echo '<ul style="list-style-type:none;">';
	while($row = $result->fetch_assoc() ){
		echo '<li style="text-decoration:none;">' . '<a href="' . $row["link"] . '" style="text-decoration=none;">' . $row['Name'] . '</a>' . '</li>';
}
	echo "</ul>";
} else {
	echo "0 records";
}

$conn->close();

?>