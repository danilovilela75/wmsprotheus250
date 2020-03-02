<form method="post" action="../controller/cad.php">

	<div class="modal-body">
		<div class="form-row">

			<div class="col-md-12"><br>
				<b>Nome</b>
				<input type="text" name="nome" class="form-control" required>
			</div>

			<div class="col-md-9"><br>
				<b>E-Mail</b>
				<input type="email" name="email" class="form-control" required>
			</div>

			<div class="col-md-3"><br>
				<b>Função</b>
				<input type="text" name="funcao" class="form-control">
			</div>

			<div class="col-md-4"><br>
				<b>Usuário</b>
				<input type="text" name="usuario" class="form-control" required>
			</div>

			<div class="col-md-4"><br>
				<b>Senha</b>
				<input type="password" name="senha" class="form-control" required>
			</div>

			<div class="col-md-4"><br>
				<b>Permissão</b>
				<select name="tipo" class="form-control">
					<option value="0" selected="selected">Operador</option>
					<option value="1">Administrador</option>
				</select>
			</div>

			<input type="hidden" name="status" value="1">

		</div>
	</div>

	<div class="modal-footer">
		<h5 class="text-right">
			<button class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Salvar</button>
			<button class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
		</h5>
	</div>
	
</form>