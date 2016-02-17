<?php
	
	include "apps/settings.php";

	#memanggil fungsi buka koneksi
	$conn = bukaconn();
	
	include "layout/header.php";
	include "layout/menu.php";
	include "layout/content.php";
	
	
	

	tutupconn();
?>
