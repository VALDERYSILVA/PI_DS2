<?php

include_once "configuracao/conexao.php";


$pagina = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);

if (!empty($pagina)) {

    //calcular o inicio da visualização
    $qtd_resultados_pag = 7; // quantidade de registro por pagina
    $inicio = ($pagina * $qtd_resultados_pag) - $qtd_resultados_pag;


    // consultar no banco de dados

    $query_clientes = "SELECT cod, nome, telefone, email, DATE_FORMAT(data_cadastro, '%d/%m/%Y %H:%i') AS data_formatada FROM clientes ORDER BY cod DESC LIMIT $inicio, $qtd_resultados_pag";
    $resultado_cliente = $conexao->prepare($query_clientes);
    $resultado_cliente->execute();

    $dados = "<table class='table table-striped'>
    <thead class='thead'>
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
    while ($row_cliente = $resultado_cliente->fetch(PDO::FETCH_ASSOC)) {
        extract($row_cliente);
        $dados .= "<tr>
                    <td></td>
                    <td>$nome</td>
                    <td>$telefone</td>
                    <td>$email</td>
                    <td>$data_formatada<td>
                    <td>
                   
                    <a href='visualizar-cliente.php?id=$cod' class='encode'>
                    <i class='material-icons' data-toggle='tooltip' title='Visualizar'>&#xe8f4;</i></a>
                    
                    <a href='#' id='$cod' class='encode' onclick='editarCliente($cod)'>
                      <i class='material-icons' data-toggle='tooltip' title='Editar'>&#xE254;</i></a>
                    
                    <a href='#' id='$cod' class='encode' onclick='deleteCliente($cod)'>
                      <i class='material-icons' data-toggle='tooltip' title='Apagar'>&#xE872;</i></a>
                                        
                </tr>";
    }

    $dados .= "</tbody>
		</table>
    </div>";

    //Paginação = Somar a quantidade de clientes
    $query_pag = "SELECT COUNT(cod) AS num_result FROM clientes";
    $result_pag = $conexao->prepare($query_pag);
    $result_pag->execute();
    $row_pag = $result_pag->fetch(PDO::FETCH_ASSOC);

    //Quantidade de paginas
    $qtd_pagina = ceil($row_pag['num_result'] / $qtd_resultados_pag);

    $max_link = 2;

    $dados .= '<nav aria-label="Page navigation"><ul class="pagination pagination-sm justify-content">';

    $dados .= "<li class='page-item'><a href='#' class='page-link' title='Primeira página' onclick='listarUsuarios(1)' >Primeira</a></li>";


    for ($pag_ant = $pagina - $max_link; $pag_ant <= $pagina - 1; $pag_ant++) {
        if ($pag_ant >= 1) {
            $dados .= "<li class='page-item'><a class='page-link' href='#' title='Página $pag_ant' onclick='listarUsuarios($pag_ant)' >$pag_ant</a></li>";
        }
    }

    $dados .= "<li class='page-item active'><a class='page-link' title='Página $pagina' href='#'>$pagina</a></li>";

    for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_link; $pag_dep++) {
        if ($pag_dep <= $qtd_pagina) {
            $dados .= "<li class='page-item'><a class='page-link' href='#' title='Página $pag_dep' onclick='listarUsuarios($pag_dep)' >$pag_dep</a></li>";
        }
    }


    $dados .= "<li class='page-item'><a class='page-link' href='#' title='Última página' onclick='listarUsuarios($qtd_pagina)' >Última</a></li>";
    $dados .= '</ul></nav>';

    echo $dados;
} else {

    echo "<div class='alert alert-danger' role='alert'>Erro: Nenhum cliente encontrado!</div>";
}
