<?php
	function addmultipleinput($conn){
		if(isset($_POST['simpan'])){
			$makanan = $_POST['makanan'];
			$jumlah_diisi = count($makanan);

			for($x=0; $x<$jumlah_diisi; $x++){
				mysqli_query($conn, "INSERT INTO makanan(id,makanan) VALUES(' ','$makanan[$x]')");
			}
		}
	}
?>