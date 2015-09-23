			<!DOCTYPE html>
			<html lang="es">
			<head>
			<meta charset="UTF-8">
			<?php include('../header.php');
			include('../bd/conexion.php');?>
			
			<!-- Inicio Script convertir en mayuscula al ingresar	-->
			<script language    ="JavaScript" type="text/javascript" src="ajax.js"></script>
			
			<script language    =""="JavaScript">
			function conMayusculas(field) {
			field.value         = field.value.toUpperCase()
			}
			</script>
			<!-- Fin Script convertir en mayuscula al ingresar-->
			
			
			
			
			<!-- Incio -->
			
			<script  type="text/javascript">
			function fAgrega()
			{
			document.getElementById("Text2").value = document.getElementById("Text1").value;
			}
			</script>
			
			<!-- Fin-->
			</head>
			<body>
			<div class="container">
			<div class="row clearfix">
			<div class="col-md-4 column">
			<form role="form" method="POST" action="../control-reg/grabar-crear.php" autocomplete="Off">
			<div class="form-group">
			<?php 
			
			/*Realizamos la consulta para  generar el 
			codigoautomatico*/
			
			$link=Conectarse();
			$sql="select top 1  CAST(VALE_NUMERO AS INT) from [020BDCOMUN].dbo.VALECAB
			order by CAST(VALE_NUMERO AS INT)  desc ";
			$result       =mssql_query($sql,$link);
			if ($row      =mssql_fetch_array($result)) {
			mssql_field_seek($result,0);
			while ($field =mssql_fetch_field($result)) {
			
			}do {
			/*Almacenamos los  datos en variables*/
			
			$Numero=$row[0];
			
			} while ($row =mssql_fetch_array($result));
			
			}else { 
			//echo "No hay registros para mostrar";
			} 
			/*Sumamos codigo de la bd
			$suma         =$Numero+1;*/
			
			$Suma=$Numero+1;
			
			
			
			?>
			<label class="text-success">Número de Vale</label>
			<input type="text" name="numero"class="form-control" value="<?php  echo"$Suma"; ?>" 
			readonly/>
			</div>
			<div class="form-group">
			<label class="text-success">Fecha</label>
			<input type="text" class="form-control text-danger" name="fecha" value="<?php  echo date('d-m-Y') ?>" 
			readonly  onChange="conMayusculas(this)"/>
			</div>
			<div class="form-group">
			<label class="text-success">Solicitante</label>
			<input type="text" name="solicitante" class="form-control" name="solicitante"
			onChange="conMayusculas(this)" required />
			
			</div>
			<div class="form-group">
			<label class="text-success">Responsable del Área</label>
			<input type="text" class="form-control" name="responsable"
			onChange="conMayusculas(this)" required />
			</div>
			<div class="form-group">
			<label class="text-success">O/T</label>
			<select id="Text1" name="ot" class="form-control text-primary" onkeyup="fAgrega();" required>
			<option value="">Seleccionar la O/T</option>
			<?php
			
			$link=Conectarse();
			$Sql ="select OF_COD from [004BDCOMUN].DBO.ORD_FAB WHERE 
			UPPER(OF_ESTADO)=UPPER('ACTIVO')
			;";
			$result=mssql_query($Sql) or die(mssql_error());
			while ($row=mssql_fetch_array($result)) {
			?>
			
			<option    value="<?php echo $row['OF_COD']?>"><?php echo $row['OF_COD']?></option>
			<?php }?>
			
			
			</select>
			
			</div>
			
			
			<!--Inicio Modal -->
			<a id="modal-667985" href="#modal-container-667985" role="button" class="btn-lg  btn-primary" data-toggle="modal">Grabar</a>
			
			<div class="modal fade" id="modal-container-667985" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			<h4 class="modal-title text-primary" id="myModalLabel">
			¿Desea  generar el Vale numero <?php echo "$Suma";?>?
			</h4>
			</div>
			<div class="modal-body">
			<h4  class="text-warning"  id="myModalLabel">
			Su vale será generado con los datos ingresados.
			</h4>
			</div>
			<div class="modal-footer">
			
			
			<button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
			<button type="submit" class="btn btn-primary">SI</button>
			
			</div>
			</div>
			
			</div>
			
			</div>
			
			<!-- Fin Modal-->
			
			</form>
			
			
			
			</div>
			</div>
			</div>
			</body>
			</html>