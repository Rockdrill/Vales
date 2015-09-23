					<?php 
					
					include('../bd/conexion.php');
					
					
					$Num=$_POST['numero'];
					$Fecha=$_POST['fecha'];
					$Solicitante=$_POST['solicitante'];
					$Ot=$_POST['ot'];
					$Responsable=$_POST['responsable'];
					$Almacen='JOSE PERALTA';
					$Estado='00';
					
					
					
					/*Insertamos los nuevos Datos*/
					
					$link=Conectarse();
					
					$Sql ="INSERT INTO [020BDCOMUN].DBO.VALECAB(VALE_NUMERO,
						VALE_FECHAEMISION,VALE_OT,VALE_RESPONSABLE,VALE_SOLICITANTE,
						VALE_ALMACEN,VALE_ESTADO)VALUES('$Num','$Fecha','$Ot','$Responsable',
						'$Solicitante','$Almacen','$Estado')";
					
					$result=mssql_query($Sql);
					
					if (!$result){echo "Error al guardar";}
					else{
					
					echo "<script>
					
					
					window.location ='../pages/vales.php';
					
					</script>";
					}
					
					
					
					?>
					