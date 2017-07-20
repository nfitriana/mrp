<?php
	function addpesanan($conn){
		if(isset($_POST['simpan'])){
			$kdnota	=	$_POST['kdnota'];
			$nm 	= 	$_POST['nmpelanggan'];
			$almt 	=	$_POST['alamat'];
			$pro 	=	$_POST['produk'];
			$jml 	=	$_POST['jml'];
			$tglpsn	=	$_POST['tglpesan'];
			//$tglamb	=	$_POST['tglambil'];

			function ubahformatTgl($tanggal){
				$pisah = explode('/',$tanggal);
				$urutan= array($pisah[2],$pisah[1],$pisah[0]);
				$satukan= implode('-', $urutan);
				return $satukan;
			}

			$tglpesan = $_POST['tglpesan'];
			//menggunakan function ubahFormatTgl
			$ubhtglpesan = ubahformatTgl($tglpesan);

			//$tglambil = $_POST['tglambil'];
			//$ubhtglambil = ubahformatTgl($tglambil);

			$insert = mysqli_query($conn, "INSERT INTO `tbpesanan`(`kdnota`,`namaplg`,`alamatplg`,`produk`,`jml`,`tglpesan`) 
				VALUES ('$kdnota','$nm','$almt','$pro','$jml','$ubhtglpesan')")or die(mysqli_error());

			if($insert == true){
				echo "
				<div class='alert alert-success' role='alert'>
					Data pesanan berhasil ditambahkan. 
				</div>";
			}else{
				echo
				"<div class='alert bg-danger' role='alert'>
					Data pesanan tidak ditambahkan. 
				</div>";
			}
		}
	}



	function viewpesanan($conn){
		$view = mysqli_query($conn, "SELECT * FROM tbpesanan ORDER BY kdnota ASC")or die(mysqli_error());
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
  						<td>
  							<a href='.?page=detail&content=edit_pesanan&id=$data[kdnota]'>
								<button type='button' name='ubah' class='btn btn-default btn-sm'>
		  							<span class='glyphicon glyphicon-pencil' aria-hidden='true'></span> Ubah
								</button>
							</a>
							<a href='.?pagedetail&content=daftar_purchase_order&id=$data[kdnota]'>
								<button type='button' name='hapus' class='btn btn-primary btn-sm'>
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
 

	function detailPesanan($conn, $kdnota){
		$query = mysqli_query($conn, "SELECT * FROM tbpesanan where kdnota = $kdnota")or die(mysqli_error());
		$detail= mysqli_fetch_row($query);
		return $detail;

		mysqli_free_result($query);
		
	}


	function editpesanan($conn, $kdnota, $nmplg, $almt, $produk, $jml, $ubhtglpesan){

		$query = mysqli_query($conn, "UPDATE tbpesanan
			SET
				namaplg = '$nmplg',
				alamatplg = '$almt',
				produk = '$produk',
				jml = '$jml',
				tglpesan = '$ubhtglpesan'
			WHERE
				kdnota = $kdnota")or die(mysqli_error());


		if($query == true){
				echo "
				<div class='alert alert-success' role='alert'>
					Data pesanan berhasil diubah. 
				</div>";
			}else{
				echo
				"<div class='alert bg-danger' role='alert'>
					Data pesanan gagal diubah. 
				</div>";
			}
	}

	function hapuspesanan($conn, $kdnota){
		if(isset($_GET['kdnota'])){
			$kdnota = $_GET['kdnota'];

			$query = mysqli_query($conn, "DELETE FROM tb_pesanan
			WHERE
				kdnota = $kdnota")or die(mysqli_error());

			if($query == true){
				echo "
				<div class='alert alert-success' role='alert'>
					Data pesanan berhasil dihapus. 
				</div>";
			}else{
				echo
				"<div class='alert bg-danger' role='alert'>
					Data pesanan gagal dihapus. 
				</div>";
			}
		}
	}

?>
<?php	
	function previewdata($conn){
		if(isset($_POST['preview'])){
			$nama_file_baru = 'data.xlsx';

			//cek apakah terdapat file data.xlsx pada folder tmp
			if(is_file('tmp/'.$nama_file_baru)) //jika file tersebut ada
				unlink('tmp/'.$nama_file_baru); //hapus file tersebut

			$tipe_file = $_FILES['file']['type']; //Ambil tipe file yang akan diupload
			$tmp_file = $_FILES['file']['tmp_name'];

			// Cek apakah file yang diupload adalah file Excel 2007 (.xlsx)
			if($tipe_file == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
				//Upload file yang dipilih ke folder tmp
				move_uploaded_file($tmp_file, 'konten/tmp/'.$nama_file_baru);

				//load library PHPExcel
				include 'PHPExcel.php';

				$excelreader = new PHPExcel_Reader_Excel2007();
				$loadexcel = $excelreader->load('konten/tmp/'.$nama_file_baru); //load file yang tadi diupload ke folder tmp

				$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true,true);

				//buat sebuah tag form untuk proses import data ke database
				echo "<form method='post' action=''>";

				//Buat sebuah div untuk alert validasi kosong
				echo "<div class='alert alert-danger col-md-12' id='kosong'>
				Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisii.
				</div>";

				echo "<div class='panel-body>";
					echo "<div class='col-md-12'>";
						echo "<table class='table table-bordered'>
							<tr>
								<th colspan='7' class='text-center'>Preview Data</th>
							</tr>
							<tr>
								<th>Kode Nota</th>
								<th>Nama Pelanggan</th>
								<th>Alamat</th>
								<th>Produk</th>
								<th>Jumlah</th>
								<th>Tanggal Pesan</th>
								<th>Proses</th>
							</tr>";

								$numrow = 1;
								$kosong = 0;
								foreach ($sheet as $row) { //Lakukan perulangan dari data yang ada d iexcel
									//Ambil data sesuai kolom
									$kdnota = $row['A']; //AMBIL DATA KDNOTA
									$nmpelanggan = $row['B'];
									$almt = $row['C'];
									$produk = $row['D'];
									$jml = $row['E'];
									$tglpesan = $row['F'];
									//$proses = $row['G'];
									
									// Cek jika semua data tidak diisi
									if(empty($kdnota) && empty($nmpelanggan) && empty($almt) && empty($produk) && empty($jml) && empty($tglpesan))
										continue;

									// Cek $numrow apakah lebih dari 1
				            		// Artinya karena baris pertama adalah nama-nama kolom
				            		// Jadi dilewat saja, tidak usah diimport
									if($numrow > 1){
										//validasi apakah semua data telah diisi
										$kdnota_td = ( !empty($kdnota)) ? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah"
										$nmpelanggan_td = (!empty($nmpelanggan)) ? "" : " style='background: #E07171;'";
										$almt_td = (!empty($almt)) ? "" : " style='background: #E07171;'";
										$produk_td = (!empty($produk)) ? "" : " style='background: #E07171;'";
										$jml_td = (!empty($jml)) ? "" : " style='background: #E07171;'";
										$tglpesan_td = (!empty($tglpesan)) ? "" : " style='background: #E07171;'";
										//$proses_td = (!empty($proses)) ? "" : " style='background: #E07171;'";

										//Jika salah satu data ada yang kosong
										if(empty($kdnota) or empty($nmpelanggan) or empty($almt) or empty($produk) or empty($jml) or empty($tglpesan)){
											$kosong++; //Tambah 1 variable $kosong
										} //if empty

										echo "<tr>";
										echo "<td".$kdnota_td.">".$kdnota."</td>";
										echo "<td".$nmpelanggan_td.">".$nmpelanggan."</td>";
										echo "<td".$almt_td.">".$almt."</td>";
										echo "<td".$produk_td.">".$produk."</td>";
										echo "<td".$jml_td.">".$jml."</td>";
										echo "<td".$tglpesan_td.">".$tglpesan."</td>";
										//echo "<td".$proses_td.">.$proses.</td>";
										echo "</tr>";
									} //if numrow

									$numrow++; //Tambah 1 setiap kali looping
								} //foreach
						echo"</table>";
				

				// Cek apakah variabel kosong lebih dari 1
          		// Jika lebih dari 1, berarti ada data yang masih kosong
          		if($kosong > 1){
          			?>
          			<script>
          			$(document).ready(function(){
          				// Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
          				$("#jumlah_kosong").html('<?php echo $kosong ?>');

          				$("#kosong").show(); //Munculkan alert validasi kosong
          			});
          			</script>
          			<?php
          				} //tutup if kosong
          					else
          				{ //Jika semua data sudah diisi
          					echo "<hr>";

          					//buat sebuah tombol untuk mengimport data ke database
          					echo "<button type='submit' name='import' class='btn btn-primary'><span class='glyphicon glyphicon-upload'></span> Import</button>";

          				} //tutup else kosong
          		
          		echo "</form>";
          		
          			}else{ //Jika file yang diupload bukan file excel 2007
          				//munculkan validasi pesan
          				echo "<div class='alert alert-danger'>
          				Hanya File Excel 2007 (.xlsx) yang diperbolehkan
          				</div>";
          			} //tutup else
          		echo"</div>";
				echo"</div>";	
          		}
			}
		//}
	//}
?>

<?php
	function impportdata($conn){
		if(isset($_POST['import'])){
			$nama_file_baru = 'data.xlsx';

			//Load library excel
			require_once 'PHPExcel.php';

			$excelreader = new PHPExcel_Reader_Excel2007();
			$loadexcel = $excelreader->load('konten/tmp/'.$nama_file_baru); // Load file excel yang tadi diupload di folder tmp

			$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);


			$numrow = 1;
			foreach ($sheet as $row) {
				// Ambil data pada excel sesuai kolom
				$kdnota = $row['A']; //AMBIL DATA KDNOTA
				$nmpelanggan = $row['B'];
				$almt = $row['C'];
				$produk = $row['D'];
				$jml = $row['E'];
				$tglpesan = $row['F'];
				//$proses = $row['G'];

				//$tglpesan = ("MM/DD/YYYY");
				$UNIX_DATE = 343452;
				$EXCEL_DATE = 25569 + ($UNIX_DATE / 86400);
				$dt = gmdate("d-m-Y H:i:s", $UNIX_DATE);

				//$dt=date("Y-m-d",($dt-25569)*86400);
				//$tglpesan1 = date('Y-m-d',strtotime($tglpesan));
				if(empty($kdnota) && empty($nmpelanggan) && empty($almt) && empty($produk) && empty($jml) && empty($tglpesan))
					continue;

				if($numrow > 1){
					//buat query insert
					$query = mysqli_query($conn, "INSERT INTO tbpesanan(kdnota, namaplg, alamatplg, produk, jml, tglpesan)
						VALUES
						('$kdnota','$nmpelanggan','$almt','$produk','$jml','$tglpesan')")or die(mysqli_error());

				}
				$numrow++; //Tambah 1 setiap kali looping
				
				

			}
			if($query == true){
				echo 
					"<div class='form-group'>
						<div class='alert alert-success' role='alert'>
							Data bahan baku berhasil ditambahkan. 
						</div>
					</div>";
			}else{
				echo
					"<div class='form-group'>
						<div class='alert bg-danger' role='alert'>
							Data bahan baku tidak ditambahkan. 
						</div>
					</div>";
					}
			
		
		}
	} 
?>							
