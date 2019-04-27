<html>
	<head><title>entry</title></head>
	<body>
		<?php
			session_start();
			
			//session_register('artists');
			//session_register('song');
			//session_register('contributer');
			//session_register('name');

			$_SESSION['artists'] = $_GET['artists'];
			$_SESSION['song'] = $_GET['song'];
			$_SESSION['contributor'] = $_GET['contributor'];
			$_SESSION['name'] = $_GET['name'];
			
			ini_set('display_errors', 1);
			ini_set('display_startup_errors', 1);
			error_reporting(E_ALL);

			echo "";
			$username='z1817177';
			$password='1997Apr20';

			try
			{
				$dsn = 'mysql:host=courses;dbname=z1817177';
				$pdo = new PDO($dsn, $username, $password);
			}
			catch(PDOException $e)
			{
				$error_message = $e->getMessage();
				echo $error_message;
				exit();
			}
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			if($_SESSION['artists'] != 'null' && $_SESSION['song'] == 'null' && $_SESSION['contributer'] == 'null')
			{
				$sqlStatement="SELECT SongTitle FROM SongCon INNER JOIN Contributor  ON SongCon.CconID = Contributor.ConID INNER JOIN Song ON SongCon.CsongID = Song.SongID WHERE ConName = 'Ronnie James Dio';";
			}
			else if($_SESSION['artists'] == 'null' && $_SESSION['song'] != 'null' && $_SESSION['contributor'] == 'null')
			{
				$sqlStatement="SELECT Username,SongTitle,Version FROM FreeQueue INNER JOIN SongFile ON FreeQueue.FQFileID = SongFile.FileKey INNER JOIN Song ON SongFile.SFsongID = Song.SongID INNER JOIN File ON SongFile.SFfileID = File.FileID INNER JOIN User ON FreeQueue.FQUSerID = User.UserID;";
			}
			else if($_SESSION['artists'] != 'null' && $_SESSION['song'] != 'null' && $_SESSION['contributor'] == 'null')
			{
				$sqlStatement="SELECT ConName,SongTitle,Genre FROM SongCon INNER JOIN Song ON SongCon.CsongID = Song.SongID INNER JOIN Contributor ON SongCon.CconID = Contributor.ConID;";
			}
			else if($_SESSION['artists'] == 'null' && $_SESSION['song'] == 'null' && $_SESSION['contributor'] != 'null')
			{
				$sqlStatement="";
			}
			else if($_SESSION['artists'] != 'null' && $_SESSION['song'] == 'null' && $_SESSION['contributor'] != 'null')
			{
				$sqlStatement="";
			}
			else if($_SESSION['artists'] == 'null' && $_SESSION['song'] != 'null' && $_SESSION['contributor'] != 'null')
			{
				$sqlStatement="";
			}
			else if($_SESSION['artists'] != 'null' && $_SESSION['song'] != 'null' && $_SESSION['contributor'] != 'null')
			{
				$sqlStatement="";
			}
			else
			{
				exit();
			}
			
			$prepared = $pdo->prepare($sqlStatement, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
			$success = $prepared->execute(array());

			
			echo "<table>";
			while( $row = $prepared->fetch(PDO::FETCH_BOTH))   //was result
			{
				echo '<tr><td>';
				echo $row['SongTitle'];
				echo '</td>';

				echo '<td>';
				echo $row['ConName'];
				echo '</td>';

				echo '<td>';
				echo $row['Genre'];
				echo '</td>';

				echo '</tr>';
			}
			echo "</table>";
			echo '<br><br>';

			
		?>
		
		
	</body>
</html>