						<?php 
						include("../bd/conexion.php"); 
						$link=Conectarse(); 
						$Codigo=$_POST['codigo']; 
						$Numero=$_POST['numero']; 
						
						
						mssql_query("DELETE FROM [020BDCOMUN].DBO.VALEDET
						WHERE VALE_NUMERO='$Numero' AND 
						VALE_CODIGO='$Codigo'"); 
						
						header("Location: ../pages/editar.php?numero=$Numero"); 
					
						
						?> 