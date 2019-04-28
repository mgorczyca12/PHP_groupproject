<!DOCTYPE html>
<html>

	<head><title>Search</title></head>

	<body>
		<?php
			session_start();
		?>
		
		<!-- Main form to send file data -->
		<form method="GET" action="entry.php">
			<!-- Name:<input type="text" name="user"> -->
			
			<hr>
			
			<input type="text" name="name">
			
			<!-- What gets chosen -->
			
			<select name="choice">
				<option value="artist">Artist</option>
				<option value="song">Song Title</option>
				<option value="contributor">Contributor</option>
			</select>
			
			<!-- Submit button -->
			<br>
			Submit
			<a href="entry.php"><input type="submit" value="submit"></a>
		</form>
		
	</body>
</html>