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
<form enctype="multipart/form-data" method="POST" action="querytf2.php">
<p align="left"><b>Cari Kata Kunci</b></p>
<table width="308" height="82" border="0" align="center">
    <tr>
      <td width="92">Kata Kunci :</td>
      <td width="200"><input type="text" name="keyword"></td>
    </tr>
    <tr>
      <td colspan="2"><input type=submit value=Cari></td>
    </tr>
  </table>
  <br>
</form>

</div> <!-- END Wrapper -->
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
</body>
</html>