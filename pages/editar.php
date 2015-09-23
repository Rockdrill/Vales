<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<?php 	include('../bd/conexion.php');
include('../header.php');?>
</head>
<body>
<?php 

SESSION_START();

$Num = $_GET['numero'];


?>
<div class="container">
<div class="row clearfix">
<div class="col-md-4 column">

</div>
</div>
<p>	</p>
<div class="row clearfix">
<div class="col-md-12 column">
<table class="table table-condensed table-bordered">
<thead>
<tr class="warning">
<th>
NÚMERO
</th>
<th>
FECHA DE EMISIÓN
</th>
<th>
O/T
</th>
<th>
SOLICITANTE
</th>

<th>RESPONSABLE</th>
<th>ENCARGADO DE ALMACEN</th>
<th><form action="../control-rupd/actualizar-vale.php" method="POST">
<input type="hidden" name="numero"value="<?php echo"$Num";?>">


<!-- 

Inicio modal reporte

-->
<a id="modal-400612" href="#modal-container-400612" 
role="button" class="btn btn-xs btn-primary" data-toggle="modal">Generar Reporte</a>

<div class="modal fade" id="modal-container-400612" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h4 class="modal-title text-primary" id="myModalLabel">
Vale Número <?php echo"$Num";?>
</h4>
</div>
<div class="modal-body text-warning">
¿Desea generar el reporte ?
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
<button type="submit" class="btn btn-primary">SI</button>
</div>
</div>

</div>

</div>

</form>

<!-- 
fin modal reporte


-->
</th>


</tr>
</thead>
<tbody>
<?php 




$link                      =Conectarse();
$sql                       ="SELECT *  FROM [020BDCOMUN].DBO.VALECAB WHERE VALE_NUMERO='$Num'";  
$result                    = mssql_query($sql) or die(mssql_error());
if(mssql_num_rows($result) ==0) die("NO HAY SELECCIONADO UN VALE");

while($row                 =mssql_fetch_array($result))
{

?>
<tr class                  ="active">
<?php
echo "
<td> $row[VALE_NUMERO] </td>
<td> $row[VALE_FECHAEMISION] </td>
<td> $row[VALE_OT]  </td>
<td>$row[VALE_SOLICITANTE]</td>
<td> $row[VALE_RESPONSABLE]  </td>
<td> $row[VALE_ALMACEN]  </td>


</tr>";
}



?>

</tbody>
</table>
</div>
</div>
</div>
<div class                 ="container">
<div class                 ="row clearfix">
<div class                 ="col-md-4 column">
<form role="form" action="../control-reg/grabar-crear-detalle.php" method="POST"
autocomplete="Off">
<div class                 ="form-group">
<input type="hidden" name="numero"  value="<?php echo"$Num";?>">
<label>CODIGO:</label>
<input type="text"  name="codigo"class="form-control"  
required/>
</div>
<div class                 ="form-group">
<label>CANTIDAD:</label>
<input type="number" name="cantidad"class="form-control"  min="1"required  />

<button type               ="submit" class="btn btn-primary">Grabar</button>
</div>
</form>
</div>
</div>

<p>	</p>
<div class                 ="row clearfix">
<div class                 ="col-md-12 column">
<table class               ="table table-condensed table-bordered">
<thead>
<tr class                  ="warning">
<th>ITEM</th>
<th>CODIGO</th>
<th>DESCRIPCION</th>
<th>UNIDAD</th>
<TH>CANTIDAD</TH>
<th>ACTUALIZAR</th>
<th>ELIMINAR</th>
</tr>
</thead>
<tbody>

<?php 
$link                      =Conectarse();
$sql="SELECT (ROW_NUMBER ()over(order by D.VALE_CODIGO)) ITEM ,
(D.VALE_NUMERO)AS NUMERO,D.VALE_CODIGO,M.ADESCRI,M.AUNIDAD,VALE_CANT FROM [020BDCOMUN].DBO.VALECAB
AS C LEFT JOIN [020BDCOMUN].DBO.VALEDET AS D
ON C.VALE_NUMERO           =D.VALE_NUMERO LEFT  JOIN [004BDCOMUN].DBO.MAEART AS M ON
D.VALE_CODIGO              =M.ACODIGO  WHERE VALE_ESTADO='00' AND D.VALE_NUMERO='$Num'";  
$result                    = mssql_query($sql) or die(mssql_error());
if(mssql_num_rows($result) ==0) die("NO HAY ARTICULOS INGRESADOS");
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
<td> $row[ITEM] </td>
<td> $row[VALE_CODIGO] </td>
<td> $row[ADESCRI]  </td>
<td>$row[AUNIDAD]</td>
<td> $row[VALE_CANT]  </td>
";?>



<td>	<a id              ="modal-11978" href='<?php echo $txtxa;?>' role="button" 
class                      ="btn" data-toggle="modal">
<span class                ="glyphicon glyphicon-refresh"></span></a></td>          


<td>	<a id              ="modal-11979" href='<?php echo $txtx;?>' role="button" 
class                      ="btn" data-toggle="modal">
<span class                ="glyphicon glyphicon-trash"></span></a></td>          

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
<h4 class                  ="modal-title text-danger" id="myModalLabel">
¡Confirmación!
</h4>
</div>
<div class                 ="modal-body text-warning">
<p> <h4 class              ="text-success">Vale Número <?php echo $row['NUMERO'];?></h4></p>
<p>¿Desea eliminar el codigo <?php echo $row['VALE_CODIGO'];?> ? </p>
<p><h5 class               ="text-primary">Cantidad: <?php echo $row['VALE_CANT'];?> unidades</h5> </p>
</div>
<div class                 ="modal-footer">

<form action               ="../control-del/del-crear-detalle.php" method="POST" >
<input type                ="hidden" name="codigo" value="<?php echo $row['VALE_CODIGO'];?>">
<input type                ="hidden" name="numero" value="<?php echo $row['NUMERO'];?>">


<button type               ="submit" class="btn btn-primary">Eliminar</button> </form>
<button type               ="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
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