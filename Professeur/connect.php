 <?php
	$db_host = "localhost";
	$db_name = "ecolesinfo";
	$db_user = "UEI33";
	$db_pass = "BDEcInf33";
	
	$link = mysqli_connect($db_host, $db_user, $db_pass, $db_name) or die("Error " . mysqli_error($link)); 

	if (!$link)
		echo 'La connexion � la base de donn�e'.mysql_error();
	session_start();
?>