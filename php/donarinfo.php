<?php
	$name = $_POST['name'];
    $mail = $_POST['mail'];
    $num = $_POST['num'];
    $group = $_POST['group'];
    $address = $_POST['address'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $fir = $_POST['fir'];

	// Database connection
	$conn = new mysqli('localhost','keerthanarajendran','c%0x+p^yQX9W}<fG','database');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(name, mail, num, group, address, age, gender, fir) values(?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param(("ssississ", $name, $mail,$num,$group,$address,$age,$gender,$fir));
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>