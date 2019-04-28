<html>
<body>

<form>
Search for specific song: <input type="text" value="Mouse"><br>
Please enter the file associated with version of the song you chose: <input type="text" value="Mouse"><br>
Enter your name: <input type="text" value="Mouse"><br>
<input type="submit" value="Submit">
</form>


<table width="600" border="1" cellpadding="1" cellspacing="1">
                <tr>
                <th>File#</th>
		<th>Song Title</th>
		<th>Genre</th>
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
        $stmt = $pdo->query('SELECT FileKey,SongTitle,Version FROM SongFile INNER JOIN File ON SongFile.SFfileID = File.FileID INNER JOIN Song ON SongFile.SFsongID = Song.SongID;');

       while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
         echo "<tr>";
	echo "<td>".$row['FileKey']."</td>";
         echo "<td>".$row['SongTitle']."</td>";
         echo "<td>".$row['Version']."</td>";
        // echo "<td>".$row['Status']."</td>";
         echo "</tr>";
       }

       while($row = $stmt->fetch()){
	 echo $row->FileKey . ' ';
         echo $row->SongTitle . ' ';
         echo $row->Version . ' ';
        // echo $row->Status . ' ';
        // echo $row->City . '<br>';
       }

        ?>
</body>
</html>

