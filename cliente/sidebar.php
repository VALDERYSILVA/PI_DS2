<?php

include_once('configuracao/select.php');

?>



<nav id="sidebar">
    <div class="sidebar-header">
        <h3><img src="img/logo.png" class="img-fluid" /><span>APC Tecnologia</span></h3>
    </div>
    <ul class="list-unstyled components">
        <li class="active">
            <a href="#" class="dashboard"><i class="material-icons">&#xe88a;</i><span>Início</span></a>
        </li>

        <?php

        echo "<li class='dropdown'>
            <a href='#homeSubmenu1' data-toggle='collapse' aria-expanded='false' class='dropdown-toggle'>

                <i class='material-icons'>&#xe873;</i><span>Meus Dados</span></a>
            <ul class='collapse list-unstyled menu' id='homeSubmenu1'>
                <li>
                    <a href='#' onclick='editarDados($cod)'>Atualizar Dados</a>
                </li>
                <li>
                    <a href='#' onclick='editarSenha($cod)'>Alterar Senha</a>
                </li>
            </ul>
        </li>"

        ?>

        <li class="dropdown">
            <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="material-icons">&#xe8ad;</i><span>Impressões</span></a>
            <ul class="collapse list-unstyled menu" id="pageSubmenu2">
                <li>
                    <a href="#">Contrato</a>
                </li>
                <li>
                    <a href="#">Declaração de Quitação</a>
                </li>
            </ul>
        </li>

        <li class="dropdown">
            <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="material-icons">&#xf0e2;</i>


                <span>Suporte</span></a>
            <ul class="collapse list-unstyled menu" id="pageSubmenu3">
                <li>
                    <a href="#">Chamados</a>
                </li>
                <li>
                    <a href="https://wa.me/5581986271986?text=Olá! Pode me ajudar? Meu nome é <?php echo $nome ?>, CPF <?php echo $cpf ?>" target="_blank" rel="noopener">Fale Conosco</a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#pageSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                <i class="material-icons">&#xe263;</i><span>Financeiro</span></a>
            <ul class="collapse list-unstyled menu" id="pageSubmenu4">
                <li>
                    <a href="#">2ª Via de Titulos</a>
                </li>
                <li>
                    <a href="#">Enviar Comprovante</a>
                </li>
                <li>
                    <a href="#">Promessa de Pagamento</a>
                </li>
            </ul>
        </li>

        <li class="">
            <a href="sair.php"><i class="material-icons">&#xe9ba;</i><span>Sair</span></a>
        </li>
    </ul>
</nav>

<!----------------------------------------- Modal / Atualizar Dados  ------------------------------------------>

<div class="modal fade" id="editarDadosModal" tabindex="-1" aria-labelledby="editarDadosModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="editarDadosModalLabel"><b>Atualizar Dados</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-boby">

                <form id="edit-dados-form" class="form">

                    <span id="msgAlertaErroEdit"></span>

                    <div class="mb-30">
                        <label for="cod" class="col-form-label"></label>
                        <input type="hidden" name="cod" id="editarCod">
                    </div>

                    <div class="mb-30">
                        <label for="telefone" class="col-form-label">Telefone</label>
                        <input type="text" class="form-control" name="telefone" id="editarTelefone" autocomplete="off" maxlength="14">
                    </div>

                    <div class="mb-30">
                        <label for="email" class="col-form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="editarEmail" autocomplete="off" maxlength="255">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                        <input type="submit" class="btn btn-success btn-sm" id="edit-dados-btn" value="Salvar" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!----------------------------------------- Modal / Alterar Senha  ------------------------------------------>

<div class="modal fade" id="altSenhaModal" tabindex="-1" aria-labelledby="altSenhaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5" id="altSenhaModalLabel"><b>Alterar Senha</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-boby">

                <form id="alt-senha-form" class="form">

                    <span id="msgAlertaErroAlt"></span>

                    <div class="mb-30">
                        <label for="altCod" class="col-form-label"></label>
                        <input type="hidden" name="cod" id="altCod">
                    </div>

                    <div class="mb-30">
                        <label for="novaSenha" class="col-form-label">Nova Senha</label>
                        <input type="text" class="form-control" name="senha" id="altSenha" autocomplete="off" maxlength="255">
                    </div>

                    <div class="mb-30">
                        <label for="novaSenha" class="col-form-label">Repita a Senha</label>
                        <input type="text" class="form-control" name="repsenha" id="repSenha" autocomplete="off" maxlength="255">
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