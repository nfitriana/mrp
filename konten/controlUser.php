<?php
	function adduser($conn){
		if(isset($_POST['simpan'])){
			//$ids 	= 	$_POST['id'];
			$nmuser	=	$_POST['nmpengguna'];
			$psswd	=	$_POST['psswd'];
			$repsswd=	$_POST['repsswd'];
			$lvl	=	$_POST['level'];

			if($psswd != $repsswd){
				echo"
				<div class='alert alert-warning'>
					<button type='button' class='close' data-dismiss='alert'></button>
					<strong>Perhatian !</strong> Password tidak sama
				</div>";
			}else{
				$insert = mysqli_query($conn, "INSERT INTO `tbuser`(`nmUser`, `psswd`, `level`) VALUES ('$nmuser', md5('$psswd'), '$lvl')")or die(mysql_error());

			if($insert == true){
				echo "
				<div class='alert alert-success' role='alert'>
					<use xlink:href='#stroked-checkmark'></use> Data Pengguna berhasil ditambahkan. 
				</div>";
			}else{
				echo
				"<div class='alert alert-danger' role='alert'>
					<use xlink:href='#stroked-cancel'></use> Data Pengguna tidak ditambahkan. 
				</div>";
			}
			}

			
		}
	}


	function viewuser($conn){
		$query = mysqli_query($conn, "SELECT * FROM `tbuser` ORDER BY idUser ASC") or die(mysqli_error());
		echo "<table class='table table-striped'> 
				<thead>
						<tr>
							<th> No. </th>
							<th> Nama Pengguna </th>
							<th> Level </th>
							<th> Actions </th>
						</tr>
				</thead>";
		$no = 1;
		while($data = mysqli_fetch_array($query, MYSQLI_ASSOC)){
			echo "
			<tr>
				<td> $no </td>
				<td> $data[nmUser] </td>
				<td> $data[level] </td>
				<td><a href='.?page=detail&content=edit_pengguna&id=$data[idUser]'>
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


	function detailuser($conn, $iduser){
		$query = mysqli_query($conn, "SELECT * FROM tbuser WHERE level <> 'Administrator' AND idUser = $iduser")or die(mysqli_error());
		$detail= mysqli_fetch_row($query);
		return $detail;

		mysqli_free_result($query);
	}


	function editexe($conn, $ids, $nmuser, $psswd, $lvl){
		if(!empty($pass)){
			$withPass = "`psswd` =md5('$pass'),";
		}else{
			$withPass = "";
		}

		$update = mysqli_query($conn,"
			UPDATE tb_user
			SET
				`nmuser` = '$nmuser',
				".$withPass."
				level = '$lvl'
			WHERE id = '$ids'")or die(mysqli_error($conn));

		if($update == true){
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


	function edituser($conn){
		$ids	=	$_POST['id'];
		$nmuser	=	$_POST['nmpengguna'];
		$psswd	=	$_POST['psswd'];
		$repsswd=	$_POST['repsswd'];
		$lvl	=	$_POST['level'];

		if($psswd != $repsswd){
			echo"
			<div class='alert alert-warning'>
				<button type='button' class='close' data-dismiss='alert'></button>
				<strong>PERHATIAN !</strong> Password tidak sama
			</div>";
		}else{
			editexe($conn, $nmuser, $psswd, $repsswd, $lvl);
		}
	}
?>