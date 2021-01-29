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
while($row = $result->fetch_assoc() ){
	echo "Name: ".
	$row["Name"].
	"  ".
	"Types: ".
	$row["type1"].
	"  ".
	$row["type2"].
	"<br>".
	"Stats: ".
	"<b>HP: </b>".
	$row["hp"].
	"<b>Attack: </b>".
	$row["attack"].
	"<b>  Defense: </b>".
	$row["defense"].
	"<b>  Special Attack: </b>".
	$row["sp_attack"].
	"<b>  Speacial Defense: </b>".
	$row["sp_defense"].
	"<b>  Speed: </b>".
	$row["speed"].
	"<br>";
}
} else {
	echo "0 records";
}

$conn->close();

?>