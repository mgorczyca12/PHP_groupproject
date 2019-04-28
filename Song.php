<html>
<body>

<form action ="http://students.cs.niu.edu/~z1817177/Song.php" method="post">
Search for specific song: <input type="text" value="Mouse"><br>
Enter the song: <input type="text" value="Mouse"><br>
<input type="submit" value="Submit">
</form>

<p> Change your Mind? Redifine your Search Here</p>

<select onchange="la(this.value)">
  <option disabled selected>*</option>
  <option value="http://students.cs.niu.edu/~z1817177/Artist.php">Artist</option>
  <option value="http://students.cs.niu.edu/~z1817177/Contributor.php">Contribution</option>
</select>
<br>


<table width="600" border="1" cellpadding="1" cellspacing="1">
                <tr>
                <th>Song Title</th>
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
        $stmt = $pdo->query('SELECT SongTitle FROM Song;');

       while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
         echo "<tr>";
         echo "<td>".$row['SongTitle']."</td>";
        // echo "<td>".$row['Sname']."</td>";
        // echo "<td>".$row['Status']."</td>";
         echo "</tr>";
       }

       while($row = $stmt->fetch()){
         echo $row->SongTitle . ' ';
        // echo $row->Sname . ' ';
        // echo $row->Status . ' ';
        // echo $row->City . '<br>';
       }

	//$ArtistName = filter_input(INPUT_POST,'ArtistName');

        //$sql = 'SELECT DISTINCT SongTitle FROM SongCon INNER JOIN Song ON SongCon.CsongID = Song.SongID WHERE AssociatedAct = :ArtistName;';
        //$stmt = $pdo->prepare($sql);
        //$stmt->execute(['ArtistName' => $ArtistName]);
        //$posts = $stmt->fetchALL();

        //foreach($posts as $posts) {
        //echo $posts->SongTitle.' <br>';
        //}



        ?>

<script>
function la(src) {
window.location=src;
}
</script>
</body>
</html>


