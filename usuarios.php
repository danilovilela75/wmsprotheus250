<?php include_once './model/Protecao.class.php'; ?>
<?php 
	include_once './model/Conexao.class.php';
	include_once './model/Manager.class.php';
	$manager = new Manager();
 ?>
<!DOCTYPE html>
<html>
<head>
    <?php include_once 'cfg/headers_painel.php'; ?>
</head>
<body>

	<hr>
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
    <hr>
        <div class="container">
            <b>USUÁRIO: </b><?php echo $_SESSION['usuario']; ?>
        </div>
    <hr>

    <div class="container">

    	<h5 class="text-right">
    		<button
    			class="btn btn-primary btn-sm"
    			data-toggle="modal"
    			data-target="#modalCADUser"
    		>
    			<i></i> Cadastrar
    		</button>
    		<a class="btn btn-warning btn-sm" href="menu.php"><i class="fas fa-home"></i> Painel</a>
    	</h5>

    	<div class="table-responsive">

    		<table class="table table-striped table-hover table-sm" id="tabela">

    			<thead>
    				<tr>
    					<th id="center">ID</th>
    					<th>NOME</th>
    					<th id="center">E-MAIL</th>
    					<th id="center">USUÁRIO</th>
    					<th id="menu"></th>
    					<th id="menu"></th>
    					<th id="menu"></th>
    				</tr>
    			</thead>

    			<tbody>
    				<?php foreach($manager->listDados("usuario", "idUsuario", "0", "desc") as $client): ?>
	    				<tr>
	    					<td id="center"><?=$client['idUsuario'];?></td>
	    					<td><?=$client['nome'];?></td>

                            <td id="center">
                                <?php 
                                    $email = $client['email'];
                                    if((is_null($email)) or (empty($email))) {
                                        echo "VAZIO";
                                    }
                                    else {
                                        echo $email;
                                    }
                                 ?>
                            </td>                            

	    					<td id="center"><?=$client['usuario'];?></td>

	    					<td id="menu">
		    					<button
		    						class="btn btn-info btn-sm"
		    						data-toggle="modal"
		    						data-target="#modalVER<?=$client['idUsuario'];?>"
		    					>
		    						<i class="fas fa-search"></i>
		    					</button>
		    				</td>

		    				<td id="menu">
		    					<button
		    						class="btn btn-warning btn-sm"
		    						data-toggle="modal"
		    						data-target="#modalEDT<?=$client['idUsuario'];?>"
		    					>
		    						<i class="fas fa-edit"></i>
		    					</button>
		    				</td>

		    				<td id="menu">
		    					<form method="post" action="./controller/alt.php" onclick="return confirm('Deseja desativar o usuário?')">
		    						<button class="btn btn-danger btn-sm">
		    							<i class="fas fa-ban"></i>
		    								<input type="hidden" name="status" value="0">
		    								<input type="hidden" name="campo" value="status">
		    								<input type="hidden" name="idUsuario" value="<?=$client['idUsuario'];?>">
		    						</button>
		    					</form>
		    				</td>

	    				</tr>


	    			<?php endforeach; ?>
    			</tbody>
    			
    		</table>
    		
    	</div>
    	
    </div>

    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <script>
        $(document).ready(function() {
            $('#tabela').DataTable();
        });
    </script>

</body>
</html>