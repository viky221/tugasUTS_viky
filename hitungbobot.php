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
<p align='center'>
<?php
$host='localhost';
$user='root';
$pass='2214696';
$database='dbstbi';

$conn=mysql_connect($host,$user,$pass);
mysql_select_db($database);
//hitung index
mysql_query("TRUNCATE TABLE tbindex");
$resn = mysql_query("INSERT INTO `tbindex`(`Term`, `DocId`, `Count`) SELECT `token`,`nama_file`,count(*) FROM `dokumen` group by `nama_file`,token");
//$n = mysql_num_rows($resn);
	

//berapa jumlah DocId total?, n
	$resn = mysql_query("SELECT DISTINCT DocId FROM tbindex");
	$n = mysql_num_rows($resn);
	
	//ambil setiap record dalam tabel tbindex
	//hitung bobot untuk setiap Term dalam setiap DocId
	$resBobot = mysql_query("SELECT * FROM tbindex ORDER BY Id");
	$num_rows = mysql_num_rows($resBobot);
	print("Terdapat " . $num_rows . " Term yang diberikan bobot. <br />");

	while($rowbobot = mysql_fetch_array($resBobot)) {
		//$w = tf * log (n/N)
		$term = $rowbobot['Term'];		
		$tf = $rowbobot['Count'];
		$id = $rowbobot['Id'];
		
		//berapa jumlah dokumen yang mengandung term tersebut?, N
		$resNTerm = mysql_query("SELECT Count(*) as N FROM tbindex WHERE Term = '$term'");
		$rowNTerm = mysql_fetch_array($resNTerm);
		$NTerm = $rowNTerm['N'];
		
		$w = $tf * log($n/$NTerm);
		
		//update bobot dari term tersebut
		$resUpdateBobot = mysql_query("UPDATE tbindex SET Bobot = $w WHERE Id = $id");		
  	} //end while $rowbobot


?>
</p>

</div> <!-- END Wrapper -->
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
</body>
</html>