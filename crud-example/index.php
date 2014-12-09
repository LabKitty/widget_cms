<?php
	
$dbhost = "localhost";
$dbuser = "widget_cms";
$dbpass = "secretpassword";
$dbname = "widget_corp";

	$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	
	if (mysqli_connect_error()){
		die("Database connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ").");
	}
	
	$query = "SELECT * FROM subjects where visible = 1 order by position";
	$result = mysqli_query($connect, $query );
?>

<!DOCTYPE HTML>
<html lang ="en">
<head>
	<meta charset ="UTF-8">
	<title> Databases </title>
</head>
<body>

		<a href="database_create.php"> Lisa uus</a>
		<?php  
			while($row = mysqli_fetch_assoc($result)){ ?>
			<h1 class="page-title"><?php echo $row['menu_name'];?></h1> 
			<a href="database-update.php?id=<?php echo $row['id'];?>">Muuda</a>
			<a href="databases-delete.php?id=<?php echo $row['id'];?>">Kustuta</a>
			
		<?php }?>
		<?php  mysqli_free_result($result);?>

	
</body>
</html>

<?php mysqli_close($connect);?>