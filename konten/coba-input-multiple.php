<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">
                            <i class="fa fa-fw fa-user"></i>  Coba Input Multiple
                        </h3>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-user"></i> <a href="">Coba Input Multiple</a>
                            </li>
                            <li class="active">
                                Coba Input Multiple
                            </li>
                        </ol>
                    </div>
        </div>
	</div> 



     <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Coba Input Multiple</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-6">
                                        <form class="form-horizontal" action="" method="post">
                                        <fieldset>
                                            <?php
                                                include "controlMultipleInput.php";
                                                addmultipleinput($conn); 
                                                
                                            ?>

                                            <div class="form-group">
                                                <label class="col-md-4" "control-label" for="makanan">Makanan</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="makanan[]" class="form-control" placeholder="Kode Produk">
                                                </div>
                                                
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4" "control-label" for="makanan">Nama Produk</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="makanan[]" class="form-control" placeholder="Nama Produk">
                                                </div>
                                                
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-4" "control-label" for="makanan">Nama Produk</label>
                                                <div class="col-md-8">
                                                    <input type="text" name="makanan[]" class="form-control" placeholder="Nama Produk">
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

    </div>
</div>