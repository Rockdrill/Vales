<?php
include 'conexion.php';
?>

<script type="text/javascript" language="javascript" src="js/config_datatable_api.js"></script>
<div class="container">
<table cellpadding="0" cellspacing="5" border="0" class="bordered-table zebra-striped" 
id="registro">
<thead>
<tr>
<th width="300">CODIGO</th>
<th width="800">CODIGO FABRICANTE</th>
<th width="800">DESCRIPCION</th>
<th width="300">FAMILIA</th>
<th width="300">UNIDAD</th>
<th width="300">STOCK</th>



</tr>
</thead>
<tbody>
<?php
$link=Conectarse();
$sql="SELECT ACODIGO,ACODIGO2,ADESCRI,AFAMILIA ,AUNIDAD,(CAST(S.STSKDIS AS INT)) AS STOCK
FROM  [004BDCOMUN].dbo.MAEART AS  MA left JOIN [004BDCOMUN].dbo.STKART AS S
ON  MA.ACODIGO=S.STCODIGO WHERE MA.AESTADO='V'";    
$result= mssql_query($sql) or die(mssql_error());
if(mssql_num_rows($result)==0) die("No hay registros para mostrar");
while ($filas=mssql_fetch_array($result))
{
echo '<tr>';
echo '<td >'.utf8_encode ($filas['ACODIGO']).'</td>';
echo '<td >'.utf8_encode ($filas['ACODIGO2']).'</td>';
echo '<td >'.utf8_encode ($filas['ADESCRI']).'</td>';
echo '<td >'.utf8_encode ($filas['AFAMILIA']).'</td>';
echo '<td >'.utf8_encode ($filas['AUNIDAD']).'</td>';
echo '<td >'.utf8_encode ($filas['STOCK']).'</td>';
echo '</tr>';
}
?>
<tbody>

</table>
</div>


