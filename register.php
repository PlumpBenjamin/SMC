<?php

$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$phone = $_POST['phone'];

if (!empty($name) || !empty($username) || !empty($password) || !empty($email) || !empty($phone)) {

    $host = "127.0.0.1";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "users";


    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT email From users Where email = ? Limit 1";
     $INSERT = "INSERT Into users (name, username, password, email, phone) values(?, ?, ?, ?)";


     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssii", $username, $username, $password, $email, $phone);

      $stmt->execute();
      echo "Your account has been registered!";
     } else {
      echo "This email is already linked to Preak account";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All fields are required";
 die();
}
?>

<!DOCTYPE html>
<html>

	<head>

    <!-- init -->

		<title>Register a Preak account</title>
		<link href="https://fonts.googleapis.com/css?family=Roboto+Mono:100,400&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="style.css">
        <script src="index.js"></script>

	</head>

	<body>

		<h1>Register, and join the fun!</h1>
		

		<div class="sign-up-form">


      <!-- form serves no actual purpose, yet. Doesn't have information-->
			<form action="users.php" method="POST">
        <!-- User's name -->
				<input type="name" class="input-box" name="name" placeholder="Full Name" required><br><br>
		<!-- Username -->
				<input type="username" class="input-box" name="username" placeholder="Username" required><br><br>
        <!-- password -->
				<input type="password" class="input-box" name="password" placeholder="Password" required><br><br>
        <!-- email-->
				<input type="email" class="input-box" name="email" placeholder="Email" required><br><br>
        <!-- phone # -->
				<input type="phone" class="input-box" name="phone" placeholder="Phone Number" required><br><br>

        <!-- buttons -->
        <!-- register button, acc means actual, don't know why 2 'C's'-->
				<input type="Submit" value="Register" id="registeracc-button"><br><br>
        <!-- sign in button, leads to sign in page-->
				<button id="Sign-in-button"><a href="login.html" class="special">Sign in</a></button>
        <!-- sign in as guest goes to homepage, cannot post -->
				<button id="LoginasGuest-button"><a href="index.html" class="special">Sign in as Guest</a></button>
		<!-- submit details -->

			</form>

		</div>

	</body>

</html>