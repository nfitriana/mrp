<?php
function addforecast($conn){

	#menampilkan jumlah data permintaan pada tiap bulannya, data di limit sebanyak 6
	$query = mysqli_query($conn, "SELECT sum(jml) as jmlpesan, date_format(tglpesan, '%M %Y') as bulanpesan
				FROM `tbpesanan` group by date_format(tglpesan, '%M %Y') order by tglpesan asc limit 0,7") or die(mysqli_error());
	
	$n=1;
	 while($rows = mysqli_fetch_array($query)){
        echo "
			
			<div class='row'>
			<div class='col-md-6'>
				<div class='form-group'>
				    <label class='col-md-4' 'control-label' for='bulanke$n'>Bulan Ke-$n</label>
				    <div class='col-md-6'>
				        <input type='text' class='form-control' name='bulanke$n' value='$rows[0]' readonly='true'>
				    </div>
				    
				</div>
			</div>
			<div class='col-md-6'>
				<div class='form-group'>
				    <label class='col-md-4' 'control-label' for='permintaanke$n'>Permintaan Ke-$n</label>
				    <div class='col-md-6'>
				        <input type='text' class='form-control' name='permintaanke$n' value='$rows[1]' readonly='true'>
				    </div>
				    
				</div>
			</div>
			</div>
        ";

        $n++;
    }
}

function viewforecast($conn){
		#$query = mysqli_query($conn, "SELECT * FROM `tbperamalan` ORDER BY idperamalan ASC") or die(mysqli_error());
		
		$bulan = array(
				'Januari' => '01', 'Februari' => '02', 'Maret' => '03',
				'April' => '04', 'Mei' => '05', 'Juni' => '06',
				'Juli' => '07', 'Agustus' => '08', 'September' => '09',
				'Oktober' => '10', 'November' => '11', 'Desember' => '12'
			);
		echo"
		<form name='cari'class='form-inline' method='post' action=''>
			<div class='form-group'>
				<label class='col-md-4' 'control-label' for='kodeforecast'>Periode</label>
				<div class='col-md-4'>
					
					<select name='periode1' class='form-control' required>
						<option value=''>- Pilih Bulan -</option>";
				foreach($bulan as $key=>$value){
					echo "<option value='$value'>$key</option>";
				}
		echo "
					</select>
				</div>                                   
			</div>
			<label> sampai </label>
			<div class='form-group'>
				<div class='col-md-4'>
					<select name='periode2' class='form-control' required>
						<option value=''>- Pilih Bulan -</option>";
				foreach($bulan as $key=>$value){
					echo "<option value='$value'>$key</option>";
				}
		echo "
					</select>
				</div>                                   
			</div>
			<div class='form-group'>
				<div class='col-md-4'>
					<input type='text' maxlength='4' name='tahun' placeholder=' Masukkan Tahun Periode' required />
				</div>                                   
			</div>
			<button name='cari' type='submit' class='btn btn-primary'>Cari</button>
		</form>	
		<hr />
		";
	if(isset($_POST['cari'])){
		$bln1	= $_POST['periode1'];
		$bln2	= $_POST['periode2'];
		$thn	= $_POST['tahun'];
		
		if($bln1 >= $bln2){
			echo "
				<div class='alert alert-warning alert-dismissible' role='alert'>
				  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				  <strong>Warning!</strong> Kesalahan dalam pemilihan periode bulan.
				</div>
			";
		}else{
			#echo "$bln1, $bln2, $thn";
			
			$qry	= mysqli_query($conn, "SELECT `idforecast` FROM `tbperamalan` order by idforecast asc") or die(mysqli_error());
			$jml	= mysqli_num_rows($qry);
			
			#create id
			if($jml == 0){
				$periodd = $jml+1;
				$idforecast = "IDFRC".date('dmY')."0000001";
			}else{
				if(strlen($jml) == 1){
					$n = $jml+1;
					$periodd = $jml+1;
					$idforecast = "IDFRC".date('dmY')."000000$n";
				}else if(strlen($jml) == 2){
					$n = $jml+1;
					$periodd = $jml+1;
					$idforecast = "IDFRC".date('dmY')."00000$n";
				}else if(strlen($jml) == 3){
					$n = $jml+1;
					$periodd = $jml+1;
					$idforecast = "IDFRC".date('dmY')."0000$n";
				}else if(strlen($jml) == 4){
					$n = $jml+1;
					$periodd = $jml+1;
					$idforecast = "IDFRC".date('dmY')."000$n";
				}else if(strlen($jml) == 5){
					$n = $jml+1;
					$periodd = $jml+1;
					$idforecast = "IDFRC".date('dmY')."00$n";
				}else if(strlen($jml) == 6){
					$n = $jml+1;
					$periodd = $jml+1;
					$idforecast = "IDFRC".date('dmY')."0$n";
				}else if(strlen($jml) == 7){
					$n = $jml+1;
					$periodd = $jml+1;
					$idforecast = "IDFRC".date('dmY')."$n";
				}
			}
			
			$pesanan = mysqli_query($conn, "SELECT sum(jml) as jmlpesan, date_format(tglpesan, '%M %Y') as bulanpesan, tglpesan
					FROM `tbpesanan` WHERE proses = '0' AND tglpesan BETWEEN '$thn-$bln1-01' AND '$thn-$bln2-31' group by date_format(tglpesan, '%M %Y') order by tglpesan asc limit 0,7") or die(mysqli_error());
			$allpesanan = mysqli_num_rows($pesanan);
			
			if($allpesanan >= 1)
			{
				$query = mysqli_query($conn, "SELECT sum(jml) as jmlpesan, date_format(tglpesan, '%M %Y') as bulanpesan, tglpesan
					FROM `tbpesanan` WHERE proses = '0' AND tglpesan BETWEEN '$thn-$bln1-01' AND '$thn-$bln2-31' group by date_format(tglpesan, '%M %Y') order by tglpesan asc limit 0,7") or die(mysqli_error());
				$query2 = mysqli_query($conn, "SELECT sum(jml) as jmlpesan, date_format(tglpesan, '%M %Y') as bulanpesan, tglpesan
						FROM `tbpesanan` WHERE proses = '0' AND tglpesan BETWEEN '$thn-$bln1-01' AND '$thn-$bln2-31' group by date_format(tglpesan, '%M %Y') order by tglpesan asc limit 0,7") or die(mysqli_error());
				
				echo "
				<form name='simpanforecast' method='post' action=''>
				<div class='form-group'>
					<div class='col-md-4'>
						<label>ID FORECAST</label>
						<input class='form-control' type='text' name='idforecast' value='$idforecast' readonly='true' />
					</div>
				</div>
				<div class='form-group'>
					<div class='col-md-6'>
						<label>Keterengan</label>
						<input class='form-control' type='text' name='keterangan' value='' maxlength='50' required/>
					</div> 
				</div>
				<div class='form-group'>
					<div class='col-md-2'>
						<label>Periode Ke</label>
						<input class='form-control' type='text' name='periodd' value='$periodd' readonly='true' />
					</div> 
				</div>
				
				
				<table class='table table-striped'> 
						<thead>
								<tr>
									<th> T </th>
									<th> Bulan 1 </th>
									<th> Bulan 2 </th>
									<th> Bulan 3 </th>
									<th> Bulan 4 </th>
									<th> Bulan 5 </th>
									<th> Bulan 6 </th>
								</tr>
							</thead>";
				
					echo "
					<tbody>
					<tr>
						<td > Y </td>";
					
					 while($rows = mysqli_fetch_array($query)){
							echo "
								<td>
								$rows[0]
								
								</td>
							";
							
						}
						
					echo "</tr>";

					echo "<tr>
						<td > &nbsp; </td>";
						$d=0;
					 while($rows = mysqli_fetch_array($query2)){
							echo "
								<td>
								$rows[1]
								<input type='hidden' name='blnperiode$d' value='$rows[2]' />
								</td>
							";
							$d++;
						}

						
					echo "</tr>";

					echo "
						</tbody>
						</table>";
					mysqli_free_result($query);




				$query3 = mysqli_query($conn, "SELECT sum(jml) as jmlpesan
						FROM `tbpesanan` WHERE proses = '0' AND tglpesan BETWEEN '$thn-$bln1-01' AND '$thn-$bln2-31' group by date_format(tglpesan, '%M %Y') order by tglpesan asc limit 0,7") or die(mysqli_error());

				echo "<!--Hasil perhitungan forecast -->";
				echo "<label class='col-md-4' 'control-label'>Hasil Forecast Permintaan Produk</label>";
				echo "<table class='table table-striped'> 
						<thead>
								<tr>
									<th> t </th>
									<th> Y(t) </th>
									<th> Y't </th>
									<th> et </th>
									<th> e(t)^ = Y(t) - T'(t)^ </th>
								</tr>
							</thead>";
				
					echo "<tbody>";

					/*
					menyimpan jumlah permintaan perbulannya kedalam multidimensional array, 
					agar di ketahui nomor array / index arraynya
					*/
					
					$a=array();
					while($rows = mysqli_fetch_assoc($query3)){
						array_push($a, $rows);
					}
					
					#print_r($a);
					
					#echo $a[0]['jmlpesan'];
					#echo $a[1]['jmlpesan'];

					$x=0;
					$sma=0;
					$et=0; #forecasterror
					$kesalahankuadrat=0;
					$sse=0;
					$mse=0;

					while($x<6){

						echo "
						<tr>
							<td>"; echo $x+1; echo "</td>
							<td>"; echo $a[$x]['jmlpesan']; echo "</td>
							<td>"; 
							if($x == 0){
								$sma = 0;
								echo "<input class='col-md-5' type='text' name='sma$x' value='$sma' readonly='true'/>";
							}else{
								$yy	= $x-1;

								$sma = ($a[$yy]['jmlpesan'] + $a[$x]['jmlpesan'])/2;
								echo "<input class='col-md-5' type='text' name='sma$x' value='$sma' readonly='true'/>";
							}

							echo "</td>
							<td>";
								if($x == 0){
									$et = $a[0]['jmlpesan'];
									echo "<input class='col-md-5' type='text' name='et$x' value='$et' readonly='true'/>";
								}else{
									$yy	= $x-1;

									#$et = $a[$x]['jmlpesan'] - (($a[$yy]['jmlpesan'] + $a[$x]['jmlpesan'])/2);
									$et = $a[$x]['jmlpesan'] - $sma;
									echo "<input class='col-md-5' type='text' name='et$x' value='$et' readonly='true'/>";
								}

							echo "</td>
							<td>";
								if($x == 0){
									$kesalahankuadrat = $a[0]['jmlpesan']*$a[0]['jmlpesan'];
									echo "<input class='col-md-5' type='text' name='kesalahankuadrat$x' value='$kesalahankuadrat' readonly='true'/>";	
								}else{
									$yy	= $x-1;

									#$kesalahankuadrat = ($a[$x]['jmlpesan'] - (($a[$yy]['jmlpesan'] + $a[$x]['jmlpesan'])/2)) * ($a[$x]['jmlpesan'] - (($a[$yy]['jmlpesan'] + $a[$x]['jmlpesan'])/2));
									$kesalahankuadrat = $et*$et;
									echo "<input class='col-md-5' type='text' name='kesalahankuadrat$x' value='$kesalahankuadrat' readonly='true'/>";
								}
									
							echo "</td>
						</tr>";
						$x++;

						$sse = $sse+$kesalahankuadrat;
					}
				
					echo "<tr>
						<td colspan='3'>&nbsp;</td>
						<td><strong>SSE</strong></td>
						<td>";
						#echo number_format($sse,'0',',','');
						echo "<input class='col-md-5' type='text' name='sse' value='".number_format($sse,'0',',','')."' readonly='true'/>";
						echo "</td>
					</tr>";

					echo "<tr>
						<td colspan='3'>&nbsp;</td>
						<td><strong>MSE</strong></td>
						<td>";
						$mse = $sse/6;

						#echo number_format($mse,'0',',','');
						echo "<input class='col-md-5' type='text' name='mse' value='".number_format($mse,'0',',','')."' readonly='true'/>";
						echo "</td>
					</tr>";

					echo "
					</tbody>
					</table>
					<br />
					<input type='submit' name='simpanforecast' class='btn btn-primary' value='Simpan' />
					</form>
					";
				
			}else{
				echo "
				<div class='alert alert-warning alert-dismissible' role='alert'>
				  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				  <strong>Warning!</strong> Pesanan tidak tersedia.
				</div>
			";
			}
		}
	}
	
}

function simpanforecast($conn){
	
	#simpan forecast
	
	if(isset($_POST['simpanforecast'])){
		$idfc	= $_POST['idforecast'];
		$ket	= $_POST['keterangan'];
		$sse	= $_POST['sse'];
		$mse	= $_POST['mse'];
		
		$addforecast = mysqli_query($conn, "INSERT INTO `tbperamalan`(`idforecast`, `sse`, `mse`, `keterangan`) 
		VALUES ('$idfc', $sse, $mse, '$ket')") or die(mysqli_error());
		
		#simpan ke peramalan detail
		
		$a=array();
				
		$x=0;
		while($x<6){
			$idforecast = $idfc;
			$periodd	= $_POST['periodd'];
			$blnperiode	= $_POST['blnperiode'.$x];
			$sma		= $_POST['sma'.$x];
			$fe			= $_POST['et'.$x];
			$kk			= $_POST['kesalahankuadrat'.$x];
			
			array_push($a, $blnperiode);
			
			$adddetailforecast = mysqli_query($conn, "INSERT INTO `tbperamalan_detail`(`idforecast`, `Periode`, `Bulan`, `SMA`, `ForecastError`, `KesalahanKuadrat`) 
			VALUES ('$idforecast', '$periodd', '$blnperiode', $sma, $fe, $kk)") or die(mysqli_error());
			
			$x++;
		}
		
		if($addforecast){
			echo "
				<div class='alert alert-success alert-dismissible' role='alert'>
				  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
				  <strong>Success!</strong> Peramalan berhasil ditambahkan.
				</div>
			";
			
			#update status proses di permintaan
			#print_r($a);
			$blnawal 	= date('Y-m', strtotime($a[0]))."-01";
			$blnakhir	= date('Y-m', strtotime($a[5]))."-31";
			
			mysqli_query($conn, "UPDATE `tbpesanan` SET `proses`='1' WHERE `tglpesan` BETWEEN '$blnawal' AND '$blnakhir'")or die(mysqli_error());
		}
	}
}
?>