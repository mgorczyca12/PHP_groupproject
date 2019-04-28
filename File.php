<html>
<body>

<form>
Select Version of the Song: <input type="text" value="Mouse"><br>
<input type="submit" value="Submit">
</form>


<table width="600" border="1" cellpadding="1" cellspacing="1">
                <tr>
                <th>Version</th>
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
        $stmt = $pdo->query('SELECT Version FROM SongFile INNER JOIN Song ON SongFile.SFsongID = Song.SongID INNER JOIN File ON SongFile.SFfileID = File.FileID;');

       while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
         echo "<tr>";
         echo "<td>".$row['Version']."</td>";
        // echo "<td>".$row['Sname']."</td>";
        // echo "<td>".$row['Status']."</td>";
         echo "</tr>";
       }

       while($row = $stmt->fetch()){
         echo $row->Version . ' ';
        // echo $row->Sname . ' ';
        // echo $row->Status . ' ';
        // echo $row->City . '<br>';
       }

        ?>
</body>
</html>

