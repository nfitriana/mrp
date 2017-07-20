<?php

	function addkomponen($conn){
		if(isset($_POST['simpan'])){
			$id_produk 		= $_POST['nmproduk'];
			$id_komponen 	= $_POST['komponen'];
			$jumlah_komponen= count($id_komponen);

			/*$query ="INSERT INTO tbdetailkomponen(idBom, nmBom, idProduk, idKomponen) VALUES";

				for ($i=0; $i < $count; $i++) { 
					$query .= "('{$id_bom[$i]}','{$nm_bom[$i]}','{$nm_produk[$i]}','{$id_komponen[$i]}')";
					$query .= ",";
				}
				
				$query = rtrim($query,",");

				$insert = mysqli_query($query);*/

				//for($y=0; $y<$x; $y++)
				for($x=0; $x<$jumlah_komponen; $x++){
					for($y=0; $y<=$jumlah_komponen; $y++){
						$insert=mysqli_query($conn, "INSERT INTO tbdetailkomponen(idDetailKomponen, idProduk, idKomponen)
						VALUES('',
							'$id_produk[$x]',
							'$id_komponen[$x]')");
					}
						
					
					
				}

				if($insert == true){
					echo "
					<div class='alert alert-success' role='alert'>
						<use xlink:href='#stroked-checkmark'></use> Data Komponen Produk. 
					</div>";
				}else{
					echo
					"<div class='alert alert-danger' role='alert'>
						<use xlink:href='#stroked-cancel'></use> Data Komponen Produk tidak ditambahkan. 
					</div>";
				}

		}
	}
	

?>