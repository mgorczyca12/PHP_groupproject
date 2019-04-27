<html>

	<head><title>Search</title></head>

	<body>
		<form method="GET" action="entry.php">

			Artist:<br>
			<select name="artists">
				<option value="null"></option>
				<?php
				
					ini_set('display_error', 1);
					ini_set('display_startup_errors', 1);
					error_reporting(E_ALL);

					try { // if something goes wrong, an exception is thrown
						$dsn = 'mysql:host=courses;dbname=z1817177';
						$username = 'z1817177';
						$password = '1997Apr20';
						$pdo = new PDO($dsn, $username, $password);
					}

					catch(PDOexception $e) { // handle that exception
						echo "Connection to database failed: ";
						echo $e->getMessage();
						exit();
					}

					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
					$sql = "SELECT DISTINCT AssociatedAct FROM SongCon;";
					$prepared = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
					$success = $prepared->execute(array());

					while($row = $prepared->fetch(PDO::FETCH_BOTH))
					{
						echo '<option value="';
						echo $row['AssociatedAct'];
						echo '">';

						echo $row['AssociatedAct'];
						echo '</option>';
					}
				?>
			</select>
			<br>
			
			
			Song Title:<br>
			<select name="title">
				<option value="null"></option>
				<?php
				
					ini_set('display_error', 1);
					ini_set('display_startup_errors', 1);
					error_reporting(E_ALL);

					try { // if something goes wrong, an exception is thrown
						$dsn = 'mysql:host=courses;dbname=z1817177';
						$username = 'z1817177';
						$password = '1997Apr20';
						$pdo = new PDO($dsn, $username, $password);
					}

					catch(PDOexception $e) { // handle that exception
						echo "Connection to database failed: ";
						echo $e->getMessage();
						exit();
					}

					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
					$sql = "SELECT DISTINCT SongTitle FROM Song;";
					$prepared = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
					$success = $prepared->execute(array());

					while($row = $prepared->fetch(PDO::FETCH_BOTH))
					{
						echo '<option value="';
						echo $row['SongTitle'];
						echo '">';

						echo $row['SongTitle'];
						echo '</option>';
					}
				?>
			</select>
			<br>
				
			Contributor:<br>
			<select name="title">
				<option value="null"></option>
				<?php
				
					ini_set('display_error', 1);
					ini_set('display_startup_errors', 1);
					error_reporting(E_ALL);

					try { // if something goes wrong, an exception is thrown
						$dsn = 'mysql:host=courses;dbname=z1817177';
						$username = 'z1817177';
						$password = '1997Apr20';
						$pdo = new PDO($dsn, $username, $password);
					}

					catch(PDOexception $e) { // handle that exception
						echo "Connection to database failed: ";
						echo $e->getMessage();
						exit();
					}

					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
					$sql = "SELECT DISTINCT ConName FROM Contributor;";
					$prepared = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
					$success = $prepared->execute(array());

					while($row = $prepared->fetch(PDO::FETCH_BOTH))
					{
						echo '<option value="';
						echo $row['ConName'];
						echo '">';

						echo $row['ConName'];
						echo '</option>';
					}
				?>
			</select>
			<br>
			Submit
			<input type="submit" value="submit">
		</form>
	</body>
</html>