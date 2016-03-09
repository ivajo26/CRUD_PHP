<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CRUD PHP - Dashboard</title>

<link href="../static/css/bootstrap.min.css" rel="stylesheet">
<link href="../static/css/datepicker3.css" rel="stylesheet">
<link href="../static/css/styles.css" rel="stylesheet">
<link href="../static/css/bootstrap-table.css" rel="stylesheet">

<!--Icons-->
<script src="../static/js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="../static/js/html5shiv.js"></script>
<script src="../static/js/respond.min.js"></script>
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
			</div>

		</div><!-- /.container-fluid -->
	</nav>

  <!-- SIDEBARD -->
  <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<ul class="nav menu">
			<li><a href="../index.php"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
			<li class="parent">
				<a href="#">
					<span data-toggle="collapse" href="#projects"><svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"></use></svg>Proyectos</span>
				</a>
				<ul class="children collapse" id="projects">
					<li>
						<a class="" href="../project/list.php">
							<svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"></use></svg> Listar
						</a>
					</li>
					<li>
						<a class="" href="../project/add.php">
							<svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"></use></svg> Agregar
						</a>
					</li>
				</ul>
			</li>
			<li class="parent active">
				<a href="#">
					<span data-toggle="collapse" href="#authors"><svg class="glyph stroked male user"><use xlink:href="#stroked-male-user"></use></svg>Autores</span>
				</a>
				<ul class="children collapse" id="authors">
					<li>
						<a class="" href="list.php">
							<svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"></use></svg> Listar
						</a>
					</li>
					<li>
						<a class="" href="add.php">
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
						<a class="" href="../adviser/list.php">
							<svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"></use></svg> Listar
						</a>
					</li>
					<li>
						<a class="" href="../adviser/add.php">
							<svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"></use></svg> Agregar
						</a>
					</li>
				</ul>
			</li>
		</ul>

	</div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">


		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Autores</h1>
			</div>
		</div><!--/.row-->

    <div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Advanced Table</div>
					<div class="panel-body">
						<div id="toolbar">
		            <button id="delete" class="btn btn-danger">Borrar</button>
		        </div>

						<table id="table" data-toggle="table"  data-toolbar="#toolbar" data-url="../../controllers/author/list.php"  data-search="true"  data-pagination="true" data-sort-name="first_name" >
							<thead>
						    <tr>
										<th data-field="state" data-checkbox="true"></th>
						        <th data-field="id" data-align="right">Item ID</th>
						        <th data-field="first_name">Nombre</th>
						        <th data-field="last_name">Apellido</th>
						    </tr>
						    </thead>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->

	</div>	<!--/.main-->

	<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="gridSystemModalLabel">Confirmar Borrado</h4>
	      </div>
	      <div class="modal-body">
	          <p>Esta seguro que desea eliminar estos registros</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-danger" id="delete_confirm">Borrar</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<script src="../static/js/jquery-1.11.1.min.js"></script>
	<script src="../static/js/bootstrap.min.js"></script>
	<script src="../static/js_views/author.js"></script>
  <script src="../static/js/bootstrap-table.js"></script>
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
	<script type="text/javascript">
	var $table = $('#table'),
			$delete = $('#delete');
			$(function () {
        $delete.click(function () {
            var ids = $.map($table.bootstrapTable('getSelections'), function (row) {
                return row.id;
            });
						$('#myModal').modal('show');
						$('#delete_confirm').click(function(){
							var jsonString = JSON.stringify(ids);
							console.log(jsonString);
						   $.ajax({
						        type: "POST",
						        url: "../../controllers/author/delete.php",
						        data: {data : jsonString},
						        success: function(data){
						            // console.log(data);
						        }
						    });
							$('#myModal').modal('hide');
							$table.bootstrapTable('remove', {
	                field: 'id',
	                values: ids
	            });
						});
        });
    });
	</script>
</body>

</html>
