<?php
	function adduser($conn){
		if(isset($_POST['simpan'])){
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
				$insert = mysqli_query($conn, "INSERT INTO `tb_user`(`nmuser`, `psswd`, `level`) VALUES ('$nmuser', md5('$psswd'), '$lvl')")or die(mysql_error());

			if($insert == true){
				echo "
				<div class='alert alert-success' role='alert'>
					<svg class='glyph stroked checkmark'><use xlink:href='#stroked-checkmark'></use></svg> Data Pengguna berhasil ditambahkan. 
				</div>";
			}else{
				echo
				"<div class='alert alert-danger' role='alert'>
					<svg class='glyph stroked checkmark'><use xlink:href='#stroked-cancel'></use></svg> Data Pengguna tidak ditambahkan. 
				</div>";
			}
			}

			
		}
	}


	function viewuser($conn){
		$query = mysqli_query($conn, "SELECT * FROM `tb_user` WHERE level <> 'Administrator' ORDER BY id ASC") or die(mysqli_error());
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
				<td> $data[nmuser] </td>
				<td> $data[level] </td>
				<td><a href='.?page=detail&content=edit_pengguna&id=$data[id]'>
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
		$query = mysqli_query($conn, "SELECT * FROM tb_user WHERE level <> 'Administrator' AND id = $iduser")or die(mysqli_error());
		$detail= mysqli_fetch_row($query);
		return $detail;

		mysqli_free_result($query);
	}


	function editexe($conn, $ids, $uname, $pass, $lvl){
		if(!empty($pass)){
			$withPass = "`password` =md5('$pass'),";
		}else{
			$withPass = "";
		}

		$update = mysqli_query($conn,"
			UPDATE tb_user
			SET
				`nmuser` = '$uname',
				".$withPass."
				level = '$lvl'
			WHERE id = $ids")or die(mysqli_error());

		if($update == true){
			header("location:?page=detail&content=daftar_user&edit=success");
		}else{
			echo "
			<div class='alert alert-danger'>
				<button type='button' class='close' data-dismiss='alert'>
				<strong>ERROR !</strong> Data tidak dapat disimpan
			</div>";
		}
	}


	function edituser($conn){
		$iduser	=	$_POST['id'];
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