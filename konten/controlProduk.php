<?php

	function viewproduk($conn){
		$query = mysqli_query($conn, "SELECT * FROM tbproduk ORDER BY idProduk ASC")or die(mysqli_error());

		echo "<table class='table table-striped'>
				<thead>
					<tr>
						<th>No.</th>
						<th>Kode Produk</th>
						<th>Nama</th>
						<th>Jumlah Inventori</th>
						<th>Lead Time</th>
						<th>Sumber</th>
						<th>Action</th>
					</tr>
				</thead>";

				$no = 1;
				while ($data = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
					echo"
					<tr>
						<td> $no </td>
						<td> $data[idProduk]</td>
						<td> $data[nmProduk]</td>
						<td> $data[jmlInventori]</td>
						<td> $data[leadTime]</td>
						<td> $data[sumber]</td>
						<td><a href='.?page=detail&content=edit_produk&id=$data[idProduk]'>
								<button type='button' class='btn btn-default btn-sm'>
  									<span class='glyphicon glyphicon-pencil' aria-hidden='true'></span> Ubah
								</button>
							</a>
						</td>
					</tr>";
					$no++;
				}

		echo "</table>";
		mysqli_free_result($query);
	}



	function addproduk($conn){
		if(isset($_POST['simpan'])){
			$kdproduk = $_POST['idproduk'];
			$nmproduk = $_POST['nmproduk'];
			$jmlinv   = $_POST['jmlinv'];
			$leadtime = $_POST['leadtime'];
			$sumber   = $_POST['sumber'];

			$insertproduk = mysqli_query($conn, "INSERT INTO tbproduk(idProduk, nmProduk, jmlInventori, leadTime, sumber)
				VALUES('$kdproduk','$nmproduk','$jmlinv','$leadtime','$sumber')");


			if($insertproduk == true){
				echo 
					"<div class='alert alert-success' role='alert'>
						Data produk berhasil ditambahkan. 
					</div>";
			}else{
				echo 
					"<div class='alert bg-danger' role='alert'>
						Data produk tidak ditambahkan. 
					</div>";
			}
		}
	}


	function detailProduk($conn, $idproduk){
		$query = mysqli_query($conn, "SELECT * FROM tbproduk WHERE idProduk = '$idproduk'") or die(mysqli_error());
		$detail = mysqli_fetch_row($query);
		return $detail;

		mysqli_free_result($query);
	}


	function editproduk($conn, $kdproduk, $nmproduk, $jmlinv, $leadtime, $sumber){
		$query = mysqli_query($conn, "UPDATE tbproduk
			SET
				nmProduk = '$nmproduk',
				jmlInventori = '$jmlinv',
				leadTime = '$leadtime',
				sumber = '$sumber'
			WHERE
				idProduk = '$kdproduk'")or die(mysqli_error());

		if($query == true){
			echo "
			<div class='alert alert-success' role='alert'>
				Data produk berhasil diubah. 
			</div>";
		}else{
			echo
			"<div class='alert bg-danger' role='alert'>
				Data produk gagal diubah. 
			</div>";
		}
	}

?>