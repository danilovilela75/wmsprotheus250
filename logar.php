<?php session_start(['valoremwms']); ?>

<?php 
	include_once './model/Conexao.class.php';
	include_once './model/Manager.class.php';
	$manager = new Manager();
 ?>

<!DOCTYPE html>
<html>
<head>
	<?php include_once './cfg/headers_painel.php'; ?>
</head>
<body>

	<?php 

		$usuario	= $_POST['usuario'];
		$senha		= $_POST['senha'];
		$ambiente	= $_POST['ambiente'];
		$valida		= "WMSok";

		if((empty($usuario)) or (empty($senha))) {
			echo "<br><br><br><br><div class='container'><b>Preencha todos os campos!</b></div>";
			echo "<br><br><center><a class='btn btn-secondary btn-xs' href='login.php'>Voltar <i class='fas fa-arrow-left'></i></a></center>";
			exit();
		}

		foreach($manager->CUser("usuario", "usuario", $usuario) as $reg) {

			$total = $reg['tuser'];
		}

		if ($total == 0) {

			echo "<br><br><br><br><div class='container'><b>Usuário não existe!</b></div>";
			echo "<br><br><center><a class='btn btn-secondary btn-xs' href='login.php'>Voltar <i class='fas fa-arrow-left'></i></a></center>";

		}

		else {

			foreach($manager->listCliente("usuario", "usuario", $usuario) as $client) {

				$chkuser	=	$client['usuario'];
				$chkpass	=	$client['senha'];
				$chknome	=	$client['nome'];
				$chkemail	=	$client['email'];
				$chkfuncao	=	$client['funcao'];
				$chktipo	=	$client['tipo'];
				$chkstatus	=	$client['status'];

			}

			if ($chkstatus == 0) {
				echo "<br><br><br><br><div class='container'><b>Usuário inativo!</b></div>";
				echo "<br><br><center><a class='btn btn-secondary btn-xs' href='login.php'>Voltar <i class='fas fa-arrow-left'></i></a></center>";
			}

			elseif ($senha !=  $chkpass) {
				echo "<br><br><br><br><div class='container'><b>Senha incorreta!</b></div>";
				echo "<br><br><center><a class='btn btn-secondary btn-xs' href='login.php'>Voltar <i class='fas fa-arrow-left'></i></a></center>";
			}

			else {

				$_SESSION['nome']		=	$chknome;
				$_SESSION['usuario']	=	$chkuser;
				$_SESSION['email']		=	$chkemail;
				$_SESSION['funcao']		=	$chkfuncao;
				$_SESSION['tipo']		=	$chktipo;
				$_SESSION['status']		=	$chkstatus;
				$_SESSION['valida']		=	$valida;
				$_SESSION['ambiente']	=	$ambiente;

				echo "<script>window.location = 'menu.php';</script>";

			}

		}

	 ?>

</body>
</html>