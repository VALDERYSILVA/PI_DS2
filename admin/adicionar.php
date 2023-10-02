<?php

include_once "configuracao/conexao.php";


$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (empty($dados['nome'])) {
  $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário informar o nome!</div>"];
} elseif (empty($dados['cpf'])) {
  $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário Informar o CPF!</div>"];
} elseif (empty($dados['rg'])) {
  $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário Informar um número de documento de identificação!</div>"];
} elseif (empty($dados['nascimento'])) {
  $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário Informar a data de nascimento correta!</div>"];
} elseif (empty($dados['telefone'])) {
  $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário Informar o número de telefone correro!</div>"];
} elseif (empty($dados['email'])) {
  $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário Informar o email corretamente!</div>"];
} elseif (empty($dados['cep'])) {
  $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário Informar CEP</div>"];
} elseif (empty($dados['numero'])) {
  $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário Informar o número da residência!</div>"];
} elseif (empty($dados['bairro'])) {
  $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário Informar o bairro!</div>"];
} elseif (empty($dados['cidade'])) {
  $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário Informar o cidade!</div>"];
} elseif (empty($dados['uf'])) {
  $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário Informar o estado!</div>"];
} elseif (empty($dados['senha'])) {
  $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário Informar a senha do usuário!</div>"];
} elseif (empty($dados['plano'])) {
  $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário Informar o plano!</div>"];
} elseif (empty($dados['vencimento'])) {
  $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Necessário Informar o vencimento!</div>"];
} else {

  $query_usuario = "INSERT INTO clientes (senha, plano, vencimento, nome, rg, cpf, nascimento,
  telefone, email, cep, logradouro, numero, complemento, bairro, cidade, uf, ibge, data_cadastro, observacao)
      VALUES ( :senha, :plano, :vencimento, :nome, :rg, :cpf, :nascimento, :telefone, :email, 
      :cep, :logradouro, :numero, :complemento, :bairro, :cidade, :uf, :ibge, now(), :observacao)";

  $cad_usuario = $conexao->prepare($query_usuario);

  $senha_hash = password_hash($dados['senha'], PASSWORD_DEFAULT);
  $cad_usuario->bindParam(':senha', $senha_hash);
  $cad_usuario->bindParam(':plano', $dados['plano']);
  $cad_usuario->bindParam(':vencimento', $dados['vencimento']);
  $cad_usuario->bindParam(':nome', $dados['nome']);
  $cad_usuario->bindParam(':rg', $dados['rg']);
  $cad_usuario->bindParam(':cpf', $dados['cpf']);
  $cad_usuario->bindParam(':nascimento', $dados['nascimento']);
  $cad_usuario->bindParam(':telefone', $dados['telefone']);
  $cad_usuario->bindParam(':email', $dados['email']);
  $cad_usuario->bindParam(':cep', $dados['cep']);
  $cad_usuario->bindParam(':logradouro', $dados['logradouro']);
  $cad_usuario->bindParam(':numero', $dados['numero']);
  $cad_usuario->bindParam(':complemento', $dados['complemento']);
  $cad_usuario->bindParam(':bairro', $dados['bairro']);
  $cad_usuario->bindParam(':cidade', $dados['cidade']);
  $cad_usuario->bindParam(':uf', $dados['uf']);
  $cad_usuario->bindParam(':ibge', $dados['ibge']);
  $cad_usuario->bindParam(':observacao', $dados['observacao']);
  $cad_usuario->execute();

  if ($cad_usuario->rowCount()) {
    $retorna = ['erro' => false, 'msg' => "<div class='alert alert-success' role='alert'>Cliente cadastrado com sucesso!</div>"];
  } else {
    $retorna = ['erro' => true, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Cliente não cadastrado!</div>"];
  }
}

echo json_encode($retorna);
