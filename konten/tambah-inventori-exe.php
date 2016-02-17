<?php
	function addinventori($conn){
		if(isset($_POST['simpan'])){
			$kdbhn	=	$_POST['kdbahan'];
			$nmbhn	=	$_POST['nmbahan'];
			$jml	=	$_POST['jml'];
			$satuan =	$_POST['satuan'];
			$tingkat=	$_POST['tingkat'];

		$insert = mysqli_query($conn, "INSERT INTO `tb_inventori`(`kdbahan`, `nmbahan`, `jml`, `satuan`, `tingkat`) VALUES ('$kdbhn','$nmbhn','$jml','$satuan','$tingkat')")or die(mysqli_error());
		
		if($insert == true){
				echo "
				<div class='alert alert-success' role='alert'>
					<svg class='glyph stroked checkmark'><use xlink:href='#stroked-checkmark'></use></svg> Data inventori bahan baku berhasil ditambahkan. 
				</div>";
			}else{
				echo
				"<div class='alert bg-danger' role='alert'>
					<svg class='glyph stroked checkmark'><use xlink:href='#stroked-cancel'></use></svg> Data inventori bahan baku tidak ditambahkan. 
				</div>";
			}
		}
	}



	function detailinventori($conn, $idinv){
		$query = mysqli_query($conn, "SELECT `kdbahan`, `nmbahan`, `jml`, `satuan`, `tingkat` FROM tb_inventori WHERE kdbahan = $idinv")or die(mysqli_error());
		$detail= mysqli_fetch_row($query);
		return $detail;

		mysqli_free_result($query);
	}


	function editinventori($conn, $idinv, $nm, $jml, $st, $tk){
		$query = mysqli_query($conn, "UPDATE tb_inventori
			SET 
				nmbahan = '$nm',
				jml 	= '$jml',
				satuan 	= '$st',
				tingkat = ' $tk'
			WHERE
				kdbahan = $idinv")or die(mysqli_error());

		if($query == true){
			header("location:?page=tambah_inventori&edit=success");
		}
	}


	function viewinventori($conn){
		$query = mysqli_query($conn, "SELECT * FROM `tb_inventori` ORDER BY kdbahan ASC") or die(mysqli_error());
		echo "<table class='table table-striped'> 
				<thead>
						<tr>
							<th> No. </th>
							<th> Kode Bahan </th>
							<th> Nama Bahan </th>
							<th> Jumlah </th>
							<th> Satuan </th>
							<th> Tingkat</th>
							<th>Actions</th>
						</tr>
					</thead>";
		$no = 1;
		while($data = mysqli_fetch_array($query, MYSQLI_ASSOC)){
			echo "
			<tr>
				<td> $no </td>
				<td> $data[kdbahan] </td>
				<td> $data[nmbahan] </td>
				<td> $data[jml] </td>
				<td> $data[satuan] </td>
				<td> $data[tingkat] </td>
				<td><a href='.?page=detail&content=edit_inventori&id=$data[kdbahan]'>
						<button type='button' class='btn btn-default btn-sm'>
  							<span class='glyphicon glyphicon-pencil' aria-hidden='true'></span> Ubah
						</button>
						<button type='button' class='btn btn-primary btn-sm'>
  							<span class='glyphicon glyphicon-trash' aria-hidden='true'></span> Hapus
						</button>
					</a>
				</td>
			</tr>";
			$no++;
		}
			echo "</table>";
			mysqli_free_result($query);
	}
?>