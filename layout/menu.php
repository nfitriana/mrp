<!DOCTYPE html>
<html lang="en">

<head> 

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Informasi MRP</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">SISTEM INFORMASI PERENCANAAN BAHAN BAKU PRODUKSI CV. ENIDA</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li>
                    <a href="#"><i class="fa fa-fw fa-power-off"></i> Logout <b class="caret"></b></a>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="<?php echo PATH;?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#pemesanan"><i class="fa fa-fw fa-shopping-cart"></i> Penjualan <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="pemesanan" class="collapse">
                            <li>
                                <a href=".?page=detail&content=purchase_order">Tambah Data Penjualan</a>
                            </li>
                            <li>
                                <a href=".?page=detail&content=daftar_purchase_order">Laporan Penjualan</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#forecast"><i class="fa fa-fw fa-shopping-cart"></i> Forecast <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="forecast" class="collapse">
                            <li>
                                <a href=".?page=detail&content=lap_forecast">Forcast Permintaan Produk</a>
                            </li>
                            <!--<li>
                                <a href=".?page=detail&content=lap_forecast">Laporan Forecast</a>
                            </li>-->
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#inventori"><i class="fa fa-fw fa-inbox"></i> Inventori <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="inventori" class="collapse">
                            <li>
                                <a href=".?page=detail&content=data_produk">Data Produk</a>
                            </li>
                            <li>
                                <a href=".?page=detail&content=data_komponen">Data Komponen</a>
                            </li>
                            <li>
                                <a href=".?page=detail&content=data_bhnbaku">Data Bahan Baku</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#bom"><i class="fa fa-fw fa-th"></i> Bill of Materials <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="bom" class="collapse">
                            <li>
                                <a href=".?page=detail&content=detail_komponen">Komponen</a>
                            </li>
                            <li>
                                <a href=".?page=detail&content=add_jmlbhnbaku">Bahan Baku</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#jip"><i class="fa fa-fw fa-list-alt"></i> Jadwal Induk Produksi <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="jip" class="collapse">
                            <li>
                                <a href=".?page=detail&content=jip">Tambah Data JIP</a>
                            </li>
                            <li>
                                <a href="#">Laporan JIP</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#mrp"><i class="fa fa-fw fa-calendar"></i> Perhitungan MRP <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="mrp" class="collapse">
                            <li>
                                <a href="#">Perhitungan MRP</a>
                            </li>
                            <li>
                                <a href="#">Laporan MRP</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#pengguna"><i class="fa fa-fw fa-user"></i> Data User <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="pengguna" class="collapse">
                            <li>
                                <a href=".?page=detail&content=tambah_user">Tambah Data Pengguna</a>
                            </li>
                            <li>
                                <a href=".?page=detail&content=daftar_user">Daftar Pengguna</a>
                            </li>
                        </ul>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
