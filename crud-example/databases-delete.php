<?php
$dbhost = "localhost";
$dbuser = "widget_cms";
$dbpass = "secretpassword";
$dbname = "widget_corp";

	$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	
	if (mysqli_connect_error()){
		die("Database connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ").");
	}
	
	$id = $_GET['id'];
	
	$query = "DELETE FROM subjects where id = {$id}";
	$result = mysqli_query($connect, $query );
?>

<!DOCTYPE HTML>
<html lang ="en">
<head>
	<meta charset ="UTF-8">
	<title> Databases </title>
	<style>
		.notice{
			color:green;
		}
		.error{
			color:red;
		}
	</style>
</head>
<body>
	<pre>
		<?php if ($result && mysqli_affected_rows($connect)) { ?>
			<p class="notice"><?php echo "Rida kustutatud"; ?></p>
		<?php } else { ?>
			<p class="error"><?php echo "Sellist rida andmebaasis ei ole"; ?></p>
		<?php } ?>

	</pre>
</body>
</html>

<?php mysqli_close($connect);?>