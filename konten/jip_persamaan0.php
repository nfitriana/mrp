<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Tambah Data Jip</h3>
			</div>
			<div class="panel-body">
				<div class="col-md-12">
						<h2>Mulai Perhitungan JIP</h2>
						<br />
						
						<?php
							$periode = array(
								'Januari'	=>'01',
								'Februari'	=>'02',
								'Maret'		=>'03',
								'April'		=>'04',
								'Mei'		=>'05',
								'Juni'		=>'06',
								'Juli'		=>'07',
								'Agustus'	=>'08',
								'September'	=>'09',
								'Oktober'	=>'10',
								'November'	=>'11',
								'Desember'	=>'12',
								);
						?>
						
						<form method="post" action="" name="start" class="form-inline">
							<div class="form-group">
								<label for="bulan1">Periode Yang Akan Dihitung</label>
								<select class="form-control" name="bulan1" id="bulan1" required>
									<?php
									foreach($periode as $key=>$value){
										echo "<option value='$value'>$key</option>";
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<label for="th1"></label>
								<input type="text" class="form-control" name="th1" id="th1" maxlength="4" required />
							</div>
							
							<div class="form-group">
								<label for="bulan2">s.d</label>
								<select class="form-control" name="bulan2" id="bulan2" required>
									<?php
									foreach($periode as $key=>$value){
										echo "<option value='$value'>$key</option>";
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<label for="th2"></label>
								<input type="text" class="form-control" name="th2" id="th2" maxlength="4" required />
							</div>
							
							<button type="submit" name="mulai" class="btn btn-primary">Mulai Proses</button>
						</form>
						
						<?php
						if(isset($_POST['mulai'])){
							include "controlJip_perssamaan.php";
							saveagkey($conn, $_POST['bulan1'], $_POST['th1'], $_POST['bulan2'], $_POST['th2']);
							#echo $_POST['bulan1'];
							#echo $_POST['bulan2'];
						}
						?>
				</div><!-- col-md-6 -->
			</div><!-- /.panel-body-->
		</div><!-- /.panel panel-default-->
	</div><!-- /.col-->
</div><!-- /.row -->