<?php include_once 'model/ProtecaoROOT.class.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<?php include_once './cfg/headers_painel.php'; ?>
</head>
<body>

	<div class="containerSB">

		<div class="top">
		    <h5 class="text-center"><img src="img/logovlrico.png" width="40" height="42"></h5>
		    <h5 class="text-center"><b>WMS<sub>2</sub> - PROTHEUS</b></h5>
		    <?php 
		        $ambiente = $_SESSION['ambiente'];
		        if ($ambiente == "8079") {
		            echo "
		                <h5 class='text-center'><sub>PRD - Ambiente de Produção</sub></h5>
		            ";
		        }
		        else {
		            echo "
		                <h5 class='text-center'><sub>HML - Ambiente de Homologação</sub></h5>
		            ";
		        }
		     ?>   
		    <span id="usertitulo"><b>USUÁRIO: </b><?php echo $_SESSION['usuario']; ?></span>
		</div>

		<div class="content">

			<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
				<tr>
					<td width="50%" align="center"><a href="view/apontamento.php"><img src="./ico/ico_apontamento.png"></a></td>
					<td width="50%" align="center"><a href="view/enderecamento.php"><img src="./ico/ico_address.png"></a></td>
				</tr>
				<tr>
					<td width="50%" align="center"><a href="view/transferencia.php"><img src="./ico/ico_transfer.png"></a></td>
					<td width="50%" align="center"><a href="view/separacao.php"><img src="./ico/ico_separacao.png"></a></td>
				</tr>
				<tr>
					<td width="50%" align="center"><a href="view/carregamento.php"><img src="./ico/ico_carregamento.png"></a></td>
					<td width="50%" align="center"><a href="view/retirada.php"><img src="./ico/ico_retirada.png"></a></td>
				</tr>
			</table>

		</div>

		<div class="menu">
			<div class="row">
	            <div class="col-md-12">
		            <h5 class="text-center">
		            
		                 <?php 
		                    $tipo = $_SESSION['tipo'];
		                    if ($tipo == 1) {
		                        echo "
		                            <a class='btn btn-primary btn-sm' href='usuarios.php'><i class='fa fa-user'></i> USUÁRIOS</a>
		                            &nbsp;
		                        ";
		                    }

		                    else {
		                        echo "&nbsp;";
		                    }
		                ?>

		            	<a class="btn btn-danger btn-sm" href="model/Sair.class.php"><i class="fas fa-sign-out-alt"></i> SAIR</a><br><br>
		            </h5>
	            </div>
	        </div>
		</div>

		
	</div>

</body>
</html>