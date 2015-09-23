													<!DOCTYPE html>
													<html lang                 ="en">
													<head>
													<meta charset              ="UTF-8">
													<?php
													include('../header.php');
													
													include '../bd/conexion.php';?>
													
													
													</head>
													<body>
													<div class                 ="container">
													<div class                 ="row clearfix">
													
													</div>
													<div class                 ="row clearfix">
													<div class                 ="col-md-12 column">
													<table class               ="table table-condensed table-bordered">
													<thead>
													<tr class                  ="warning">
													<th>NUMERO</th>
													<th>FECHA</th>
													<th>O/T</th>
													<TH>SOLICITANTE</TH>
													<th>RESPONSABLE</th>
													<th>RESPONSABLE ALMACEN</th>
													<th>EDITAR</th>
													
													</tr>
													</thead>
													<tbody>
													
													<?php 
													$link                      =Conectarse();
													$sql="SELECT VALE_NUMERO,VALE_FECHAEMISION,
													VALE_OT,VALE_SOLICITANTE,VALE_RESPONSABLE,VALE_ALMACEN 
													FROM [020BDCOMUN].DBO.VALECAB WHERE 
													VALE_ESTADO='00' ORDER BY CAST(VALE_NUMERO AS iNT) DESC";  
													$result                    = mssql_query($sql) or die(mssql_error());
													if(mssql_num_rows($result) ==0) die("NO SE HAN REGISTRADO VALES");
													$i                         =1;	
													
													while($row                 =mssql_fetch_array($result))
													{
													
													?>
													<tr class                  ="active">
													
													<?php
													
													$txta                      ='modal-containera-';
													$txtxa                     ='#modal-containera-';
													$txta                      .=$j;
													$txtxa                     =$txtxa.=$j;
													
													$txt                       ='modal-container-';
													$txtx                      ='#modal-container-';
													$txt                       .=$i;
													$txtx                      =$txtx.=$i;
													echo "
													<td> $row[VALE_NUMERO] </td>
													<td> $row[VALE_FECHAEMISION] </td>
													<td> $row[VALE_OT]  </td>
													<td> $row[VALE_SOLICITANTE]  </td>
													<td>$row[VALE_RESPONSABLE]</td>
														<td>$row[VALE_ALMACEN]</td>
													
													";?>
													
													
													
												       
													
													
													<td>	<a id              ="modal-11979" href='<?php echo $txtx;?>' role="button" 
													class                      ="btn" data-toggle="modal">
													<span class                ="glyphicon glyphicon-pencil"></span></a></td>          
													
													</tr>
													
													<!-- MODAL ACTUALIZAR-->
													
													<div class                 ="modal fade" id="<?php echo $txta;?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
													<div class                 ="modal-dialog">
													<div class                 ="modal-content">
													<div class                 ="modal-header">
													<button type               ="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
													<h4 class                  ="modal-title text-primary" id="myModalLabel">
													¡Actualización!
													</h4>
													</div>
													<div class                 ="modal-body text-warning">
													<p> <h4 class              ="text-success">Vale Número <?php echo $row['NUMERO'];?></h4></p>
													<p>Código:<?php echo $row['VALE_CODIGO'];?> </p>
													<p><h5 class               ="text-primary">Cantidad Actual: <?php echo $row['VALE_CANT'];?> unidades</h5> </p>
													<form action               ="../control-rupd/actualizar-detalle.php" 
													method="POST"  autocomplete="Off">
													
													<div class                 ="col-sm-4">
													<input type="hidden" name="numero" value="<?php echo $row['NUMERO'];?>">
													<input type="hidden" name="codigo"value="<?php echo $row['VALE_CODIGO'];?>">
													
													<input type                ="number" name="cantidad" min="1" 
													max="9999"placeholder="cantidad nueva"class="form-control" required>
													</div>
													</div>
													<div class                 ="modal-footer">
													
													
													
													<button type               ="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
													<button type               ="Submit" class="btn btn-primary">Actualizar</button>
													
													</form>
													</div>
													</div>
													
													</div>
													
													</div>
													<!-- MODAL ACTUALIZAR-->
													<!-- INICIO MODAL ELIMINAR-->
													<div class                 ="modal fade" id="<?php echo $txt;?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
													<div class                 ="modal-dialog">
													<div class                 ="modal-content">
													<div class                 ="modal-header">
													<button type               ="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
													<h4 class                  ="modal-title text-primary" id="myModalLabel">
													¡Comfirmación!
													</h4>
													</div>
													<div class                 ="modal-body text-warning">
													<p><H4 class="text-warning">¿Desea editar el Vale Número<?php echo $row['VALE_NUMERO'];?> ? </H4></p>
													</div>
													<div class                 ="modal-footer">
													
													<form action               ="editar" method="GET" >
													<input type                ="hidden" name="numero" value="<?php echo $row['VALE_NUMERO'];?>">
								
													
													
													<button type               ="submit" class="btn btn-primary">SI</button> </form>
													<button type               ="button" class="btn btn-danger" data-dismiss="modal">NO</button>
													</form>
													</div>
													</div>
													
													</div>
													
													</div>
													
													<!-- FIN MODAL ELIMINAR-->
													<?php
													
													$i                         =$i+1;
													$j                         =$j+1; 
													
													}
													
													
													
													?>
													
													
													</tbody>
													</table>
													</div>
													</div>
													</div>
													</body>
													</html>