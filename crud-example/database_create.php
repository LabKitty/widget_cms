<?php
$dbhost = "localhost";
$dbuser = "widget_cms";
$dbpass = "secretpassword";
$dbname = "widget_corp";

	$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	
	if (mysqli_connect_error()){
		die("Database connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ").");
	}
	
	if(isset($_POST['submit'])){
		$menu_name = $_POST['menu_name'];
		$position = $_POST['position'];
		$visible = $_POST['visible'];
	
		$query = "INSERT INTO subjects (menu_name, position, visible)
          VALUES ('{$menu_name}', {$position}, {$visible} )";
		$result = mysqli_query($connect, $query );
		
		
		if ($result) {
			$answer = "Õnnests";
		} else {
			$answer = "Ebaõnnestus";
			}	
	}
?>

<!DOCTYPE HTML>
<html lang ="en">
<head>
	<meta charset ="UTF-8">
	<title> Databases </title>
</head>

<body>
	<?php
		if(isset($_POST['submit'])){
			echo $answer;
		}
	?>		
	

		
	<form action="database_create.php" method="post">
		<div class="form-field">
			<label for="menu-name">Teema nimi</label>
			<input id="menu-name" type="text" name="menu_name">
		</div>
			
		<div class="form-field">
			<label for="position">Positsioon</label>
			<select name="position">
				<?php for ($i = 1; $i < 16; $i++){ ?>
					<option value="<?php echo $i;?>"> <?php echo $i; ?> </option>
				<?php }?>
			</select>
		</div>
			
		<div class="form-field">
			<label for="visible">Nähtavus</label>
			<select name="visible">
				<option value="1">Nähtav</option>
				<option value="0">Peidetud</option>
			</select>
		</div>
			
		<div class="form-field">
			<input type="submit" name="submit" value="Saada">
		</div>
	</form>
	
	<a href="index.php"> Mine tagasi </a>
</body>
</html>

<?php mysqli_close($connect);?>