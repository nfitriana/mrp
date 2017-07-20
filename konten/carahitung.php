<?php
	/*
	Studi kasus diperusahaan garmen X  pada Okt 2013 diminta untuk produksi 2000 baju
	hitung jumlah tenaga kerja & jml produksi dengan peramalan N = 3
	*/
	
	

	$N=3; #jika ambil dari database maka N jadi batas row yg di tampilkan (LIMIT)
	$blnlampau	= array('september' => 1210, 'agustus' => 1235, 'juli' => 1100);

	/*fak. bobot alpha, C, B, & A*/
	$param 	= array(0,0.25, 0.75, 0.85, 1);

	
	
	$parameter = rand(0, 10)/10;

	#echo $parameter;

	/*for($x=1; $x<=$N; $x++){
		echo $blnlampau[$x-1]."<br />";
	*/

	$jmlbn=array();

	for($n=1; $n<=$N; $n++){
		#sigma
		$sigman=0;
		for($s=1; $s<=$N; $s++){
			$sigman = $sigman+pow($parameter, $s);
		}

		/*
			Mengitung bn 

		*/

		$bn[$n] = pow($parameter, $n)/ $sigman; #pow($var, $pangkat) = fungsi pangkat

		echo "sigma ke-$n : $sigman <br />";
		array_push($jmlbn, $bn[$n]); /*menyimpan data yg diulang kedalam bentuk array*/
	}

	$sigmaforW=0;
	for($lihat=0; $lihat<$N; $lihat++){
		echo "parameter yang digunakan : $parameter <br />";
		echo "bn";
		echo $lihat+1;
		echo " : ".number_format($jmlbn[$lihat], 2)."<br />";


		$sigmaforW = $sigmaforW+number_format($jmlbn[$lihat], 2);
	}

	/*Nyari W* => Jumlah pekerja */
	$K = 1;
	foreach($blnlampau as $month=>$value){
		#echo "bulan $month = $value <br />";
		echo "<br /> Hitung W* <br /> <br />";

		echo "$month : ";
		echo $sigmaforW*$K*$value;
		echo "<br />";
			
	}

	
?>