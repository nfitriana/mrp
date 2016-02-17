<script type="text/javascript">
	$(function() {
    $( "#tglpesan" ).datepicker();
  });

	$(function() {
    $( "#tglambil" ).datepicker();
  });
</script>




        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            <i class="fa fa-fw fa-shopping-cart"></i>  Pemesanan
                        </h3>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-shopping-cart"></i> <a href="">Pemesanan</a>
                            </li>
                            <li class="active">
                                Tambah Data Pemesanan
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Tambah Data Pemesanan</h3>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-8">
                                    <form class="form-horizontal" action="" method="post">
                                        <fieldset>
                                        <?php
                                            #memanggil fungsi addpesanan
                                            include "tambah-pemesanan-exe.php";
                                            addpesanan($conn);

                                            #membuat no nota otomatis berdasarkan tanggal
                                            $today = date("Ymd");
                                            $query = "SELECT max(kdnota) AS last FROM tb_pesanan WHERE kdnota LIKE '$today%'";
                                            $hasil = mysqli_query($conn, $query);
                                            $data  = mysqli_fetch_array($hasil);
                                            $lastNoNota = $data['last'];

                                            //baca no urut nota dr kd nota terakhir
                                            $lastNoUrut = substr($lastNoNota, 8,4);
                                            
                                            //no urut ditambah 1
                                            $nextNoUrut = $lastNoUrut + 1;

                                            $nextNoNota = $today.sprintf('%04s', $nextNoUrut);

                                        ?>
                                            <div class="form-group">
                                                <label class="col-md-4" "control-label" for="kodenota">Kode Nota</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="kdnota" value="<?php echo "$nextNoNota"; ?>" readonly>
                                                </div>
                                                
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-4" "control-label" for="nmpelanggan">Nama Pelanggan</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="nmpelanggan">
                                                </div>
                                                
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4" "control-label" for="alamat">Alamat Pelanggan</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="alamat">
                                                </div>
                                                
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4" "control-label" for="produk">Produk</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="produk">
                                                </div>
                                                
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4" "control-label" for="jumlah">Jumlah</label>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="jml">
                                                </div>
                                                
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4" "control-label" for="tanggalpesan">Tanggal Pesan</label>
                                                <div class="col-md-8">
                                                    <input type="text" id="tglpesan" class="form-control" name="tglpesan" readonly>
                                                </div>
                                                
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4" "control-label" for="tglambil">Tanggal Ambil</label>
                                                <div class="col-md-8">
                                                    <input type="text" id="tglambil" class="form-control" name="tglambil" readonly>
                                                </div>
                                                
                                            </div>

                                            <div class="form-actions">
                                                <button name="simpan" type="submit" class="btn btn-primary">Simpan</button>
                                                <button name="batal" type="reset" class="btn">Batal</button>
                                            </div>

                                        </fieldset>
                                    </form>
                                </div><!-- col-md-8 -->
                            </div><!-- panel-body -->
                        </div><!-- panel default -->
                    </div><!-- col-lg-12 -->
                </div><!-- row --> 

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
