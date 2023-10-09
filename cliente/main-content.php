<?php include_once('configuracao/select.php'); ?>


<div class="main-content">
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6">
			<div class="card card-stats">
				<div class="card-header">
					<div class="icon icon-success">
						<span class="material-icons">&#xe63e;</span>
					</div>
				</div>
				<div class="card-content">
					<h5 class="category"><strong>Serviço Contratado</strong></h5>
					<p class="card-title"><?php echo "Plano ", $plano ?></p>
					<p class="card-title"><?php echo "Vencimento ", $vencimento ?></p>
					<p class="card-title"><?php echo " " ?></p>
				</div>
				<div class="card-footer">
					<div class="stats">
						<i class="material-icons text-info">&#xe73c;</i>
						<a href="https://wa.me/5581986271986?text=Olá! Gostaria de alterar meu plano" target="_blank" rel="noopener">Alterar Plano</a>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-sm-6">
			<div class="card card-stats">
				<div class="card-header">
					<div class="icon icon-info">
						<span class="material-icons">&#xe2c9;</span>
					</div>
				</div>
				<div class="card-content">
					<h5 class="category"><strong>Meus Dados</strong></h5>
					<p class="card-title"><?php echo $telefone ?></p>
					<p class="card-title"><?php echo $email ?></p>
				</div>
				<div class="card-footer">
					<div class="stats">
						<i class="material-icons text-info">&#xe873;</i>
						<a href="#">Visualizar Dados</a>
					</div>
				</div>
			</div>
		</div>

	</div>



	<!---row-second----->

	<div class="row">
		<div class="col-lg-7 col-md-12">
			<div class="card" style="min-height:485px">
				<div class="card-header card-header-text">
					<h4 class="card-title">Minhas Faturas</h4>
				</div>
				<div class="card-content table-responsive">
					<table class="table table-hover">
						<thead class="text-primary">
							<tr>
								<th><strong>Vencimento</strong></th>
								<th><strong>Pagamento</strong></th>
								<th><strong>Valor</strong></th>
								<th><strong>Valor Pago</strong></th>
								<th><strong>Status</strong></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>17/08/2023</td>
								<td>15/08/2023</td>
								<td>R$ 60,00</td>
								<td>R$ 60,00</td>
								<td>
									<div class="icon icon-success">
										<span class="material-icons">&#xe5ca;</span>
									</div>
								</td>
							</tr>

							<tr>
								<td>17/07/2023</td>
								<td>17/07/2023</td>
								<td>R$ 60,00</td>
								<td>R$ 60,00</td>
								<td>
									<div class="icon icon-success">
										<span class="material-icons">&#xe5ca;</span>
									</div>
								</td>
							</tr>

							<tr>
								<td>17/06/2023</td>
								<td>17/06/2023</td>
								<td>R$ 60,00</td>
								<td>R$ 60,00</td>
								<td>
									<div class="icon icon-success">
										<span class="material-icons">&#xe5ca;</span>
									</div>
								</td>
							</tr>

							<tr>
								<td>17/05/2023</td>
								<td>15/05/2023</td>
								<td>R$ 60,00</td>
								<td>R$ 60,00</td>
								<td>
									<div class="icon icon-success">
										<span class="material-icons">&#xe5ca;</span>
									</div>
								</td>
							</tr>

							<tr>
								<td>17/04/2023</td>
								<td>14/04/2023</td>
								<td>R$ 60,00</td>
								<td>R$ 60,00</td>
								<td>
									<div class="icon icon-success">
										<span class="material-icons">&#xe5ca;</span>
									</div>
								</td>
							</tr>

						</tbody>
					</table>
				</div>
			</div>
			<div>
			</div>

		</div>

		<div class="col-lg-5 col-md-12">
			<div class="card" style="min-height:485">
				<div class="card-header card-header-text">
					<h4 class="card-title">Últimos Acessos</h4>
				</div>

				<div class="card-content table-responsive">
					<table class="table table-hover">
						<thead class="text-primary">
							<tr>
								<th><strong>Data</strong></th>
								<th><strong>Tempo</strong></th>
								<th><strong>Tráfego</strong></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>08/10/2023 13:33:46</td>
								<td>20:02:08</td>
								<td>1.43GB / 14.88GB</td>
							</tr>

							<tr>
								<td>07/10/2023 05:58:03</td>
								<td>10:33:33</td>
								<td>1016.64MB / 7.22GB</td>
							</tr>

							<tr>
								<td>06/10/2023 23:10:14</td>
								<td>03:02:06</td>
								<td>51.86MB / 1.88GB</td>
							</tr>

							<tr>
								<td>01/10/2023 22:35:58</td>
								<td>47:02:08</td>
								<td>1.43GB / 28.65GB</td>
							</tr>

							<tr>
								<td>28/09/2023 05:58:03</td>
								<td>14:33:33</td>
								<td>2.35GB / 12.42GB</td>
							</tr>

							<tr>
								<td>25/09/2023 10:17:18</td>
								<td>08:35:08</td>
								<td>1.55GB / 9.15GB</td>
							</tr>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>