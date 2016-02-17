<?php
	function bukaconn(){
		$link = mysqli_connect(HOST,USER,PASS,DB);
		mysqli_select_db($link, DB) or die(mysqli_error($llink));

		return $link;
	}

	function tutupconn(){
		$link=mysqli_connect(HOST,USER,PASS,DB);
		mysqli_close($link) or die(mysql_error($link));

		//return $link;
	}

?>