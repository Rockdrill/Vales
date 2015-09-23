<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<?php  include('header-imp.php');?>
<?php  include('../bd/conexion.php');?>

<!-- -Recepcion de vriable-->
<?php 
$Vale=$_GET['VALE_NUMERO'];



function ceros($numero, $ceros=2){
return sprintf("%0".$ceros."s", $numero ); 
}
$Numero= ceros($Requerimiento, 10);
?>
</head>
<body>

<div class="container">
<div class="row clearfix">
<div class="col-md-2 column">
</div>
<div class="col-md-6 column">
<center><img   class="img-responsive" height="50"  width="350" src="../img/rock.png"  /></center>
</div>
</div>
<div class="row clearfix">
<div class="col-md-2 column">
</div>
<div class="col-md-6 column">
<h4 class="text-primary  text-center">
<?php 

/*Realizamos la consulta para llenar los datos
con el id que hemos seleccionado*/

$link=Conectarse();
$sql="
SELECT VALE_NUMERO,VALE_FECHAEMISION,VALE_OT,VALE_NOTASALIDA,
VALE_RESPONSABLE,VALE_SOLICITANTE,VALE_ALMACEN FROM [020BDCOMUN].DBO.VALECAB
where VALE_NUMERO='$Vale'";
$result=mssql_query($sql,$link);
if ($row=mssql_fetch_array($result)) {
mssql_field_seek($result,0);
while ($field=mssql_fetch_field($result)) {

}do {
/*Almacenamos los  datos en variables*/
$Num=$row[0];
$Fecha=$row[1];
$Ot=$row[2];
$Nota=$row[3];
$Responsable=$row[4];
$Solicitante=$row[5];
$Almacen=$row[6];


} while ($row=mssql_fetch_array($result));


}else { 
echo "NO hay nada";

} 

?>
VALE DE SALIDA N° <?php echo"$Vale";?> 
</h4>
</div>
</div>
<div class="row clearfix">
<div class="col-md-1 column">
</div>
<div class="col-md-8 column" >
<table class="table table-condensed table-bordered" id="tabla-cabecera">
<thead>
<tr class="warning">

<th>FECHA EMISION:</th>	
<th><?php echo"$Fecha";?> </th>
<th>RESPONSABLE:</th>
<th><?php echo"$Responsable";?> </th>
<th>FIRMA</th>
<th width="100" height="40"></th>
</tr>	
<tr class="danger">
<th>NOTA SALIDA</th>	
<th><?php echo"$Nota";?> </th>
<th>ALMACEN:</th>	
<th><?php echo"$Almacen";?> </th>
<th>FIRMA</th>
<th width="100" height="40"></th>
</tr>
<tr class="success">
<th>O/T</th>	
<th><?php echo"$Ot";?> </th>
<th>SOLICITANTE:</th>	
<th><?php echo"$Solicitante";?> </th>	
<th>FIRMA</th>
<th width="100" height="40"></th>
</tr>

<tr class="success">
<th></th>	
<th> </th>
<th>JEFE DE LOGISTICA:</th>	
<th><?php echo"MAURO VILCAPOMA";?> </th>	
<th>FIRMA</th>
<th width="200"  height="40"></th>
</tr>
<tr class="success">

</tr>
</thead>
</table>
</div>
</div>
<div class="row clearfix">
<div class="col-md-1 column">
</div>
<div class="col-md-8 column">
<table class="table table-condensed table-bordered" id="tabla-detalle">
<thead>
<tr class="warning">
<th>ITEM</th>
<th>CODIGO</th>
<th>DESCRIPCION</th>
<th>UNIDAD
</th>																															<th>
CANTIDAD
</th>


</tr>
</thead>
<?php 
/*Recibimos la variable post*/


$link=Conectarse();

$sql="
SELECT (ROW_NUMBER ()over(order by D.VALE_CODIGO)) ITEM,C.VALE_NUMERO,D.VALE_CODIGO,M.ADESCRI,M.AUNIDAD,
VALE_CANT FROM [020BDCOMUN].DBO.VALECAB AS C INNER JOIN [020BDCOMUN].DBO.VALEDET AS D
ON C.VALE_NUMERO=D.VALE_NUMERO INNER JOIN [004BDCOMUN].DBO.MAEART AS M ON
D.VALE_CODIGO=M.ACODIGO AND C.VALE_NUMERO='$Vale';
";  
$result                                                      = mssql_query($sql) or die(mssql_error());
if(mssql_num_rows($result)                                   ==0) die("NO TENEMOS DATOS PARA MOSTRAR");

while($row                                                   =mssql_fetch_array($result))
{

?>
<tbody>
<tr class="success">

<td width='50'><?php echo $row[ITEM]; ?>  </td>
<td width='150'> <?php echo utf8_encode($row[VALE_CODIGO]);  ?></td>
<td width='500'> <?php echo  utf8_encode($row[ADESCRI]);?> </td>
<td> <?php echo  $row[AUNIDAD]; ?> </td>
<td><?php  echo $row[VALE_CANT];?></td>


<?php 
}?>

</tbody>
</table>
</div>
</div>

<div class="row clearfix">
<div class="col-md-12 column">

</div>
</div>

<div class="row clearfix">
<div class="col-md-12 column">

</div>
</div>
</div>

<div id="content"></div>
<div id="footer" >


</body>
</html>