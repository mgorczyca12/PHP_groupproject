<html>
<body>

<form action ="http://students.cs.niu.edu/~z1817177/Contributor.php" method="post">
Search for specific Contributor: <input type="text" name="ConName" placeholder = "Contributer Name"><br>
<input type="submit" value="Submit">
</form>

<p> Change your Mind? Redifine your Search Here</p>

<select onchange="la(this.value)">
  <option disabled selected>*</option>
  <option value="http://students.cs.niu.edu/~z1817177/Artist.php">Artist</option>
  <option value="http://students.cs.niu.edu/~z1817177/Song.php">Song</option>
</select>
<br>
<br>

<table width="600" border="1" cellpadding="1" cellspacing="1">
                <tr>
                <th>Contributor</th>
		<th>Song Name</th>
		<th>Role</th>
		<th>Artist</th>
                <tr>

<?php

        $host = 'courses';
        $user = 'z1817177';
        $password ='1997Apr20';
        $dbname = 'z1817177';

        $dsn = 'mysql:host='. $host .';dbname='. $dbname;
        $pdo = new PDO($dsn,$user,$password);
        $pdo -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        //echo "All Supliers Information:".'<br>';
       $stmt = $pdo->query('SELECT DISTINCT ConName,SongTitle,Role,AssociatedAct FROM SongCon INNER JOIN Song ON SongCon.CsongID = Song.songID INNER JOIN Contributor ON SongCon.CconID = Contributor.ConID;');

       while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
         echo "<tr>";
         echo "<td>".$row['ConName']."</td>";
         echo "<td>".$row['SongTitle']."</td>";
         echo "<td>".$row['Role']."</td>";
		 echo "<td>".$row['AssociatedAct']."</td>";
         echo "</tr>";
       }

       while($row = $stmt->fetch()){
         echo $row->ConName . ' ';
         echo $row->SongTitle . ' ';
         echo $row->Role . ' ';
         echo $row->AssociatedAct . '<br>';
       }

	$ConName = filter_input(INPUT_POST,'ConName');

        $sql = 'SELECT DISTINCT SongTitle FROM SongCon INNER JOIN Song ON SongCon.CsongID = Song.SongID INNER JOIN Contributor ON SongCon.CconID = Contributor.ConID WHERE ConName = :ConName;';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['ConName' => $ConName]);
        $posts = $stmt->fetchALL();

        foreach($posts as $posts) {
        echo $posts->SongTitle.' <br>';
        }


        ?>
<script>
function la(src) {
window.location=src;
}
</script>
</body>
</html>
