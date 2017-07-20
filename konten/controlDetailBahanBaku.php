<?php
	/*function adddetailbhnbaku($conn){
		if (isset($_POST['simpan'])) {
				$jml 	 = $_POST['jumlah'];

				for($a=0; $a<$jml; $a++){
					if(isset($_POST['komponen'][$a])){
						$komp 	 = $_POST['komponen'][$a];
						
						
						
						if(isset($_POST['bhnbku'][$a])){
							$bhnbku  = $_POST['bhnbaku'][$a];


							$insert = mysqli_query($conn, "INSERT INTO tbdetailbahanbaku (idDetailBhnbBaku, idKomponen, idBhnBaku) 
								VALUES('','$komp','$bhnbku')");

							if($insert == true){
								echo "
								<div class='alert alert-success' role='alert'>
									<use xlink:href='#stroked-checkmark'></use> Data Detail Bahan Baku berhasil ditambahkan. 
								</div>";
							}else{
								echo
								"<div class='alert alert-danger' role='alert'>
									<use xlink:href='#stroked-cancel'></use> Data Detail Bahan Baku tidak ditambahkan. 
								</div>";
							}
				
						}
					}
				}

		
				
		
		}
	}*/
	
?>

<?php
	function adddetailbhnbaku($conn){
		if(isset($_POST['simpan'])){
			
			
			$a=array();
			while($jmlkmp=$_POST['jmlkomp']){
				array_push($a, $jmlkmp);
			}

			$x=0;
			#$jml = $_POST['jmlkomp'];
			
			while ($x<$jmlkmp) {
				$komp 		= $_POST['komponen'];
				$nmbom 		= $_POST['nmbom'];
				$bhnbaku 	= $_POST['bhnbaku'.$x];
				$jmlbutuh 	= $_POST['jmlbutuh'.$x];
				$lvl 		= $_POST['level'.$x];
				$sumber 	= $_POST['sumber'.$x];

				array_push($a, $bhnbaku);

				$query = mysqli_query($conn, "INSERT INTO tbdetailbahanbaku(idBOMKomponen, nmBOM, idKomponen, idBhnBaku, jmlButuh, level, sumber)
					VALUES
					('$komp','$nmbom','$bhnbaku','$jmlbutuh','$lvl','$sumber')")or die(mysqli_error());

				$x++;

				if($query == true){
				echo "
					<div class='alert alert-success' role='alert'>
						Data Struktur Produk Berhasil Disimpan. 
					</div>";
				}else{
				echo "
					<div class='alert bg-danger' role='alert'>
						Data Struktur Produk Gagal Ditambahkan.
					</div>";
				}

			}
			
		}
			
				
	}	
?>