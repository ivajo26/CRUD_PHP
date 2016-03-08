<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CRUD PHP - Dashboard</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
  <!-- HEADER -->
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>CRUDPHP</span>Admin</a>
				<!-- <ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> User <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
							<li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
							<li><a href="#"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul> -->
			</div>

		</div><!-- /.container-fluid -->
	</nav>

  <!-- SIDEBARD -->
  <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<ul class="nav menu">
			<li class="active"><a href="index.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li class="parent">
				<a href="#">
					<span data-toggle="collapse" href="#projects"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"></use></svg>Proyectos</span>
				</a>
				<ul class="children collapse" id="projects">
					<li>
						<a class="" href="project_list.php">
							<svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"></use></svg> Listar
						</a>
					</li>
					<li>
						<a class="" href="project_add.php">
							<svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"></use></svg> Agregar
						</a>
					</li>
				</ul>
			</li>
			<li class="parent">
				<a href="#">
					<span data-toggle="collapse" href="#authors"><svg class="glyph stroked male user"><use xlink:href="#stroked-male-user"></use></svg>Autores</span>
				</a>
				<ul class="children collapse" id="authors">
					<li>
						<a class="" href="author_add.php">
							<svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"></use></svg> Listar
						</a>
					</li>
					<li>
						<a class="" href="author_add.php">
							<svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"></use></svg> Agregar
						</a>
					</li>
				</ul>
			</li>
			<li class="parent">
				<a href="#">
					<span data-toggle="collapse" href="#adviser"><svg class="glyph stroked male user"><use xlink:href="#stroked-male-user"></use></svg>Asesores</span>
				</a>
				<ul class="children collapse" id="adviser">
					<li>
						<a class="" href="adviser_list.php">
							<svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"></use></svg> Listar
						</a>
					</li>
					<li>
						<a class="" href="adviser_add.php">
							<svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"></use></svg> Agregar
						</a>
					</li>
				</ul>
			</li>
		</ul>

	</div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<!-- <div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Icons</li>
			</ol>
		</div> -->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Agregar Autor</h1>
			</div>
		</div><!--/.row-->

    <div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Informacion Personal</div>
					<div class="panel-body">
						<div class="col-md-12">
							<form class="form-inline">
								<div class="form-group">
									<label>Nombre</label>
									<input class="form-control" placeholder="Nombre" type="text" name="first_name" id="first_name">
								</div>

                <div class="form-group">
									<label>Apellido</label>
									<input class="form-control" placeholder="Apellido" type="text" name="last_name" id="last_name">
								</div>

								<button type="submit" class="btn btn-primary">Agregar</button>
							</div>
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->

	</div>	<!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({
		});

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
