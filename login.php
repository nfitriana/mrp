<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login | Sistem Informasi MRP Enida CV</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>
<style type="text/css">
	body{
		background: #ffffff;
		color: #666;
	}

	img.bg {
		display: block;
		min-height: 100%;
		min-width: 1024px;
		width: 100%;
		height: auto;
		position: fixed;
		top: 0;
		left: 0;
		-webkit-filter:blur(5px);
		
	}
	h2{
		color: #ffffff;
		margin-top: 180px;
	}
	h3{
		color: #ffffff;
	}
	.poslogin{
		margin-top: 110px;
	}
	p{
		color: #ffffff;
		text-align: right;
	}
</style>
<body>
	<img src="images/95.jpg" class="bg" alt="" />
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h2>MATERIALS REQUIREMENT PLANNING SYSTEM</h2>
				<hr>
				<h3>Enida CV</h3>
			</div>
			<div class="col-md-4">
				<div class="login-panel panel panel-default poslogin">
					<div class="panel-heading">LOGIN</div>
					<div class="panel-body">
						<form role="form">
							<fieldset>
								<div class="input-group">
								  <span class="input-group-addon glyphicon glyphicon-user" id="sizing-addon2"></span>
								  <input type="text" class="form-control" placeholder="Username" aria-describedby="sizing-addon2">
								</div><br>
								<div class="input-group">
								  <span class="input-group-addon glyphicon glyphicon-lock" id="sizing-addon2"></span>
								  <input type="text" class="form-control" placeholder="Password" aria-describedby="sizing-addon2">
								</div><br>
								<div class="input-group">
									<span class="input-group-addon glyphicon glyphicon-list" id="sizing-addon2"></span>
									<div>
										<select class="form-control" name="level" id="level">
											<option>Level</option>
											<option value="Administrator">Administrator</option>
											<option value="Koordinator Pemesanan">Koordinator Pemesanan</option>
											<option value="Koordinator Gudang">Koordinator Gudang</option>
											<option value="Koordinator Produksi">Koordinator Produksi</option>
										</select>
									</div>
								</div><br>
								<a href="index.html" class="btn btn-warning">Login</a>
							</fieldset>
						</form>
					</div>
				</div>
			</div><!-- col-md-4 -->
		</div><!-- /.row -->
		<div class="row">
			<div class="col-md-12">
				<footer>
					<p>Copyright Fitriana @2016</p>
				</footer>
			</div>
		</div>
	</div><!-- container-fluid -->
		
	
		

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		!function ($) {
			$(document).on("click","ul.nav li.parent > a > span.icon", function(){		  
				$(this).find('em:first').toggleClass("glyphicon-minus");	  
			}); 
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function () {
		  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function () {
		  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>	
</body>

</html>
