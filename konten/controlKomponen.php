<?php
		function viewkomponen($conn){
		$query = mysqli_query($conn, "SELECT * FROM tbkomponen ORDER BY idKomponen ASC")or die(mysqli_error());

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
						<td> $data[nmKomponen]</td>
						<td> $data[lvlKomponen]</td>
						<td> $data[jmlDibutuhkan]</td>
						<td> $data[jmlInventori]</td>
						<td> $data[leadTime]</td>
						<td> $data[sumber]</td>
						<td><a href='.?page=detail&content=edit_komponen&id=$data[idKomponen]'>
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




	function addkomponen($conn){
		if(isset($_POST['simpan'])){
			$kdkomponen	= $_POST['idkomponen'];
			$nmkomponen	= $_POST['nmkomponen'];
			$lvl 		= $_POST['level'];
			$jmlbutuh 	= $_POST['jmldibutuhkan'];
			$jmlinv 	= $_POST['jmlinv'];
			$leadtime 	= $_POST['leadtime'];
			$sumber 	= $_POST['sumber'];
		

			$insertkomponen = mysqli_query($conn, "INSERT INTO tbkomponen(idKomponen, nmKomponen, lvlKomponen, jmlDibutuhkan, jmlInventori, leadTime, sumber)
				VALUES('$kdkomponen','$nmkomponen','$lvl','$jmlbutuh','$jmlinv','$leadtime','$sumber')");
			
		if($insertkomponen == true){
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


	function detailkomponen($conn, $idkomponen){
		$query = mysqli_query($conn, "SELECT * FROM tbkomponen WHERE idKomponen = '$idkomponen'")or die(mysqli_error($conn));
		$detail = mysqli_fetch_row($query);
		return $detail;

		mysqli_free_result($query);
	}


	function editkomponen($conn, $kdkomponen, $nmkomponen, $lvl, $jmlbutuh, $jmlinv, $leadtime, $sumber){
		$query = mysqli_query($conn, "UPDATE tbkomponen
			SET
				nmKomponen 		= '$nmkomponen',
				lvlKomponen 	= '$lvl',
				jmlDibutuhkan 	= $jmlbutuh,
				jmlInventori 	= $jmlinv,
				leadTime 		= $leadtime,
				sumber 			= '$sumber'
			WHERE
				idKomponen = '$kdkomponen'")or die(mysqli_error());

		if ($query == true){
			echo "
				<div class='alert alert-success' role='alert'>
					Data Komponen berhasil diubah. 
				</div>";
		}else{
			echo "
			<div class='alert bg-danger' role='alert'>
				Data Komponen gagal diubah.
			</div>";
		}
	}

?>