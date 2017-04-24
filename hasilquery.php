<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>	Carikata.ga</title>
	<link rel="stylesheet" type="text/css" href="http://nyekrip.com/demo/nyekrip-template-website-responsive-nyekrip/style/reset.css" />
	<link rel="stylesheet" type="text/css" href="http://nyekrip.com/demo/nyekrip-template-website-responsive-nyekrip/style/style.css" />
	<link rel="stylesheet" type="text/css" href="http://nyekrip.com/demo/nyekrip-template-website-responsive-nyekrip/style/media-queries.css" />
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:700,400,400italic,700italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="style.css">
	<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	</head>
	
<body id="home">
	<div id="wrapper">
	<header>
			<h1><a href="home.php">Carikata.ga</a></h1>
			<h2>Carikata.ga <span>-</span>Web untuk mencari kata dasar</h2>
			<nav>
			    <a href="home.php">HOME</a>
				<a href="upload.php">Upload File</a>
				<a href="carikatadasar.php">Cari Kata Dasar</a>
				<a href="query.php">Query</a>
				<a href="hitungbobot.php">Hitung Bobot</a>
				<a href="awalquery.php">Query 2</a>
				<a href="hitungvektor.php">Hitung Vektor</a>
				<div class="clearfix"></div>
			</nav>	
		</header>
		
<form enctype="multipart/form-data" method="POST" action="hasilquery.php">
  <table width="334" border="0" align="center">
    <tr>
    <td colspan="2">Kata Kunci :</td>
    </tr>
  <tr>
    <td width="144"><input type="text" name="katakunci"></td>
    <td width="180"><input type=submit></td>
  </tr>
  <tr>
    <td colspan="2"></td>
    </tr>
</table>
</form>

<p align='center'>
<?php
 //https://dev.mysql.com/doc/refman/5.5/en/fulltext-boolean.html
 //ALTER TABLE dokumen
//ADD FULLTEXT INDEX `FullText` 
//(`token` ASC, 
 //`tokenstem` ASC);
 
$servername = "localhost";
$username = "root";
$password = "2214696";
$dbname = "dbstbi";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$hasil=$_POST['katakunci'];
$sql = "SELECT distinct nama_file,token,tokenstem FROM `dokumen` where token like '%$hasil%'";
//$sql = "SELECT distinct nama_file,token,tokenstem FROM `dokumen` WHERE MATCH (token,tokenstem) AGAINST ('$hasil' IN BOOLEAN MODE)";


//echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Nama file: " . $row["nama_file"]. " - Token: " . $row["token"]. " " . $row["tokenstem"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();

///

?>
</p>

</div> <!-- END Wrapper -->
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
</body>
</html>