<?php

include_once './include/header.php';

?>

<body>


	<?php

	if ((isset($_SESSION['id'])) and (isset($_SESSION['usuario']))) {
		include_once 'configuracao/conexao.php';

		$query_usuario = "SELECT * FROM usuarios WHERE id =:id LIMIT 1";
		$resul_usuario = $conexao->prepare($query_usuario);
		$resul_usuario->bindParam(':id', $_SESSION['id'], PDO::PARAM_INT);
		$resul_usuario->execute();

		if (($resul_usuario) and ($resul_usuario->rowCount() != 0)) {
			$row_usuario = $resul_usuario->fetch(PDO::FETCH_ASSOC);
			///var_dump($row_usuario);
			extract($row_usuario);
		} else {
			$_SESSION['msg'] = "<p style='color: #ff0000'>Necessário realizar login para acessar<br>a pagina!</p>";
			header("Location: index.php");
		}
	} else {
		$_SESSION['msg'] = "<p style='color: #ff0000'>Necessário realizar login para acessar<br>a pagina!</p>";
		header("Location: index.php");
	}

	?>


	<div class="wrapper">
		<div class="body-overlay"></div>

		<!-------page-content start----------->

		<div id="content">

			<!------top-navbar-start----------->

			<div class="top-navbar">
				<div class="xd-topbar">
					<div class="row">
						<div class="col-md-5 col-lg-3 order-3 order-md-2">
							<div class="xp-searchbar">
								<form>
									<div class="input-group">
										<input type="search" name="buscar" id="pesquisar" class="form-control" placeholder="Pesquisar cliente">
										<div class="input-group-append">
											<button title="Pesquisar cliente" onclick="searchData()" class="btn" type="submit" id="button-addon2"><i class="material-icons">&#xf02f;</i>
											</button>
										</div>
									</div>
								</form>
							</div>
						</div>


						<div class="col-10 col-md-6 col-lg-8 order-1 order-md-3">

							<div class="xp-profilebar text-right">
								<label></label>
								<nav class="navbar p-0">

									<ul class="nav navbar-nav flex-row ml-auto">

										<li class="dropdown nav-item">
											<img src="img/logotitulo.png" style="width:200px;" />
										</li>

										<li class="dropdown nav-item">
											<a class="nav-link" href="#" title="Menu" data-toggle="dropdown">

												<div class="xp-breadcrumbbar">
													<div class="title">
														<h6>Olá, <?php echo $usuario ?>
														</h6>
													</div>
												</div>
											</a>

											<?php

											// data-toggle='modal' data-whatever='$id' data-target='#altSenhaModal'

											echo
											"<ul class='dropdown-menu small-menu'>

												<li><a href='#' class='menu' onclick='altSenhaUsuario($id)'>
														<span class='material-icons'>&#xe73c</span>
														Alterar Senha
													</a>
												</li>

												<li><a href='#' class='menu' data-toggle='modal' data-target='#perfilUserModal'>
														<span class='material-icons'>&#xe7fd</span>
														Perfil
													</a>
												</li>

												<li><a href='#' class='menu' onclick='sairDashboard()'>
														<span class='material-icons'>logout</span>
														Sair
													</a>
												</li>

											</ul>"
											?>

										</li>
									</ul>
								</nav>
							</div>
						</div>

					</div>

					<div class="xp-breadcrumbbar text-center">
						<h4 class="page-title">Painel de Controle</h4>
					</div>


				</div>
			</div>
			<!------top-navbar-end----------->


			<!------main-content-start----------->



			<!----Adicionar-modal start--------->
			<div class="modal fade" id="adicionarClienteModal" tabindex="-1" aria-labelledby="adicionarClienteModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content"> <!-- alterado -->
						<div class="modal-header">
							<h5 class="modal-title" id="adicionarClienteModalLabel"><b>Adicionar Cliente</b></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-boby">

							<form id="add-cliente-form" class="form" action="adicionar.php" method="post">
								<div class="form_grupo">
									<label for="nome" class="form_label"></label>
									<input type="text" name="nome" class="form_input" id="nome" placeholder="Nome Completo" autocomplete="off" maxlength="55">
								</div>

								<div class="form_grupo">
									<label for="cpf" class="form_label">CPF</label>
									<input type="text" name="cpf" class="form_input" id="cpf" placeholder="Somente números" autocomplete="off" maxlength="14">
								</div>

								<div class="form_grupo">
									<label for="rg" class="form_label">RG</label>
									<input type="text" name="rg" class="form_input" id="rg" placeholder="número de identificação" autocomplete="off" maxlength="12">
								</div>

								<div class="form_grupo">
									<label for="nascimento" class="form_label">Data de Nascimento</label>
									<input type="date" name="nascimento" class="form_input" id="nascimento" placeholder="Data de Nascimento" autocomplete="off" maxlength="10">
								</div>

								<div class="form_grupo">
									<label for="telefone" class="form_label">Telefone</label>
									<input type="text" name="telefone" class="form_input" id="telefone" placeholder="(xx)xxxxx-xxxx" autocomplete="off" maxlength="15" onkeyup="mascaraTelefone('(  )     -    ', this)">
								</div>

								<div class="form_grupo">
									<label for="email" class="form_label">Email</label>
									<input type="email" name="email" class="form_input" id="email" placeholder="exemplo@email.com" autocomplete="off" maxlength="55">
								</div>

								<div class="form_grupo">
									<label for="cep" class="form_label">CEP</label>
									<input type="text" name="cep" class="form_input" id="cep" placeholder="Ex.: 00000-000" maxlength="9">
								</div>

								<div class="form_grupo">
									<label for="logradouro" class="form_label"></label>
									<input type="text" name="logradouro" class="form_input" id="logradouro" placeholder="Ex.: Rua, Avenida, Travessa, etc." maxlength="55">
								</div>

								<div class="form_grupo">
									<label for="numero" class="form_label"></label>
									<input type="text" name="numero" class="form_input" id="numero" placeholder="Número" autocomplete="off" maxlength="5">
								</div>

								<div class="form_grupo">
									<label for="complemento" class="form_label"></label>
									<input type="text" name="complemento" class="form_input" id="complemento" placeholder="Complemento: Ex.: bloco 15, apat. 104" autocomplete="off" maxlength="55">
								</div>

								<div class="form_grupo">
									<label for="bairro" class="form_label"></label>
									<input type="text" name="bairro" class="form_input" id="bairro" placeholder="Bairro" maxlength="55">
								</div>

								<div class="form_grupo">
									<label for="cidade" class="form_label"></label>
									<input type="text" name="cidade" class="form_input" id="cidade" placeholder="Cidade" maxlength="55">
								</div>

								<div class="form_grupo">
									<label for="uf" class="form_label"></label>
									<input type="text" name="uf" class="form_input" id="uf" placeholder="Estado" maxlength="2">
								</div>

								<div class="form_grupo">
									<label for="ibge" class="form_label"></label>
									<input hidden type="text" name="ibge" class="form_input" id="ibge" placeholder="IBGE" maxlength="7">
								</div>

								<div class="form_grupo">
									<label for="senha" class="form_label">Senha</label>
									<input type="text" name="senha" class="form_input" id="senha" placeholder="Senha do Cliente" autocomplete="off" maxlength="8">
								</div>

								<span id="msgAlerta"></span>
								<span id="msgAlertaErroCad"></span>

								<div class="form_grupo">

									<label for="plano" class="text">Plano</label>
									<select name="plano" id="plano" class="dropdown">

										<option selected disabled class="form_select_option" value="">Selecione</option>
										<option value="100mb" class="form_select_option">100mb</option>
										<option value="200mb" class="form_select_option">200mb</option>
										<option value="400mb" class="form_select_option">400mb</option>

									</select>

								</div>

								<div class="form_grupo">

									<span class="legenda">Dia de Vencimento</span>

									<div class="radio-btn">
										<input type="radio" class="form_new_input" id="oito" name="vencimento" value="08">
										<label for="oito" class="radio_label form_label"> <span class="radio_new_btn"></span>Todo dia 08</label>
									</div>

									<div class="radio-btn">
										<input type="radio" class="form_new_input" id="dezessete" name="vencimento" value="17">
										<label for="dezessete" class="radio_label form_label"> <span class="radio_new_btn"></span>Todo dia 17</label>
									</div>

									<div class="radio-btn">
										<input type="radio" class="form_new_input" id="trinta" name="vencimento" value="30">
										<label for="trinta" class="radio_label form_label"> <span class="radio_new_btn"></span>Todo dia 30</label>
									</div>

								</div>

								<div class="form_message">

									<label for="message" class="form_message_label"> Observação:</label>
									<textarea name="observacao" id="message" cols="30" rows="3" autocomplete="off" maxlength="400" class="form_input message_input"></textarea>

								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
									<input type="submit" name="submit" class="btn btn-success btn-sm" id="add-cliente-btn" onclick="javascript:void(0)" value="Adicionar" />
								</div>

							</form>
						</div>
					</div>
				</div>
			</div>

			<!----Adicionar-modal end--------->

			<!-- editar inicio -->

			<div class="modal fade" id="editClienteModal" tabindex="-1" aria-labelledby="editClienteModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content"> <!-- alterado -->
						<div class="modal-header">
							<h5 class="modal-title" id="editClienteModalLabel"><b>Alterar dados de Cliente</b></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>

						<div class="modal-boby">

							<form id="edit-cliente-form" class="form">

								<div class="form_grupo">
									<label for="cod" class="form_label"></label>
									<input type="hidden" name="cod" id="editcod">
								</div>

								<div class="form_grupo">
									<label for="nome" class="form_label"></label>
									<input type="text" class="form_input" name="nome" id="editnome" autocomplete="off" maxlength="55">
								</div>

								<div class="form_grupo">
									<label for="cpf" class="form_label">CPF</label>
									<input type="text" class="form_input" name="cpf" id="editcpf" placeholder="Somente números" autocomplete="off" maxlength="14">
								</div>

								<div class="form_grupo">
									<label for="rg" class="form_label">RG</label>
									<input type="text" class="form_input" name="rg" id="editrg" autocomplete="off" maxlength="12">
								</div>

								<div class="form_grupo">
									<label for="nascimento" class="form_label">Data de Nascimento</label>
									<input type="date" class="form_input" name="nascimento" id="editnascimento" placeholder="Data de Nascimento">
								</div>

								<div class="form_grupo">
									<label for="telefone" class="form_label">Telefone</label>
									<input type="text" class="form_input" name="telefone" id="edittelefone" autocomplete="off" maxlength="15" onkeyup="mascaraTelefone('(  )     -    ', this)">
								</div>

								<div class="form_grupo">
									<label for="email" class="form_label">Email</label>
									<input type="email" class="form_input" name="email" id="editemail" autocomplete="off" maxlength="55">
								</div>

								<div class="form_grupo">
									<label for="cep" class="form_label">CEP</label>
									<input type="text" class="form_input" name="cep" id="editcep" placeholder="Ex.: 00000-000" maxlength="9">
								</div>

								<div class="form_grupo">
									<label for="logradouro" class="form_label"></label>
									<input type="text" class="form_input" name="logradouro" id="editlogradouro" placeholder="Ex.: Rua, Avenida, Travessa, etc." maxlength="55">
								</div>

								<div class="form_grupo">
									<label for="numero" class="form_label"></label>
									<input type="text" class="form_input" name="numero" id="editnumero" placeholder="Número" autocomplete="off" maxlength="5">
								</div>

								<div class="form_grupo">
									<label for="complemento" class="form_label"></label>
									<input type="text" class="form_input" name="complemento" id="editcomplemento" autocomplete="off" maxlength="55">
								</div>

								<div class="form_grupo">
									<label for="bairro" class="form_label"></label>
									<input type="text" class="form_input" name="bairro" id="editbairro" maxlength="55">
								</div>

								<div class="form_grupo">
									<label for="cidade" class="form_label"></label>
									<input type="text" class="form_input" name="cidade" id="editcidade" maxlength="55">
								</div>

								<div class="form_grupo">
									<label for="uf" class="form_label"></label>
									<input type="text" class="form_input" name="uf" id="edituf" maxlength="2">
								</div>

								<div class="form_grupo">
									<label for="ibge" class="form_label">IBGE</label>
									<input type="text" class="form_input" name="ibge" id="editibge" maxlength="7">
								</div>

								<!-- <div class="form_grupo">
									<label for="senha" class="form_label">Senha criptografada</label>
									<input type="text" class="form_input" name="senha" id="editsenha" autocomplete="off" maxlength="255">
								</div> -->

								<div class="form_grupo">

									<label for="plano" class="text">Plano</label>
									<select name="plano" id="editplano" class="dropdown">

										<option selected disabled class="form_select_option" value="">Selecione</option>
										<option value="100mb" class="form_select_option">100mb</option>
										<option value="200mb" class="form_select_option">200mb</option>
										<option value="400mb" class="form_select_option">400mb</option>

									</select>

								</div>

								<div class="form_grupo">

									<label for="vencimento" class="text">Dia de Vencimento</label>
									<select name="vencimento" id="editvencimento" class="dropdown">

										<option selected disabled class="form_select_option" value="">Selecione</option>
										<option value="08" class="form_select_option">08</option>
										<option value="17" class="form_select_option">17</option>
										<option value="30" class="form_select_option">30</option>

									</select>

								</div>
								<span id="msgAlertaErroEdit"></span>
								<div class="form_message">

									<label for="observacao" class="form_message_label"> Observação:</label>
									<textarea name="observacao" id="editobservacao" cols="30" rows="3" autocomplete="off" maxlength="400" class="form_input message_input"></textarea>

								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
									<input type="submit" name="submit" class="btn btn-warning btn-sm" id="edit-cliente-btn" value="Salvar" />
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<?php

			$query_total_clientes = "SELECT COUNT(id) AS qtd_clientes FROM contato";
			$result_total_clientes = $conexao->prepare($query_total_clientes);
			$result_total_clientes->execute();

			$row_total_clientes = $result_total_clientes->fetch(PDO::FETCH_ASSOC);
			?>

			<div class="main-content">
				<div class="row">
					<div class="col-md-12">
						<div class="table-wrapper">
							<div class="table-title">
								<div class="row">
									<div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
										<h2 class="ml-lg-2">Lista de Clientes</h2>
									</div>
									<div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
										<a href="#adicionarClienteModal" type="button" class="btn btn-success" data-toggle="modal">
											<i class="material-icons">&#xe7fe;</i>
											<span>Adicionar Cliente</span></a>

										<a href="visualizar-contato.php" type="button" class="btn btn-info">
											<?php if ($row_total_clientes['qtd_clientes'] == 0)
												echo "Caixa de Contatos Vazia <i class='material-icons'>&#xe510;</i>";
											elseif ($row_total_clientes['qtd_clientes'] == 1)
												echo $row_total_clientes['qtd_clientes'], " Contato recebido! <i class='material-icons'>&#xe174;</i>";
											else
												echo $row_total_clientes['qtd_clientes'], " Contatos recebidos! <i class='material-icons'>&#xe7ef;</i>";
											?></a>
									</div>
								</div>
							</div>
						</div>

						<?php

						// Asessa o 'if' quando existir a variaval global
						if (isset($_SESSION['msg'])) {

							// Imprimi a mensagem da variavel global
							echo $_SESSION['msg'];

							// Destroi a variavel global
							unset($_SESSION['msg']);
						}

						// buscar 
						if (!empty($_GET['buscar'])) {

							$data = $_GET['buscar'];

							$data = "%" . $data . "%";


							$query_buscar = "SELECT cod, nome, telefone, email, DATE_FORMAT(data_cadastro, '%d/%m/%Y %H:%i') AS data_formatada FROM clientes WHERE nome LIKE :nome ORDER BY nome ASC";
							$resultado_buscar = $conexao->prepare($query_buscar);
							$resultado_buscar->bindParam(':nome', $data, PDO::PARAM_STR);
							$resultado_buscar->execute();

							if (($resultado_buscar) and ($resultado_buscar->rowCount() == 0)) {
								echo "<div class='alert alert-danger' role='alert'>Cliente não encontrado!
								</div>";
							}
						?><table class='table table-striped'>
								<?php
								echo "<thead class='thead'>
								<tr>
									<th></th>
									<th>Nome</th>
									<th>Telefone</th>
									<th>Email</th>
									<th>Cadastro<th>
									<th>Opções</th>
								</tr>
							</thead>
							<tbody>";

								while ($row_buscar = $resultado_buscar->fetch(PDO::FETCH_ASSOC)) {
									extract($row_buscar);

									echo "<tr>
								<td></td>
								<td>$nome</td>
								<td>$telefone</td>
								<td>$email</td>
								<td>$data_formatada<td>
								<td>

								<a href='visualizar-cliente.php?id=$cod' class='encode'>
								<i class='material-icons' data-toggle='tooltip' title='Visualizar'>&#xe8f4;</i></a>
								
								<a href='#' id='$cod' class='encode' onclick='editarCliente($cod)'>
								  <i class='material-icons' data-toggle='tooltip' title='Editar'>&#xe254;</i></a>
								
								<a href='#' id='$cod' class='encode' onclick='deleteCliente($cod)'>
								  <i class='material-icons' data-toggle='tooltip' title='Apagar'>&#xe872;</i></a>
													
							</tr>";
								}

								"</tbody>"
								?>
							</table>



						<?php

						} else { ?>
							<!-- Visualizar clientes inicio -->
							<span class="listar-clientes"></span>
						<?php
						}
						?>
						<!-- Visualizar clientes final -->

					</div>
				</div>
			</div>
		</div>
	</div>


	<!----------------------------------------- Modal / perfil do Usuario ------------------------------------------>

	<div class="modal fade" id="perfilUserModal" tabindex="-1" aria-labelledby="perfilUserModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="perfilUserModalLabel"><strong>Meus Dados</strong></h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span class="material-icons">&#xe5c9;</span>
					</button>
				</div>

				<div class="modal-body">

					<dl class="row">
						<dt class="col-sm-3">Nome</dt>
						<dd class="col-sm-9"><?php echo $usuario ?></dd>
					</dl>

					<dl class="row">
						<dt class="col-sm-3">Login</dt>
						<dd class="col-sm-9"><?php echo $login_usuario ?></dd>
					</dl>

					<dl class="row">
						<dt class="col-sm-3">Email</dt>
						<dd class="col-sm-9"><?php echo $email ?></dd>
					</dl>

				</div>
				<div class="modal-footer">
					<!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button> -->
				</div>
			</div>
		</div>
	</div>


	<!----------------------------------------- Modal / Alterar senha do Usuario ------------------------------------------>


	<div class="modal fade" id="altSenhaModal" tabindex="-1" aria-labelledby="altSenhaModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="altSenhaModalLabel"><strong>Meus Dados</strong></h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span class="material-icons">&#xe5c9;</span>
					</button>
				</div>

				<div class="modal-boby">

					<form id="alt-senha-user-form" class="form">

						<span id="msgAlertaErroAlt"></span>

						<div class="mb-33">
							<label for="altId" class="form-label"></label>
							<input type="hidden" name="id" id="altId">
						</div>

						<div class="mb-33">
							<label for="novaSenha" class="form-label">Nova Senha</label>
							<input type="text" class="form-control" name="senha" id="altSenha" autocomplete="off" maxlength="8">
						</div>

						<div class="mb-33">
							<label for="novaSenha" class="form-label">Repita a Senha</label>
							<input type="text" class="form-control" name="repsenha" id="repSenha" autocomplete="off" maxlength="8">
						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
							<input type="submit" class="btn btn-success btn-sm" id="alt-senha-btn" value="Alterar Senha" />
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


	<!----footer-inicio------------->
	<?php
	include_once "./include/footer.php"
	?>
	<!----footer-fim---------------->

	<!------main-content-end----------->


	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/custom.js"></script>
	<script src="jS/mascara.js"></script>
	<script src="js/cpf-valida.js"></script>
	<script src="js/cep.valida.js"></script>


</body>


</html>