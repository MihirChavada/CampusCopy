<?php 
session_start();

// Check if all required session variables are set
if (isset($_SESSION['firstname']) && isset($_SESSION['lastname']) && isset($_SESSION['sem']) && isset($_SESSION['enroll'])) {
?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<!-- Display user information -->
	<h1>Hello, <?php echo $_SESSION['firstname']; ?></h1>
	<h1>semester--> <?php echo $_SESSION['sem']; ?></h1>
	<h1>enrollment--> <?php echo $_SESSION['enroll']; ?></h1>
	<!-- Add logout and upload buttons -->
	<a href="logout.php">Logout</a>
	<a href="index.php#upload">upload</a>
</body>
</html>

<?php 
} else {
	// Redirect to index page if session variables are not set
	header("Location: index.php");
	exit();
}
?>
