<?php  

include('../bd/conexion.php');

$Num                            =$_POST['numero'];

$link                           =Conectarse();
$Sql                            ="UPDATE [020BDCOMUN].DBO.VALECAB SET VALE_ESTADO='01'
WHERE VALE_NUMERO               ='$Num'";

$result                         =mssql_query($Sql);


if (!$result) { echo "error al guardar";

}else {


echo "<script>window.location ='../pages/lista.php';</script>";



}


?>
