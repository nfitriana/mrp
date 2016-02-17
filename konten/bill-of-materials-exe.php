<?php
	function pilihdatabahan($conn){
		$query=mysqli_query($conn,"SELECT * FROM `tb_inventori` ORDER BY kdbahan ASC")or die(mysqli_error());
		echo "<table class='table table-striped'> 
				<thead>
						<tr>
							<th> No. </th>
							<th> Kode Bahan </th>
							<th> Nama Bahan </th>
							<th> Jumlah </th>
							<th> Satuan </th>
							<th> Tingkat </th>
							<th> Action </th>
						</tr>
				</thead>";

				$no = 1;
				while($data = mysqli_fetch_array($query, MYSQLI_ASSOC)){
				echo "
				<tr class='dataku'>
					<td> $no </td>
					<td> $data[kdbahan] </td>
					<td> $data[nmbahan] </td>
					<td> $data[jml] </td>
					<td> $data[satuan] </td>
					<td> $data[tingkat] </td>
					<td><a href='.?page=detail&content=bom&id=$data[kdbahan]'>
						<button type='button' class='btn btn-default btn-sm'>
  							<span class='glyphicon glyphicon-ok' aria-hidden='true'></span> Pilih
						</button>
						</a>
					</td>
				</tr>";
				$no++;
			}
				echo "</table>";
				mysqli_free_result($query);

	}


	function detailbahan($conn, $kdbahan){
		$query = mysqli_query($conn, "SELECT * FROM tb_inventori WHERE kdbahan = $kdbahan")or die(mysqli_error());
		$detail= mysqli_fetch_row($query);
		return $detail;

		mysqli_free_result($query);
	}

?>