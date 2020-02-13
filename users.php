<?php

$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$phone = $_POST['phone'];

if (!empty($name) || !empty($username) || !empty($password) || !empty($email) || !empty($phone)); {

	$host = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbname = "pracdata";

	// connecting
	$conn = new mysql($host, $dbUsername, $dbPassword, $dbname);

	if (mysql_connect_error()); {

		die('Connect Error('.mysqli_connect_errno().')'.mysql_connect_error());
	} else {
		$SELECT = "SELECT email From users Where email = ? Limit 1";
		$INSERT = "INSERT Into users (name, username, password, email, phone) values(?,?,?,?,?)";

		//Prep
		$stmt = $conn->prepare($SELECT);
		$stmt->blind_param("s", $email);
		$stmt->execute();
		$stmt->bind_result();
		$stmt->store_result();
		$rnum = $stmt->num_row;

		if ($rnum == 0) {
			$stmt->close();

			$stmt = $conn->prepare($INSERT);
			$stmt->bind_param("ssssii", $name, $username, $password, $email, $phone);
			$stmt->execute();
			echo "Registration Successful!";
		} else {
			echo "Someone is already registered with this email";
		}
		$stmt->close();
		$conn->close();
	}

} else {
	echo "Please fill out all required areas.";
	die();
}

?>
