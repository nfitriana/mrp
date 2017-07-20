<script type="text/javascript">
	$(document).ready(function() {
    $("#tglterimainv").datepicker({
        dateFormat : "dd/mm/yy",
        changeMonth : true,
        changeYear : true
    });
  });
</script>
<div id="page-wrapper">
	<div class="container-fluid">
		 <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            <i class="fa fa-fw fa-inbox"></i>  Edit Inventori Produk
                        </h3>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-inbox"></i> <a href="">Edit Produk</a>
                            </li>
                            <li class="active">
                                Edit Data Inventori
                            </li>
                        </ol>
                    </div>
                </div>


         <div class="row">
         	<div class="col-lg-12">
         		<div class="panel panel-default">
         			<div class="panel-heading">
                         <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Edit Data Inventori</h3>
                    </div>
                    <div class="panel-body">
                    	<div class="col-md-8">
                    		<form class="form-horizontal" action="" method="post">
							<fieldset>
							<?php
								include "controlInventori.php";

								if(isset($_GET['id'])){
									$idinv = $_GET['id'];
									$detailinv = detailinventori($conn, $idinv);
								}
								
								if(isset($_POST['ubah'])){
									$kdproduk = $_POST['kdproduk'];
									$nmproduk = $_POST['nmproduk'];
									$jml 	  = $_POST['jml'];
									$satuan   = $_POST['satuan'];

									function ubahformatTgl($tanggal){
										$pisah = explode('/',$tanggal);
										$urutan= array($pisah[2],$pisah[1],$pisah[0]);
										$satukan= implode('-', $urutan);
										return $satukan;
									}

										$tglterima = $_POST['tglterima'];
										//menggunakan function ubahFormatTgl
										$ubhtglterima = ubahformatTgl($tglterima);

									//memanggil function editinventori
									editinventori($conn, $kdproduk, $nmproduk, $jml, $satukan, $ubhtglterima);
								}

							?>
								<div class="form-group">
									<label class="col-md-4" "control-label" for="kodeproduk">Kode Produk</label>
									<div class="col-md-8">
										<input type="text" class="form-control" name="kdproduk" value="<?php echo $detailinv[0]; ?>" readonly>
									</div>
									
								</div>
								
								<div class="form-group">
									<label class="col-md-4" "control-label" for="namabahan">Nama Produk</label>
									<div class="col-md-8">
										<input type="text" class="form-control" name="nmproduk" value="<?php echo $detailinv[1]; ?>">
									</div>
									
								</div>

								<div class="form-group">
									<label class="col-md-4" "control-label" for="jumlah">Jumlah</label>
									<div class="col-md-8">
										<input type="text" class="form-control" name="jml" value="<?php echo $detailinv[2]; ?>">
									</div>
									
								</div>

								<div class="form-group">
									<label class="col-md-4" "control-label" for="satuan">Satuan</label>
									<div class="col-md-8">
										<input type="text" class="form-control" name="satuan" value="<?php echo $detailinv[3]; ?>">
									</div>
									
								</div>

								<div class="form-group">
									<label class="col-md-4" "control-label" for="tglditerima">Tanggal Diterima</label>
									<div class="col-md-8">
										<input type="text" name="tglterima" class="form-control" id="tglterimainv" value="<?php echo $detailinv[4]; ?>" readonly>
									</div>
								</div>

								<div class="form-actions">
									<button name="ubah" type="submit" class="btn btn-primary">Ubah</button>
									<button name="batal" type="reset" class="btn">Batal</button>
								</div>

							</fieldset>	
							</form>
                    	</div>
                    </div>
         		</div>
         	</div>
         </div>
	</div>
</div>
 
	