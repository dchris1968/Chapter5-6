<!DOCTYPE HTML5>
<html>

<head>
	<title>Uploading Zodiac Images</title>
	<meta charset="utf-8" />
	<style>
		h1{
			text-align:center;
		}
		h2{
			text-align:center;
		}
	</style>
</head>

<body>

		<h1>Uploading Zodiac Images</h1>
			<form method="post" action="<?php echo $_SERVER['SCRIPT_NAME'];?>" enctype="multipart/form-data">
				<label for="file">Filename:</label>
				<input type="file" name="image" id="file"><br>
				<input type="submit" name="submit" value="Submit">
			</form>
			
<?php 
		$Dir = "images";
		if (isset($_POST["submit"]))
		{
			if (isset($_FILES['image']))
			{
				if (move_uploaded_file($_FILES['image']['tmp_name'], $Dir ."/" . $_FILES['image']['name']) == TRUE)
				{
					chmod($Dir ."/". $_FILES['image']['name'], 0644);
					echo "File \"". htmlentities($_FILES['image']['name']). "\"successfully uploaded. <br />\n";
				}
				else
				{
					echo "There was an error uploading \"" . htmlentities($_FILES['image']['name']) . "\".<br />\n";
				}
			}
		}
	
?>
</body>
</html>