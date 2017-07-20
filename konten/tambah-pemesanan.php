<script type="text/javascript">
	$(document).ready(function() {
    $("#tglpesan").datepicker({
        dateFormat : "dd/mm/yy",
        changeMonth : true,
        changeYear : true
    });
  });
</script>

<!-- style untuk loading -->
<style>
    #loading{
        background: whitesmoke;
        position: absolute;
        top: 140px;
        left: 82px;
        padding: 5px 10px;
        border: 1px solid #ccc;
    }
</style>

<script type="text/javascript">
    $(document).ready(function(){
        //menyembunyikan alert vaidasi kosong
        $("#kosong").hide();
    });
</script>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading --> 
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            <i class="fa fa-fw fa-shopping-cart"></i>  Penjualan
                        </h3>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-shopping-cart"></i> <a href="">Penjualan</a>
                            </li>
                            <li class="active">
                                Tambah Data Penjualan
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Tambah Data Penjualan</h3>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-12">
                                    <form class="navbar-form navbar-left" method="post" action="" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <a href="konten/Format.xlsx" class="btn btn-default">
                                                <span class="glyphicon glyphicon-download-alt"></span>
                                                Download Format
                                            </a><br><br>

                                            <input type="file" name="file" class="pull-left">
                                            <button type="submit" name="preview" class="btn btn-success">
                                                Preview
                                            </button><br><br>
                                        </div>

                                    </form>

                                    <hr>
                                    <!-- Buat Preview Data -->
                                    <?php 
                                        include "controlPemesanan.php";
                                        previewdata($conn);
                                        impportdata($conn);
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            
                            <div class="panel-body">
                                
                                <div class="col-md-8">
                                    <form class="form-horizontal" action="" method="post">
                                        <fieldset>
                                        <?php
                                            #memanggil fungsi addpesanan
                                            //include "controlPemesanan.php";
                                            addpesanan($conn);

                                            #membuat no nota otomatis berdasarkan tanggal
                                            $today = date("Ymd");
                                            $query = "SELECT max(kdnota) AS last FROM tbpesanan WHERE kdnota LIKE '$today%'";
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
                                                <label class="col-md-4" "control-label" for="tanggalpesan">Tanggal Beli</label>
                                                <div class="col-md-8">
                                                    <input type="text" id="tglpesan" class="form-control" name="tglpesan" readonly>
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
