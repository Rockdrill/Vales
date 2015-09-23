								<!DOCTYPE html>
								<html lang                               ="eS">
								<head>
								<meta charset                            ="utf-8">
								<title>RESERVAS</title>
								<?php  include('../bd/conexion.php');?>
								<meta name                               ="viewport" content="width=device-width, initial-scale=1.0">
								<meta name                               ="description" content="">
								<meta name                               ="author" content="">
								
								<!--link rel                             ="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
								<!--link rel                             ="stylesheet/less" href="less/responsive.less" type="text/css" /-->
								<!--script src                           ="js/less-1.3.3.min.js"></script-->
								<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
								
								<link href                               ="../css/bootstrap.min.css" rel="stylesheet">
								<link href                               ="../css/style.css" rel="stylesheet">
								
								<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
								<!--[if lt IE 9]>
								<script src                              ="js/html5shiv.js"></script>
								<![endif]-->
								
								<!-- Fav and touch icons -->
								<link rel                                ="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">
								<link rel                                ="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
								<link rel                                ="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
								<link rel                                ="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png">
								<link rel                                ="shortcut icon" href="../img/favicon.ico">
								
								<script type                             ="text/javascript" src="../js/jquery.min.js"></script>
								<script type                             ="text/javascript" src="../js/bootstrap.min.js"></script>
								<script type                             ="text/javascript" src="../js/scripts.js"></script>
								<link href                               ="css/style.css" rel="stylesheet">
								</head>
								<body>
								<?php
								$Numero                                  =$_GET['NUMERO'];
								$Codigo                                  =$_GET['VALE_CODIGO'];
								?>
								<?php 
								
								/*Realizamos la consulta para llenar los datos
								con el id que hemos seleccionado*/
								
								$link                                    =Conectarse();
								$sql="SELECT VALE_NUMERO,VALE_CODIGO,CAST(VALE_CANT AS INT) AS CANTIDAD FROM [020BDCOMUN].DBO.VALEDETCOPIA WHERE 
								VALE_NUMERO ='$Numero' AND VALE_CODIGO='$Codigo'";
								$result                                  =mssql_query($sql,$link);
								if ($row                                 =mssql_fetch_array($result)) {
								mssql_field_seek($result,0);
								while ($field                            =mssql_fetch_field($result)) {
								
								}do {
								/*Almacenamos los  datos en variables*/
								$Num                                     =$row[0];
								$Cod                                     =$row[1];
								$Cant                                    =$row[2];
								
								} while ($row                            =mssql_fetch_array($result));
								
								
								}else { 
								echo "No hay registros para mostrar";
								
								} 
								
								?>
								<div class                               ="container">
								<div class                               ="row clearfix">
								<div class                               ="col-md-12 column">
								<form class                              ="form-horizontal" role="form" 
								method="POST" action="../control-rupd/actualizar-detalle.php">
								<div class                               ="form-group">
								<label >Codigo</label>
								<div class                               ="col-sm-10">
								<input type                              ="text"  name="codigo"class="form-control" value="<?php echo"$Cod";?>"  readonly/>
								</div>
								</div>
								<div class                               ="form-group">
								<label >Cantidad</label>
								<div class                               ="col-sm-10">
								<input type                              ="text"  name="cantidad"class="form-control"
								value                                   ="<?php echo"$Cant";?>"  />
								</div>
								</div>
								<input type="hidden" name="numero"value="<?php echo"$Num";?>" >
								<div class                               ="form-group">
								<div class                               ="col-sm-offset-2 col-sm-10">
								<button type                             ="submit" class="btn btn-primary">Actualizar</button>
								</div>
								</div>
								</form>
								</div>
								</div>
								</div>
								
								
								</body>
								</html>