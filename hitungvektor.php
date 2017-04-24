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
require_once('connect.php');
//hitung index
mysql_query("TRUNCATE TABLE tbvektor");
//ambil setiap DocId dalam tbindex
	//hitung panjang vektor untuk setiap DocId tersebut
	//simpan ke dalam tabel tbvektor
	$resDocId = mysql_query("SELECT DISTINCT DocId FROM tbindex");
	
	$num_rows = mysql_num_rows($resDocId);
	print("Terdapat " . $num_rows . " dokumen yang dihitung panjang vektornya. <br />");
	
	while($rowDocId = mysql_fetch_array($resDocId)) {
		$docId = $rowDocId['DocId'];
	
		$resVektor = mysql_query("SELECT Bobot FROM tbindex WHERE DocId = '$docId'");
		
		//jumlahkan semua bobot kuadrat 
		$panjangVektor = 0;		
		while($rowVektor = mysql_fetch_array($resVektor)) {
			$panjangVektor = $panjangVektor + $rowVektor['Bobot']  *  $rowVektor['Bobot'];	
		}
		
		//hitung akarnya		
		$panjangVektor = sqrt($panjangVektor);
		
		//masukkan ke dalam tbvektor		
		$resInsertVektor = mysql_query("INSERT INTO tbvektor (DocId, Panjang) VALUES ('$docId', $panjangVektor)");	
	} //end while $rowDocId

?>
</div>

	</div> <!-- END Wrapper -->
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
</body>
</html>