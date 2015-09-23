								<?php  
								
								include('../bd/conexion.php');
								
								$Num                            =$_POST['numero'];
								$Cod                            =$_POST['codigo'];
								$Cant                           =$_POST['cantidad'];
								
								$link                           =Conectarse();
								$Sql                            ="UPDATE [020BDCOMUN].DBO.VALEDET SET VALE_CANT='$Cant'
								WHERE VALE_NUMERO               ='$Num' and VALE_CODIGO='$Cod'";
								$result=mssql_query($Sql);
								
								if (!$result){echo "Error al guardar";}
								else{
								?>
								<script>
								
								
								
								window.location = "../pages/editar.php?numero="+<?php echo $Num; ?>;
								</script>
								
								<?php
								
								}
								
								
								
								?>
								