<?php
function saveagkey($conn, $bln1, $th1, $bln2, $th2){
		
	$_SESSION['month1']	= $bln1;
	$_SESSION['year1']	= $th1;
	$_SESSION['month2']	= $bln2;
	$_SESSION['th2']	= $th2;
	#g tau buat apa ^-^ sapa tau nanti butuh
	
	$p1 = "$th1-$bln1-01";
	$p2 = "$th2-$bln2-01";
	
	$periode = "Agregat Periode ".date('M Y', strtotime($p1))." s.d ".date('M Y', strtotime($p2));
		
	if($bln1 >= $bln2){
		echo "
			<div class='alert alert-warning alert-dismissible' role='alert'>
			  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
			  <strong>Warning!</strong> Kesalahan dalam pemilihan periode bulan.
			</div>
		";
	}else{
		#echo "$bln1, $bln2, $thn";
		
		$qry	= mysqli_query($conn, "SELECT `idAgregat`, `PeriodeAgregat`, `tglproses` FROM `tbpag` order by idAgregat asc") or die(mysqli_error());
		$jml	= mysqli_num_rows($qry);
		
		#create id
		if($jml == 0){
			$periodd = $jml+1;
			$idagregat = "IDAGR".date('dmY')."0000001";
		}else{
			if(strlen($jml) == 1){
				$n = $jml+1;
				$periodd = $jml+1;
				$idagregat = "IDAGR".date('dmY')."000000$n";
			}else if(strlen($jml) == 2){
				$n = $jml+1;
				$periodd = $jml+1;
				$idagregat = "IDAGR".date('dmY')."00000$n";
			}else if(strlen($jml) == 3){
				$n = $jml+1;
				$periodd = $jml+1;
				$idagregat = "IDAGR".date('dmY')."0000$n";
			}else if(strlen($jml) == 4){
				$n = $jml+1;
				$periodd = $jml+1;
				$idagregat = "IDAGR".date('dmY')."000$n";
			}else if(strlen($jml) == 5){
				$n = $jml+1;
				$periodd = $jml+1;
				$idagregat = "IDAGR".date('dmY')."00$n";
			}else if(strlen($jml) == 6){
				$n = $jml+1;
				$periodd = $jml+1;
				$idagregat = "IDAGR".date('dmY')."0$n";
			}else if(strlen($jml) == 7){
				$n = $jml+1;
				$periodd = $jml+1;
				$idagregat = "IDAGR".date('dmY')."$n";
			}
		}
		
		$_SESSION['idagregat'] = $idagregat;
		$_SESSION['periodeag'] = $periodd;
		
		$tgl	= date('Y-m-d');
		
		$simpan = mysqli_query($conn, "INSERT INTO `tbpag`(`idAgregat`, `PeriodeAgregat`, `tglproses`) 
		VALUES ('$idagregat', '$periode', DATE(NOW()))")or die(mysqli_error());
		
		if($simpan){
			echo "
				<div class='alert alert-success alert-dismissible' role='alert'>
				  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				  <strong>Success : </strong> ID agregat sudah tersimpan, lanjutkan proses
				  <br />
				  <a class='btn btn-warning' href='.?page=detail&content=persamaan_1'>NEXT STEP 1</a>
				</div>
			";
		}
	}
}

/*
	START PERSAMAAN PERTAMA
*/
function persamaanpertama($conn){
	$N		= 6; #nilai n yg akan dihitung sesuai dengan penetapan dalam 1 periode ada 6 bulan
	$param	= rand(1,10)/10; #parameter bobot B
	$params	= number_format($param,5);
	
	if(isset($_POST['simpan'])){
		savepersamaanpertama($conn);
	}
	
	echo "Parameter Bobot (<strong>B</strong>) yg digunakan = ".number_format($params,1)."<br /><br />";
	
	echo "<form name='caribn' action='' method='post'>";
	
	echo "
		<div class='form-group'>
			<label>ID : ".$_SESSION['idagregat']."</label>
			<input type='hidden' name='IDag' value='".$_SESSION['idagregat']."' readonly='true' />
		</div>
	";
	
	echo "
		<div class='form-group'>
			<label>Periode Ke-".$_SESSION['periodeag']."</label>
			<input type='hidden' name='periodd' value='".$_SESSION['periodeag']."' readonly='true' />
		</div>
	";
	
	$jmlbn=array();
	for($n=1; $n<=$N; $n++){
		
		#sigma
		$pembagi=0; 
		
		for($s=1; $s<=$n; $s++){
			$pembagi += pow($params, $n);
			#fungsi pow() untuk melakukan perhitungan x pangkat y, ct : pow(x,y)
		}

		/*
			Mengitung bn 

		*/
		
		$atas	= pow($params, $n);
		$bn[$n] = $atas/$pembagi;
		
		echo "<div class='form-group'>";
		echo "<label>b ke-$n : </label>".number_format($atas,5)."/".number_format($pembagi,5)."= <input name='bn$n' value='".number_format($bn[$n],5)."' readonly='true' /> <br />";
		echo "</div>";
	}
	
	echo "<br />";
	echo "<input type='hidden' name='N' value='$N' />";
	echo "<div class='form-actions'>
			<button name='simpan' type='submit' class='btn btn-primary'>Proses</button>
		</div>";
	echo "</form>";
	
	
}

function savepersamaanpertama($conn){
	$N			= $_POST['N']; #jumlah bulan dalam 1 periode, sbg patokan perulangan
	$IDag		= $_POST['IDag'];
	$periode	= $_POST['periodd'];
	
	$x=0;
	for($i=1;$i<=$N;$i++){
		
		$bn		= $_POST['bn'.$i];
		
		$input	= mysqli_query($conn, "INSERT INTO `tbpag_pers1`(`idAgregat`, `bn`, `periode`) 
		VALUES ('$IDag',$bn,$periode)")or die(mysqli_error());
		
		$x+=1;
	}
	
	echo "
		<div class='alert alert-info alert-dismissible' role='alert'>
		  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
		  <strong>INFO : </strong> Data persamaan b<sub>n</sub> sejumlah $x berhasil tersimpan
		  <br />
		  <a class='btn btn-warning' href='.?page=detail&content=persamaan_2'>NEXT STEP 2</a>
		</div>
	";
}
/*
	END PERSAMAAN PERTAMA
*/


/*
	START PERSAMAAN KEDUA (MENGHITUNG JUMLAH TENAGA KERJA IDEAL)
*/
function persamaankedua($conn){
	$N = 6;
	
	if(isset($_POST['simpan'])){
		savepersamaankedua($conn);
	}
	
	echo "<form name='cariwbintang' action='' method='post'>";
	
	echo "
		<div class='form-group'>
			<label>ID : ".$_SESSION['idagregat']."</label>
			<input type='hidden' name='IDag' value='".$_SESSION['idagregat']."' readonly='true' />
		</div>
	";
	
	echo "
		<div class='form-group'>
			<label>Periode Ke-".$_SESSION['periodeag']."</label>
			<input type='hidden' name='periodd' value='".$_SESSION['periodeag']."' readonly='true' />
		</div>
		<div class='form-group'>
			<label>Jumlah Standar Kerja (orang per-unit) : </label>
			<input type='text' name='K' value='' required />
		</div>
	";
	
	#menampilkan Ramalan diperiode ke-t
	
	$Ft		= mysqli_query($conn, "SELECT Bulan, SMA FROM `tbperamalan_detail` WHERE `Periode` = ".$_SESSION['periodeag']." ORDER BY Bulan LIMIT $N")or die(mysqli_error());
	
	$t=1;
	while($data = mysqli_fetch_assoc($Ft)){
		echo "
		<div class='form-group'>
			<label>F-$t : </label>
			<input type='text' name='F$t' value='$data[SMA]' readonly='true' />
		</div>
		";
		
		$t++;
	}
	
	echo "<br />";
	echo "<input type='hidden' name='N' value='$N' />";
	echo "<div class='form-actions'>
			<button name='simpan' type='submit' class='btn btn-primary'>Proses</button>
		</div>";
	echo "</form>";
	
	
}
function savepersamaankedua($conn){
	$N			= $_POST['N']; #jumlah bulan dalam 1 periode, sbg patokan perulangan
	$IDag		= $_POST['IDag'];
	$periode	= $_POST['periodd'];
	$K			= $_POST['K'];
	
	$x=0;
	for($i=1;$i<=$N;$i++){
		
		#ambil bn
		$limit	= $i-1; #diperlukan Limit utk mengmbil nilai bn satu2
		$bn		= mysqli_query($conn, "SELECT `ids`, bn FROM `tbpag_pers1` WHERE periode = 1 order by ids asc LIMIT $limit,1")or die(mysqli_error());
		$newbn	= mysqli_fetch_assoc($bn);
		
		
		$Ft		= $_POST['F'.$i];
		$W		= 0;
	
		
		for($a=1; $a<=$i; $a++){
			#menghitung persamaan W*
			$W += ($newbn['bn']*$K*$Ft);
		}
		
		#pembulatan keatas
		$Wbintang = ceil($W);
		
		mysqli_query($conn, "INSERT INTO `tbpag_pers2`(`idAgregat`, `W_bintang`, `K`, `periode`) 
		VALUES ('$IDag',$Wbintang,$K,$periode)");
		
		$x+=1;
	}
	
	echo "
		<div class='alert alert-info alert-dismissible' role='alert'>
		  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
		  <strong>INFO : </strong> Data persamaan W<sup>*</sup> sejumlah $x berhasil tersimpan
		  <br />
		  <a class='btn btn-warning' href='.?page=detail&content=persamaan_3'>NEXT STEP 3</a>
		</div>
	";
}
/*
	END PERSAMAAN KEDUA (MENGHITUNG JUMLAH TENAGA KERJA IDEAL)
*/

/*
	START PERSAMAAN KETIGA (MENGHITUNG JUMLAH TENAGA KERJA KE-t)
*/
function persamaanketiga($conn){
	$N = 6;
	$param	= rand(1,10)/10; #parameter bobot A
	$params	= number_format($param,5);
	
	if(isset($_POST['simpan'])){
		savepersamaanketiga($conn);
	}
	
	echo "Parameter Bobot (<strong>A</strong>) yg digunakan = ".number_format($params,1)."<br /><br />";
	echo "<form name='cariwt' action='' method='post'>";
	
	echo "
		<div class='form-group'>
			<label>ID : ".$_SESSION['idagregat']."</label>
			<input type='hidden' name='IDag' value='".$_SESSION['idagregat']."' readonly='true' />
			<input type='hidden' name='bobotA' value='".number_format($params,1)."' readonly='true' />
		</div>
	";
	
	echo "
		<div class='form-group'>
			<label>Periode Ke-".$_SESSION['periodeag']."</label>
			<input type='hidden' name='periodd' value='".$_SESSION['periodeag']."' readonly='true' />
		</div>
	";
	
	#input tenaga kerja yg di inginkan pada periode ke-t
	for($t=1; $t<=$N; $t++){
		echo "
			<div class='form-group'>
				<label>Jumlah Tenaga Kerja Yang Diinginkan Periode $t : </label>
				<input type='text' name='Wt$t' value='' required />
			</div>";
	}
	
	#menampilkan data W* Ke-t
	
	$Wbintang		= mysqli_query($conn, "SELECT `ids`,`W_bintang` FROM `tbpag_pers2` WHERE periode = ".$_SESSION['periodeag']." ORDER BY ids ASC LIMIT $N")or die(mysqli_error());
	
	$xy=1;
	while($data = mysqli_fetch_assoc($Wbintang)){
		echo "
		<div class='form-group'>
			<label>W* Ke-$xy : </label>
			<input type='text' name='Wbintang$xy' value='$data[W_bintang]' readonly='true' />
		</div>
		";
		
		$xy++;
	}
	
	echo "<br />";
	echo "<input type='hidden' name='N' value='$N' />";
	echo "<div class='form-actions'>
			<button name='simpan' type='submit' class='btn btn-primary'>Proses</button>
		</div>";
	echo "</form>";
	
	
}

function savepersamaanketiga($conn){
	$N			= $_POST['N']; #jumlah bulan dalam 1 periode, sbg patokan perulangan
	$IDag		= $_POST['IDag'];
	$periode	= $_POST['periodd'];
	$A			= $_POST['bobotA'];
		
	$x=0;
	for($i=1;$i<=$N;$i++){
				
		$Wtk		= $_POST['Wt'.$i]; #jumlah tenaga kerja yg diinginkan pada periode ke-t
		$Wbintang	= $_POST['Wbintang'.$i]; #W* ke-t
	
		
		$Wt			= ($Wtk-1)+($A*($Wbintang-$Wtk-1));
		$Wte		= ceil($Wt);
		
		mysqli_query($conn, "INSERT INTO `tbpag_pers3`(`idAgregat`, `Wt`, `A`, `periode`) 
		VALUES ('$IDag', $Wte, $A, $periode)");
		
		$x+=1;
	}
	
	echo "
		<div class='alert alert-info alert-dismissible' role='alert'>
		  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
		  <strong>INFO : </strong> Data persamaan W<sub>t</sub> sejumlah $x berhasil tersimpan
		  <br />
		  <a class='btn btn-warning' href='.?page=detail&content=persamaan_4'>NEXT STEP 4</a>
		</div>
	";
}
/*
	END PERSAMAAN KETIGA (MENGHITUNG JUMLAH TENAGA KERJA KE-t)
*/


/*START PERSAMAAN KEEMPAT (MENGHITUNG DEVIASI (SELISIH) ANTARA TINGKAT PERSEDIAAN IDEAL)*/
function persamaankeempat($conn){
	$N = 6;
	
	if(isset($_POST['simpan'])){
		savepersamaankeempat($conn);
	}
	
	echo "<form name='caripersempat' action='' method='post'>";
	
	echo "
		<div class='form-group'>
			<label>ID : ".$_SESSION['idagregat']."</label>
			<input type='hidden' name='IDag' value='".$_SESSION['idagregat']."' readonly='true' />
		</div>
	";
	echo "
		<div class='form-group'>
			<label>Periode Ke-".$_SESSION['periodeag']."</label>
			<input type='hidden' name='periodd' value='".$_SESSION['periodeag']."' readonly='true' />
		</div>
	";
	
	#Mengambil persediaan terahir dari produk gamis, kalau mau dinamis di select semua tampilkan pakai dropdown-list
	$jmlinven	= mysqli_query($conn, "SELECT `nmProduk`, `jmlInventori` FROM `tbproduk` WHERE `idProduk`='PRO00012'")or die(mysqli_error());
	$datainven	= mysqli_fetch_assoc($jmlinven);
	
	echo "
		<div class='form-group'>
			<label>Sisa Stok Produk</label>
			<input type='text' name='inven' value='$datainven[jmlInventori]' readonly='true' />
		</div>
	";
	
	#Mengambil nilai bn dari pers-1 di DB
	$bn		= mysqli_query($conn, "SELECT `ids`,`bn` FROM `tbpag_pers1` WHERE `periode`= ".$_SESSION['periodeag']." ORDER BY `ids` ASC") or die(mysqli_error());
	
	$x=1;
	while($databn = mysqli_fetch_assoc($bn)){
		echo "
			<div class='form-group'>
				<label>Nilai b<sub>$x</sub></label>
				<input type='text' name='bn$x' value='$databn[bn]' readonly='true' />
			</div>
		";
		$x++;
	}
	
	#Mengambil nilai K pada pers-2 di DB
	$K		= mysqli_query($conn, "SELECT ids, K FROM tbpag_pers2 WHERE periode = ".$_SESSION['periodeag']." ORDER BY ids ASC") or die(mysqli_error());
	
	$y=1;
	while($dataK = mysqli_fetch_assoc($K)){
		echo "
			<div class='form-group'>
				<label>Tenaga Kerja Per-Unit Periode Ke-$x</label>
				<input type='text' name='K$y' value='$dataK[K]' readonly='true' />
			</div>
		";
		$y++;
	}
	
	#Mengambil nilai SMA pada pers-3 di DB
	$SMA		= mysqli_query($conn, "SELECT `SMA` FROM `tbperamalan_detail` WHERE `Periode` = ".$_SESSION['periodeag']." ORDER BY `idPeramalan` ASC") or die(mysqli_error());
	
	$z=1;
	while($dataSMA = mysqli_fetch_assoc($SMA)){
		echo "
			<div class='form-group'>
				<label>SMA Periode Ke-$x</label>
				<input type='text' name='SMA$z' value='$dataSMA[SMA]' readonly='true' />
			</div>
		";
		$z++;
	}
	
	echo "<br />";
	echo "<input type='hidden' name='N' value='$N' />";
	echo "<div class='form-actions'>
			<button name='simpan' type='submit' class='btn btn-primary'>Proses</button>
		</div>";
	echo "</form>";
	
	
}

function savepersamaankeempat($conn){
	$N		= $_POST['N'];
	$IDag	= $_POST['IDag'];
	$periodd= $_POST['periodd'];
	$inven	= $_POST['inven'];
	
	$I_adj=0;
	for($j=1; $j<=$N; $j++){
		
		$I = $j-1;
		if($I == 0){
			
			/*
				Jika yang di hitung adalah I ke-0 maka
				tingkat persediaan aktual akhir periode yg dipake
				adalah stok barang yang ada di DB (data terakhir di tabel produk)
			*/
			
			$stok	= $inven;
		}else{
			
			/*
				nilai I_adj sebelumnya
			*/
			
			$qry	= mysqli_query($conn, "SELECT `I_adj` FROM `tbpag_pers4` WHERE `periode` = $periodd ORDER BY `ids` ASC LIMIT $I,1")or die(mysqli_error());
			$stok	= mysqli_fetch_assoc($qry);
		}
		
		/*Mengambil data POST dari b, K, SMA*/
		$b		= $_POST['bn'.$j];
		$K		= $_POST['K'.$j];
		$SMA	= $_POST['SMA'.$j];
		
		#hitung nilai I_adj
		$I_adj	= $b*$K*($SMA-$stok);
		
				
		$ins	= mysqli_query($conn, "INSERT INTO `tbpag_pers4`(`idAgregat`, `I_adj`, `periode`) 
		VALUES ('$IDag', $I_adj,$periodd)") or die(mysqli_error());
	}
	
	echo "
		<div class='alert alert-info alert-dismissible' role='alert'>
		  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
		  <strong>INFO : </strong> Data persamaan I_<sub>adj</sub> sejumlah $j berhasil tersimpan
		  <br />
		</div>
	";
	
}
/*END PERSAMAAN KEEMPAT (MENGHITUNG DEVIASI (SELISIH) ANTARA TINGKAT PERSEDIAAN IDEAL)*/
?>