<!DOCTYPE html>
<html>
	
	<head><title>entry</title></head>
	
	<?php
		// Start the session
		session_start();
			
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
		
		$columns = array('AssociatedAct','SongTitle','Genre');
		
		// Only get the column if it exists in the above columns array, if it doesn't exist the database table will be sorted by the first item in the columns array.
		$column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];
		
		// Get the sort order for the column, ascending or descending, default is ascending.
		$sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';
	
		$sql = "SELECT DISTINCT AssociatedAct,SongTitle,Genre FROM SongCon INNER JOIN Song ON SongCon.CsongID = Song.songID INNER JOIN Contributor ON SongCon.CconID = Contributor.ConID WHERE AssociatedAct='Queen' AND SongTitle = 'Under Pressure' AND ConName = 'David Bowie' ORDER BY " .  $column . " " . $sort_order . ";";
		$prepared = $pdo->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
		if($success = $prepared->execute(array()))
		{
			// Some variables we need for the table.
			$up_or_down = str_replace(array('ASC','DESC'), array('up','down'), $sort_order); 
			$asc_or_desc = $sort_order == 'ASC' ? 'desc' : 'asc';
		}
	?>
	
	<body>
		<table>
			<tr>
				<th><a href="entry.php?column=AssociatedAct&order=<?php echo $asc_or_desc; ?>">Artist</a></th>
				<th><a href="entry.php?column=SongTitle&order=<?php echo $asc_or_desc; ?>">Song Title</a></th>
				<th><a href="entry.php?column=Genre&order=<?php echo $asc_or_desc; ?>">Genre</a></th>
			</tr>
			<?php while ($row = $prepared->fetch(PDO::FETCH_BOTH)) :?>
			<tr>
				<td<?php echo $column == 'AssociatedAct'; ?>><?php echo $row['AssociatedAct']; ?></td>
				<td<?php echo $column == 'SongTitle'; ?>><?php echo $row['SongTitle']; ?></td>
				<td<?php echo $column == 'Genre'; ?>><?php echo $row['Genre']; ?></td>
			</tr>
			<?php endwhile; ?>
		</table>
	</body>
</html>