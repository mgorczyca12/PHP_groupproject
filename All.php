<html>
<body>
<table width="600" border="1" cellpadding="1" cellspacing="1">
                <tr>
                <th>Song List</th>
		<th>Artist</th>
		<th>Contributor</th>
		<th>Role</th>
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
        $stmt = $pdo->query('SELECT DISTINCT SongTitle,AssociatedAct,ConName,Role FROM SongCon INNER JOIN Song ON SongCon.CsongID = Song.SongID INNER JOIN Contributor ON SongCon.CconID = Contributor.ConID;');

       while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
         echo "<tr>";
         echo "<td>".$row['SongTitle']."</td>";
         echo "<td>".$row['AssociatedAct']."</td>";
         echo "<td>".$row['ConName']."</td>";
		 echo "<td>".$row['Role']."</td>";
         echo "</tr>";
       }

       while($row = $stmt->fetch()){
         echo $row->SongTitle . ' ';
         echo $row->AssociatedAct . ' ';
         echo $row->ConName . ' ';
         echo $row->Role . '<br>';
       }

        ?>
</body>
</html>

