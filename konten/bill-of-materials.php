<?php
	include "bill-of-materials-exe.php";
?>
<script type="text/javascript">
	$( document ).ready(function() {
		$('.dataku').click(function(){
			var data = $(this).data('ku').split('|');
			$("#dataku-kdbahan").val(data[0]);
			$("#dataku-nmbahan").val(data[1]);
			$("#dataku-satuan").val(data[2])
			return false;
		});
	});
</script>


<div class="page-wrapper">
	<div class="container-fluid">
		<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            <i class="fa fa-fw fa-user"></i>  Bill of Materials
                        </h3>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-user"></i> <a href="">Bill of Materials</a>
                            </li>
                            <li class="active">
                                Tambah Data BOM
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->


                <div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
			                    <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Tambah Data BOM</h3>
			                </div>
							<div class="panel-body">
								<div class="col-md-6">
									<form class="form-horizontal" action="" method="post">
									<fieldset>
										<?php
											#membuat no nota otomatis berdasarkan tanggal
											$today = date("Ymd");
											$query = "SELECT max(kodebom) AS last FROM tb_bom WHERE kodebom LIKE '$today%'";
											$hasil = mysqli_query($conn, $query);
											$data  = mysqli_fetch_array($hasil);
											$lastNoNota = $data['last'];

											//baca no urut nota dr kd nota terakhir
											$lastNoUrut = substr($lastNoNota, 8,4);
											
											//no urut ditambah 1
											$nextNoUrut = $lastNoUrut + 1;

											$nextNoNota = $today.sprintf('%04s', $nextNoUrut);


											//include "bill-of-materials-exe.php";

											if(isset($_GET['id']) && !empty($_GET['id'])){
												$kdbahan = $_GET['id'];
												$detail = detailuser($conn, $kdbahan);
											}
										?>
										<div class="form-group">
											<label class="col-md-4" "control-label" for="kodebom">Kode BOM</label>
											<div class="col-md-8">
												<input type="text" name="kdbom" class="form-control" value="<?php echo "$nextNoNota" ?>" readonly>
											</div>
											
										</div>
										
										<div class="form-group">
											<label class="col-md-4" "control-label" for="kodebahan">Kode Bahan</label>
											<div class="col-md-4">
												<input type="text" name="kdbahan" id="dataku-kdbahan" class="form-control">
											</div>
											<div class="col-md-4">
												<!-- Button trigger modal -->
												<button name="simpan" type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Pilih Data Bahan</button>	
											</div>

												<!-- Modal -->
												<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
												  <div class="modal-dialog modal-dialog modal-lg" role="document">
												    <div class="modal-content">
												      <div class="modal-header">
												        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												        <h4 class="modal-title" id="myModalLabel">Pilih Bahan Baku</h4>
												      </div>
												      <div class="modal-body">
												        <?php
												        	
												        	pilihdatabahan($conn);
												        ?>
												      </div>
												      <div class="modal-footer">
												        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
												        
												      </div>
												    </div>
												  </div>
												</div>
										</div>

										<div class="form-group">
											<label class="col-md-4" "control-label" for="namabahan">Nama Bahan</label>
											<div class="col-md-8">
												<input type="text" name="nmbahan" id="dataku-nmbahan" class="form-control">
											</div>
											
										</div>

										<div class="form-group">
											<label class="col-md-4" "control-label" for="satuan">Satuan Bahan Baku</label>
											<div class="col-md-8">
												<input type="text" name="satuan" id="dataku-satuan" class="form-control">
											</div>
											
										</div>

										<div class="form-group">
											<label class="col-md-4" "control-label" for="sumberproduk">Sumber Produk</label>
											<div class="col-md-4">
												<input type="text" name="sumberproduk" class="form-control">
											</div>
											<div class="col-md-4">
												<button name="simpan" type="submit" class="btn btn-default">Bahan Baku</button>
											</div>
										</div>

										<div class="form-group">
											<label class="col-md-4" "control-label" for="kuantitas">Kuantitas</label>
											<div class="col-md-8">
												<input type="text" name="kuantitas" class="form-control">
											</div>
											
										</div>

										<div class="form-group">
											<label class="col-md-4" "control-label" for="identifikasi">Identifikasi</label>
											<div class="col-md-8">
												<select class="form-control" name="identifikasi" id="identifikasi">
													<option value="A">A</option>
													<option value="B">B</option>
													<option value="C">C</option>
													<option value="D">D</option>
												</select>
											</div>
											
										</div>

										<div class="form-group">
											<label class="col-md-4" "control-label" for="tingkatan">Tingkatan</label>
											<div class="col-md-8">
												<select class="form-control" name="tingkatan" id="tingkatan">
													<option value="0">0</option>
													<option value="1">1</option>
													<option value="2">2</option>
												</select>
											</div>
											
										</div>

										<div class="form-actions">
											<button name="simpan" type="submit" class="btn btn-primary">Simpan</button>
											<button name="batal" type="reset" class="btn">Batal</button>
										</div>

									</fieldset>									
									</form>
								</div><!-- col-md-6 -->
							</div><!-- /.panel-body-->
						</div><!-- /.panel panel-default-->
					</div><!-- /.col-->
				</div><!-- /.row -->
	</div><!-- container -->
</div><!-- /.page wrapper -->


	
