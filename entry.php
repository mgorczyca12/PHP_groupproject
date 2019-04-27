<!DOCTYPE html>
<html>
	
	<head><title>entry</title></head>
	
	<body>
		<?php
			// Start the session
			session_start();
			
			$set1=true;
			$set2=true;
			$set3=true;
		?>
		
		<table border="1">
			<tr>
				<th><a href="entry.php?sort=<?php if($set1==true){echo"ASC"; $set1=false;}else{echo"DESC"; $set1=true;}?>">Artist:</a></th>
				<th><a href="entry.php?sort=<?php if($set2==true){echo"ASC"; $set2=false;}else{echo"DESC"; $set2=true;}?>">Song Title:</a></th>
				<th><a href="entry.php?sort=<?php if($set3==true){echo"ASC"; $set3=false;}else{echo"DESC"; $set3=true;}?>">Contributor:</a></th>
			</tr>
			
			<tr>
				<td><?php echo $_GET('sort') ?></td>
				<td><?php echo $_GET('sort') ?></td>
				<td><?php echo $_GET('sort') ?></td>
			</tr>
		</table>
	</body>
	
</html>