<html>
<body>
<style>
            body {
                background-color: #E0FFFF;
            }
            div {
                font-size: 20px;
            }
        </style>
<h1>Welcome,please select the criteria</h1><br>
<select onchange="la(this.value)">
  <option disabled selected>*</option>
  <option value="http://students.cs.niu.edu/~z1817177/Artist.php"> Artist</option>
  <option value="http://students.cs.niu.edu/~z1817177/Song.php">Song</option>
  <option value="http://students.cs.niu.edu/~z1817177/Contributor.php">Contributor</option>

</select>
<script>
function la(src) {
window.location=src;
}
</script>
</body>
</html>
