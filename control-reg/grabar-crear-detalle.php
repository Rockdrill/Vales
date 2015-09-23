					<?php 
					
					include('../bd/conexion.php');
					
					
					
					$Numero=$_POST['numero'];
					$Codigo=$_POST['codigo'];
					$Cantidad=$_POST['cantidad'];
					
					
					
					/*Insertamos los nuevos Datos*/
					
					$link=Conectarse();
					
					$Sql ="IF EXISTS(SELECT * FROM [020BDCOMUN].DBO.VALEDET WHERE
					VALE_CODIGO='$Codigo' AND VALE_NUMERO='$Numero')
					UPDATE [020BDCOMUN].DBO.VALEDET SET VALE_CODIGO='$Codigo',
					VALE_CANT=VALE_CANT+$Cantidad
					where VALE_NUMERO='$Numero'and VALE_CODIGO='$Codigo'  
					ELSE
					INSERT INTO[020BDCOMUN].DBO.VALEDET VALUES('$Numero','$Codigo','$Cantidad')";
					
					$result=mssql_query($Sql);
					
					if (!$result){echo "Error al guardar";}
					else{
					?>
					<script>
					
					
				
					window.location = "../pages/editar.php?numero="+<?php echo $Numero; ?>;
					</script>
					
					<?php
					
					}
					
					
					
					?>
					