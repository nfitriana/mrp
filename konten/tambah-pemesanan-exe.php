<?php
	function addpesanan($conn){
		if(isset($_POST['simpan'])){
			$kdnota	=	$_POST['kdnota'];
			$nm 	= 	$_POST['nmpelanggan'];
			$almt 	=	$_POST['alamat'];
			$pro 	=	$_POST['produk'];
			$jml 	=	$_POST['jml'];
			$tglpsn	=	$_POST['tglpesan'];
			$tglamb	=	$_POST['tglambil'];

			$insert = mysqli_query($conn, "INSERT INTO `tb_pesanan`(`kdnota`,`namaplg`,`alamatplg`,`produk`,`jml`,`tglpesan`,`tglambil`) 
				VALUES ('$kdnota','$nm','$almt','$pro','$jml','$tglpsn','$tglamb')")or die(mysqli_error());

			if($insert == true){
				echo "
				<div class='alert alert-success' role='alert'>
					<svg class='glyph stroked checkmark'><use xlink:href='#stroked-checkmark'></use></svg> Data pesanan berhasil ditambahkan. 
				</div>";
			}else{
				echo
				"<div class='alert bg-danger' role='alert'>
					<svg class='glyph stroked checkmark'><use xlink:href='#stroked-cancel'></use></svg> Data pesanan tidak ditambahkan. 
				</div>";
			}
		}
	}



	function viewpesanan($conn){
		$view = mysqli_query($conn, "SELECT * FROM tb_pesanan ORDER BY kdnota ASC")or die(mysqli_error());
		echo "<div class='table-responsive'>
				<table class='table table-hover'>
  				<thead> 
  					<tr>
	  					<th> Kode Pesanan </th>
	  					<th> Nama Pelanggan </th>
	  					<th> Alamat </th>
	  					<th> Produk </th>
	  					<th> Jumlah </th>
	  					<th> Tanggal Pesan </th>
	  					<th> Tanggal Diambil </th>
	  					<th> Action </th>
  					</tr>
  				</thead>";
  	
  				while($data = mysqli_fetch_array($view, MYSQLI_ASSOC)){
  					echo"
  					<tr>
  						<td> $data[kdnota] </td>
  						<td> $data[namaplg] </td>
  						<td> $data[alamatplg] </td>
  						<td> $data[produk] </td>
  						<td> $data[jml] </td>
  						<td> $data[tglpesan] </td>
  						<td> $data[tglambil] </td>
  						<td><a href=''>
						<button type='button' class='btn btn-default btn-sm'>
  							<span class='glyphicon glyphicon-pencil' aria-hidden='true'></span> Ubah
						</button>
						<button type='button' class='btn btn-primary btn-sm'>
  							<span class='glyphicon glyphicon-trash' aria-hidden='true'></span> Hapus
						</button>
					</a>
				</td>
  					</tr>";


  				}

			echo "</table>";
			echo "</div>";
				
			mysqli_free_result($view);
	}
?>