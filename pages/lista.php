							<!DOCTYPE html>
							<html lang="es">
							<?php include '../header.php';?>
							<?php include '../bd/conexion.php';?>
							
							<link rel="stylesheet" href="/vale/css/bootstrap.min.css">
							<link rel="stylesheet" href="/vale/css/bootstrap.css">
							<head>
							
							</head>
							
							<body>
							<div class="container">
							<div class="row clearfix">
							<div class="col-md-10 column">
							<table class="table" >
							<tr class="success">
							
							<td>ID-VALE</td>
							<td>FECHA</td>
							<td>O/T</td>
							<td>NOTA-SALIDA</td>
							<td>RESP. AREA</td>
							<td>SOLICITANTE</td>
							<td>RESP. ALMACEN</td>
							<td> <span class='glyphicon glyphicon-tags' title='REPORTE'> </span> </a></td>             
							
							
							</tr>         
							
							<?php 
							$link=Conectarse();
							$sql="SELECT VALE_NUMERO,VALE_FECHAEMISION,VALE_OT,VALE_NOTASALIDA,
							VALE_RESPONSABLE,VALE_SOLICITANTE,VALE_ALMACEN FROM [020BDCOMUN].DBO.VALECAB
							WHERE VALE_ESTADO='01' ORDER BY CAST(VALE_NUMERO AS INT) DESC";  
							$result                    = mssql_query($sql) or die(mssql_error());
							if(mssql_num_rows($result) ==0) die("NO SE HAN GENERADO REPORTES");
							
							while($row                 =mssql_fetch_array($result))
							{
							
							?>
							<tr class="warning">
							<?php
							echo "
							<td> $row[VALE_NUMERO] </td>
							<td> $row[VALE_FECHAEMISION]  </td>
							<td>$row[VALE_OT]</td>
							<td> $row[VALE_NOTASALIDA]  </td>
							<td> $row[VALE_RESPONSABLE]  </td>
							<td> $row[VALE_SOLICITANTE]  </td>
							<td> $row[VALE_ALMACEN] </td>
							
							
							
							
							<td> <a href ='reporte?VALE_NUMERO=".$row['VALE_NUMERO']."' title='REPORTE'> 
							<span class='glyphicon glyphicon-tags' title='REPORTE'> </span> </a></td>             
							
							
							
							
							</tr>";
							}
							
						
							
							
							?>
							
							</table>
							</div></div></div>
							</body>
							</html>