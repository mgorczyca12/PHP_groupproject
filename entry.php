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
			$artist=$_SESSION['artists'];
			$song=$_SESSION['song'];
			$contrib=$_SESSION['contributor'];
			if($_SESSION['artists'] != 'null' && $_SESSION['song'] == 'null' && $_SESSION['contributor'] == 'null')
			{
				$sqlStatement="SELECT DISTINCT AssociatedAct,SongTitle,Version FROM SongContributor INNER JOIN Song ON SongContributor.CsongID = Song.songID 
				INNER JOIN Contributor ON SongContributor.CconID = Contributor.ConID INNER JOIN File ON SongContributor.CfileID = File.FileID WHERE AssociatedAct='$artist';";
			}
			else if($_SESSION['artists'] == 'null' && $_SESSION['song'] != 'null' && $_SESSION['contributor'] == 'null')
			{
				$sqlStatement="SELECT DISTINCT AssociatedAct,SongTitle,Version FROM SongCon INNER JOIN Song ON SongCon.CsongID = Song.songID 
				INNER JOIN Contributor ON SongCon.CconID = Contributor.ConID WHERE SongTitle = '$song';";
			}
			else if($_SESSION['artists'] != 'null' && $_SESSION['song'] != 'null' && $_SESSION['contributor'] == 'null')
			{
				$sqlStatement="SELECT DISTINCT AssociatedAct,SongTitle,Version FROM SongContributor INNER JOIN Song ON SongContributor.CsongID = Song.songID 
				INNER JOIN Contributor ON SongContributor.CconID = Contributor.ConID INNER JOIN File ON SongContributor.CfileID = File.FileID 
				WHERE AssociatedAct = '$artist' AND SongTitle = '$song';";
			}
			else if($_SESSION['artists'] == 'null' && $_SESSION['song'] == 'null' && $_SESSION['contributor'] != 'null')
			{
				$sqlStatement="SELECT DISTINCT AssociatedAct,SongTitle,Version FROM SongCon INNER JOIN Song ON SongCon.CsongID = Song.songID INNER JOIN Contributor 
				ON SongCon.CconID = Contributor.ConID WHERE ConName = '$contrib';";
			}
			else if($_SESSION['artists'] != 'null' && $_SESSION['song'] == 'null' && $_SESSION['contributor'] != 'null')
			{
				$sqlStatement="SELECT DISTINCT AssociatedAct,SongTitle,Version FROM SongCon INNER JOIN Song ON SongCon.CsongID = Song.songID 
				INNER JOIN Contributor ON SongCon.CconID = Contributor.ConID WHERE AssociatedAct='$artist' AND ConName = '$contrib';";
			}
			else if($_SESSION['artists'] == 'null' && $_SESSION['song'] != 'null' && $_SESSION['contributor'] != 'null')
			{
				$sqlStatement="SELECT DISTINCT AssociatedAct,SongTitle,Version FROM SongCon INNER JOIN Song ON SongCon.CsongID = Song.songID 
				INNER JOIN Contributor ON SongCon.CconID = Contributor.ConID WHERE SongTitle = '$song' AND ConName = '$contrib';";
			}
			else if($_SESSION['artists'] != 'null' && $_SESSION['song'] != 'null' && $_SESSION['contributor'] != 'null')
			{
				$sqlStatement="SELECT DISTINCT AssociatedAct,SongTitle,Version FROM SongCon INNER JOIN Song ON SongCon.CsongID = Song.songID 
				INNER JOIN Contributor ON SongCon.CconID = Contributor.ConID WHERE AssociatedAct='$artist' AND SongTitle = '$song' AND ConName = '$contrib';";
			}
			else
			{
				echo "Yousa made big error this time";
				exit();
			}
			
			$prepared = $pdo->prepare($sqlStatement, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
			$success = $prepared->execute(array());

			
			echo "<table>";
			echo "<tr>";
			echo "<th>";
			echo "Song";
			echo "</th>";
			echo "<th>";
			echo "Performed by";
			echo "</th>";
			echo "<th>";
			echo "Music Type";
			echo "</th>";
			echo "<th>";
			echo "Select Here to Add Song";
			echo "</th>";
			echo "</tr>";
			$incrementChoice = 0;
			echo '<form action="" method="GET">';
			while( $row = $prepared->fetch(PDO::FETCH_BOTH))   //was result
			{
				echo '<tr><td>';
				echo $row['SongTitle'];
				echo '</td>';

				echo '<td>';
				echo $row['AssociatedAct'];
				echo '</td>';

				echo '<td>';
				echo $row['Version'];
				echo '</td>';
				
				//echo '<td>';
				//echo '<input type="radio" name="songChoice"';
				//if(isset($songChoice) && $songChoice=='$incrementChoice')
				//echo '</td>';

				echo '</tr>';
			}
			echo "</table>";
			echo '<br><br>';

			
		?>
		
		
	</body>
</html>