<?php
	function viewbahanbaku($conn){
		$query = mysqli_query($conn, "SELECT * FROM tbbahanbaku ORDER BY idBhnBaku ASC")or die(mysqli_error());

		echo "<table class='table table-striped'>
				<thead>
					<tr>
						<th>No.</th>
						<th>Nama</th>
						<th>Level</th>
						<th>Jumlah Dibutuhkan (per produk)</th>
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
						<td> $data[nmBhnBaku]</td>
						<td> $data[lvlBhnBaku]</td>
						<td> $data[jmlDibutuhkan]</td>
						<td> $data[jmlInventori]</td>
						<td> $data[leadTime]</td>
						<td> $data[sumber]</td>
						<td><a href='.?page=detail&content=edit_bhnbaku&id=$data[idBhnBaku]'>
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



	function addbhnbaku($conn){
		if(isset($_POST['simpan'])){
			$kdbhnbaku	= $_POST['idbhnbaku'];
			$nmBhnBaku	= $_POST['nmbhnbaku'];
			$lvl 		= $_POST['level'];
			$jmlbutuh 	= $_POST['jmldibutuhkan'];
			$jmlinv 	= $_POST['jmlinv'];
			$leadtime 	= $_POST['leadtime'];
			$sumber 	= $_POST['sumber'];
		

		$insert = mysqli_query($conn, "INSERT INTO tbbahanbaku(`idBhnBaku`, `nmBhnBaku`, `lvlBhnBaku`, `jmlDibutuhkan`, `jmlInventori`, `leadTime`, `sumber`)
			VALUES('$kdbhnbaku','$nmBhnBaku','$lvl','$jmlbutuh','$jmlinv','$leadtime','$sumber')")or die(mysqli_error());

		if($insert == true){
			echo 
				"<div class='alert alert-success' role='alert'>
					Data bahan baku berhasil ditambahkan. 
				</div>";
		}else{
			echo
				"<div class='alert bg-danger' role='alert'>
					Data bahan baku tidak ditambahkan. 
				</div>";

			}
		}
				
	}



	function detailbahanbaku($conn, $kdbhnbaku){
		$query = mysqli_query($conn, "SELECT * FROM tbbahanbaku WHERE idBhnBaku = '$kdbhnbaku'")or die(mysqli_error());
		$detail = mysqli_fetch_row($query);
		return $detail;

		mysqli_free_result($query);
	}



	function editbahanbaku($conn, $kdbhnbaku, $nmBhnBaku, $lvl, $jmlbutuh, $jmlinv, $leadtime, $sumber){
		$query = mysqli_query($conn, "UPDATE tbbahanbaku
			SET 
				nmBhnBaku 		= '$nmBhnBaku',
				lvlBhnBaku 		= '$lvl',
				jmlDibutuhkan 	= $jmlbutuh,
				jmlInventori 	= $jmlinv,
				leadTime 		= $leadtime,
				sumber 			= '$sumber'
			WHERE
				idBhnBaku = '$kdbhnbaku'")or die(mysqli_error());

		if ($query == true){
			echo "
				<div class='alert alert-success' role='alert'>
					Data Bahan Baku berhasil diubah. 
				</div>";
		}else{
			echo "
			<div class='alert bg-danger' role='alert'>
				Data Bahan Baku gagal diubah.
			</div>";
		}
	}
?>



