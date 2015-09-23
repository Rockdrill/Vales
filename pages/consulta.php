									<!DOCTYPE html>
									<html lang="es">
									
									<?php include '../bd/conexion.php';?>
									
									<link href     ="../css/bootstrap.min.css" rel="stylesheet">
									<link href     ="../css/style.css" rel="stylesheet">
									<script type   ="text/javascript" src="../js/jquery.min.js"></script>
									<script type   ="text/javascript" src="../js/bootstrap.min.js"></script>
									<script type   ="text/javascript" src="../js/scripts.js"></script>
									<head>
									
									</head>
									
									<body>
									<div class="container">
									<div class="row clearfix">
									<div class="col-md-10 column">
									<table class="table" >
									<tr class="success">
									<td>ITEM</td>
									<td>CODIGO</td>
									<td>DESCRIPCION</td>
									<td>UNIDAD</td>
									<td>CANTIDAD</td>
									<td> <span class='glyphicon glyphicon-refresh' title='ACTUALIZAR'> </span> </a></td>             
									<td> <span class='glyphicon glyphicon-trash' title='ELIMINAR'> </span> </a></td>  
									
									
									</tr>         
									
									<?php 
									$link=Conectarse();
									$sql="SELECT (ROW_NUMBER ()over(order by D.VALE_CODIGO)) ITEM ,D.VALE_CODIGO,M.ADESCRI,M.AUNIDAD,VALE_CANT FROM [020BDCOMUN].DBO.VALECABCOPIA 
									AS C INNER JOIN [020BDCOMUN].DBO.VALEDETCOPIA AS D
									ON C.VALE_NUMERO=D.VALE_NUMERO INNER JOIN [004BDCOMUN].DBO.MAEART AS M ON
									D.VALE_CODIGO=M.ACODIGO  WHERE VALE_ESTADO='00'";  
									$result                    = mssql_query($sql) or die(mssql_error());
									if(mssql_num_rows($result) ==0) die("NO HAY ARTICULOS INGRESADOS");
									
									while($row                 =mssql_fetch_array($result))
									{
									
									?>
									<tr class="warning">
									<?php
									echo "
									<td> $row[ITEM] </td>
									<td> $row[VALE_CODIGO] </td>
									<td> $row[ADESCRI]  </td>
									<td>$row[AUNIDAD]</td>
									<td> $row[VALE_CANT]  </td>
									
									<td> <a href ='reporte.php?VALE_NUMERO=".$row['VALE_NUMERO']."' title='REPORTE'> 
									<span class='glyphicon glyphicon-tags' title='REPORTE'> </span> </a></td>             
									
									<td> <a href ='reporte.php?VALE_NUMERO=".$row['VALE_NUMERO']."' title='REPORTE'> 
									<span class='glyphicon glyphicon-trash' title='REPORTE'> </span> </a></td>  
									
									</tr>";
									}
									
									
									
									?>
									
									</table>
									
									
								
									</div></div></div>
									</body>
									</html>