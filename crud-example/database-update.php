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

	if(isset($_POST['submit'])){
		$menu_name = $_POST['menu_name'];
		$position = $_POST['position'];
		$visible = $_POST['visible'];
	
		$query = "UPDATE subjects SET
				  menu_name = '{$menu_name}',
				  position = {$position},
			      visible = {$visible}
				  WHERE id = {$id}";
				  
		$result = mysqli_query($connect, $query );
		
		
		if ($result) {
			$answer = "Õnnestus";
		} else {
			$answer = "Ebaõnnestus";
		}
		
	} else {	
		$query = "SELECT * FROM subjects where id = $id";
		$result = mysqli_query($connect, $query );
		$row = mysqli_fetch_assoc($result);
		
		$menu_name = $row['menu_name'];
		$position = $row['position'];
		$visible = $row['visible'];
			
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
	
	<pre>
		<?php print_r($_GET);?>
		<?php print_r($_POST);?>
	</pre>
		
	<form action="database-update.php?id=<?php echo $id; ?>" method="post">
		<div class="form-field">
			<label for="menu-name">Teema nimi</label>
			<input id="menu-name" type="text" name="menu_name" value="<?php echo $menu_name ?>">
		</div>
			
		<div class="form-field">
			<label for="position">Positsioon</label>
			<select name="position">
				<?php for ($i = 1; $i < 16; $i++){ ?>
					<option value="<?php echo $i;?>" <?php if ($i == $position) { echo "selected"; } ?> > <?php echo $i; ?> </option>
				<?php }?>
			</select>
		</div>
			
		<div class="form-field">
			<label for="visible">Nähtavus</label>
			<select name="visible">
				<option value="0"<?php if ($visible == 0) { echo " selected"; } ?> >Peidetud</option>
				<option value="1"<?php if ($visible == 1) { echo " selected"; } ?> >Nähtav</option>
			</select>
		</div>
			
		<div class="form-field">
			<input type="submit" name="submit" value="Saada">
		</div>
	</form>
	
</body>
</html>

<?php mysqli_close($connect);?>