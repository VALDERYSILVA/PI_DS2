<?php

setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-9', 'pt_BR.utf-8', 'portuguese');
$data = strftime("%d %B de %Y", time());

session_start();
ob_start();

require_once 'configuracao/conexao.php';

if ((!isset($_SESSION['cod'])) and (!isset($_SESSION['cpf'])) and (!isset($_SESSION['senha']))) {
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Necessário realizar login!</div>";
    header("Location: login.php");
};

//Autoload do Composer
require 'vendor/autoload.php';

// Receber o id enviado na URL
$cod = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);


$query_cliente = "SELECT cod, senha, plano, vencimento, nome, rg, cpf, 
DATE_FORMAT(nascimento, '%d/%m/%Y') AS nascimento_br, telefone, email, cep, logradouro, numero, complemento, bairro, data_cadastro, 
cidade, uf ,ibge, observacao FROM clientes WHERE cod =:cod LIMIT 1";
$resul_cliente = $conexao->prepare($query_cliente);
$resul_cliente->bindParam(':cod', $cod);
$resul_cliente->execute();


$dados = "<!DOCTYPE html>";
$dados .= "<html lang='pt-BR'>";
$dados .= "<head>";
$dados .= "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
$dados .= "<title>Contrato APC Tecnologia</title>";
$dados .= "<link rel='stylesheet' type='text/css' href='http://localhost/cliente/css/contrato.css'>";
$dados .= "</head>";
$dados .= "<body>";
$dados .= "<div class='text'>";
$dados .= "<p class='titulo'><strong>Contrato de Prestação de Serviços de Conexão à Internet</strong></p>";

if (($resul_cliente) and ($resul_cliente->rowCount() != 0)) {
    $row_cliente = $resul_cliente->fetch(PDO::FETCH_ASSOC);
    // var_dump($row_cliente);

    // Extrair o array para imprimir os valores através da chave do array
    extract($row_cliente);
}

$dados .= "<img class='logo' src='http://localhost/imagens/logo.jpeg'><br>";

$dados .= "<p class='texto'><strong>APC Tecnologia</strong>, inscrita no CNPJ. sob nº 51.391.884/0001-93, Localizada na Av. 
Antonio Cabral de Souza, 7392 Loja H - Loteamento Conceição - Paulista - PE, doravante designada simplesmente CONTRATADA 
e <strong>$nome</strong>, residente à $logradouro, $numero - $bairro - $cidade - $uf, CPF $cpf, doravante denominado simplesmente 
CONTRATANTE, celebram o presente Contrato de Prestação de Serviços que se regerá pelas seguintes cláusulas e condições:
<br><br><hr></p>";

$dados .= "<p class='texto'><strong>1. OBJETO</strong>
<br><br>
O objeto do presente contrato é a prestação, pela CONTRATADA ao CONTRATANTE, os serviços de conexão à rede mundial de 
computadores INTERNET, através, de Rede a Cabo Fibra Óptica<br><br><hr></p>";

$dados .= "<p class='texto'><strong>2. DO COMODATO</strong> 
<br><br>
2.1 - Para tornar viável a prestação de serviço objeto do presente contrato, a CONTRATADA cederá a título de COMODATO 
os direitos de uso e gozo dos equipamentos descritos abaixo devendo ser utilizados exclusivamente para a execução dos 
serviços ora contratados no Contrato de Prestação de Serviços de Conexão à Internet, e serão instalados no endereço 
indicado pelo CONTRATANTE.
<br><br>

2.2 - É de responsabilidade do CONTRATANTE providenciar e fornecer toda a infraestrutura necessária e condições apropriadas 
para instalação dos equipamentos supracitados, bem como ponto de energia elétrica com aterramento adequado e obtendo, se 
necessário, autorização para instalação dos equipamentos no local (residência, condomínio e/ou edifício), ou outra edificação, 
sem qualquer ônus para a CONTRATADA, tais como aluguéis, energia elétrica, etc. Cabe ainda ao CONTRATANTE, obter do síndico 
do condomínio ou dos demais condôminos, sempre que necessário for, a autorização para ligação dos sinais e para realização 
das obras referidas.
<br><br>

2.3 - É de responsabilidade do CONTRATANTE usar e administrar os equipamentos como se próprios fossem, obrigando-se a 
mantê-los em perfeitas condições de uso e conservação, comprometendo-se, pela guarda, preservação e integridade dos mesmos 
até a efetiva restituição à CONTRATADA, pois tais equipamentos são insuscetíveis de penhor, arresto e outras medidas de 
execução e ressarcimento, de exigibilidade que contra o CONTRATANTE sejam promovidos, não podendo, cedê-los ou transferi-los 
a qualquer título a terceiros, ou ainda alugar, sem prévia autorização escrita da CONTRATADA, sob pena de responder por perdas 
e danos.
<br><br>

2.4 - O CONTRATANTE deverá manter a instalação dos equipamentos da presente cessão em comodato nos locais adequados e indicados 
pela CONTRATADA, observadas as condições da rede elétrica, bem como condições técnicas necessárias ao correto funcionamento 
dos equipamentos.
<br><br>

2.5 - O CONTRATANTE deverá permitir que somente pessoas habilitadas e técnicos autorizados pela CONTRATADA tenham acesso ao 
manuseio dos equipamentos sempre que necessário, verificando a observância das normas de utilização.
<br><br>

2.6 - O CONTRATANTE não poderá prestar por si ou por intermédio de terceiros não credenciados, reparos ou consertos nos 
equipamentos. Para reparo ou configuração dos equipamentos, quaisquer falhas no desempenho dos equipamentos observadas deverão 
ser comunicadas pelo CONTRATANTE com a maior brevidade possível à CONTRATADA.
<br><br>

2.7 - O CONTRATANTE deverá restituir (entregar/devolver) todos os bens à PRESTADORA caso haja rescisão por quaisquer motivos do 
Contrato de Prestação de Serviços no prazo máximo de até 15 (quinze) dias.
<br><br>

2.8 - O CONTRATANTE declara estar ciente da obrigatoriedade da restituição dos equipamentos cedidos a título de COMODATO. 
Declara, ainda, que deve comunicar à CONTRATADA sobre a impossibilidade da devolução dos mesmos no endereço da empresa, 
ensejando, dessa forma, o agendamento para a retirada por parte da CONTRATADA dos equipamentos. Dessa forma, o CONTRATANTE 
deverá ter disponibilidade para receber os técnicos, ou designar outrem para que se faça a efetiva retirada dos equipamentos. 
Em caso de a visita dos técnicos da CONTRATADA restar infrutífera, o CONTRATANTE será notificado no ato, da tentativa de 
retirada, constando dia/hora da visita e o próximo retorno para a retirada. Caso o CONTRATANTE novamente não esteja presente 
no endereço no dia e período estipulado para proceder a retirada ou não tenha designado outra pessoa que o faça, ou ainda, 
tenha transferido seu  domicílio sem informar a CONTRATADA, a local fora de sua área de atuação/cobertura da empresa, sem a 
devolução dos equipamentos, o CONTRATANTE autoriza desde já que a CONTRATADA emita automaticamente, independente de qualquer 
modalidade de notificação, fatura de cobrança calculada sobre o valor atualizado total dos bens no mercado, podendo ainda a 
CONTRATADA utilizar de meios legais cabíveis para resolução da avença, todas as despesas daí decorrentes, serão suportadas 
pelo CONTRATANTE como as despesas de deslocamento, alimentação, cópias de documentos, conferências telefônicas, enfim as 
despesas que se fizerem necessárias.
<br><br>

2.9 - Em se tratando das hipóteses de dano, depreciação por mau uso, perda/extravio, furto ou roubo dos referidos equipamentos 
em comodato, o CONTRATANTE também deverá restituir à CONTRATADA pelas perdas ou danos, no valor total dos bens à época do fato, 
observando o valor de mercado, que será cobrado na mesma forma do item acima.
<br><br>

2.10 - O(s) equipamento(s) cedido(s) em COMODATO que está(ão) relacionado(s) será  a ONU/ONT de número MAC/Serial:  XXXXXXXXXXXXX
<br><br><hr>
</p>";

$dados .= "<p class='texto'><strong>3. DISPONIBILIDADE DO SERVIÇO</strong>
<br><br>

3.1 - O serviço estará disponível 24 (vinte e quatro) horas por dia, 7 (sete) dias por semana, ressalvada a ocorrência de 
interrupções devido a: 
<br><br>

a) falta de fornecimento de energia elétrica para a CONTRATADA;
<br><br>

b) falha dos serviços de responsabilidade da operadora de serviços telefônicos; 
<br><br>

c) ocorrências de falhas no sistema de transmissão no acesso à Internet;
<br><br>

d) manutenção técnica dos equipamentos e/ou operacionais que exijam o desligamento temporário do sistema de transmissão de 
dados; 
<br><br>

e) ação de terceiros que impeça a prestação dos serviços e
<br><br>

f) casos fortuitos ou força maior. 
<br><br>

g) A interrupção na prestação dos serviços, pelos motivos relacionados acima, que ultrapassarem tempo superior a 72 
(setenta e duas) horas consecutivas, será descontado proporcionalmente os valores referentes a esse período de paralisação.
<br><br><hr>
</p>";

$dados .= "<p class='texto'><strong>4. TAXA DE INSTALAÇÃO E PRAZO DE VIGÊNCIA</strong>
<br><br>

A instalação do serviço denominado internet tem um custo de inscrição declarado depois de feita viabilidade para levar o 
acesso a internet até o equipamento roteador do CONTRATANTE. 
<br><br>

4.1 - O cliente poderá bloquear a assinatura por 30 dias. Caso ultrapasse esse limite para desbloqueá-lo, o cliente pagará 
uma taxa de adesão acordada com a CONTRATADA.
<br><br>

4.2 - Não há prazo mínimo de vigência do presente CONTRATO.
<br><br><hr>
</p>";

$dados .= "<p class='texto'><strong>5. PAGAMENTO E REAJUSTE</strong>  
<br><br>

5.1 - O pagamento pela utilização do serviço será realizado mensalmente à vencer, o dia do vencimento será o que consta no 
objeto de cobrança, incluindo tributos e demais encargos conforme a legislação em vigor.
<br><br>

5.2 - O não pagamento no vencimento sujeitará o usuário, a exclusivo critério da CONTRATADA, independentemente de notificação 
judicial ou extrajudicial, na suspensão da prestação dos serviços. 
<br><br>

* A suspensão dos serviços por falta de pagamento, não implica no cancelamento ou suspensão do respectivo contrato.
<br><br>

5.3 - O preço contratado será reajustado anualmente, ou em prazo inferior que vier a ser admitido pela legislação aplicável. 
<br><br>

5.4 - Estes valores também poderão ser revistos, a qualquer tempo, para o resgate do inicial equilíbrio econômico-financeiro 
necessário à prestação dos Serviços ou em caso de modificações do regime tributário vigente.
<br><br>

5.5 - O atraso no pagamento da mensalidade nos prazos e pelos valores ajustados, será cobrado juros de mora de 2,00% + 0,033% 
por dia sobre os valores devidos e não pagos. 
<br><br>

5.6 - O não pagamento de qualquer parcela devida pela contratante dará a CONTRATADA o direito de interromper a prestação do 
serviço de acesso do usuário, até a efetivação do pagamento, independente de aviso prévio.
<br><br><hr>
</p>";

$dados .= "<p class='texto'><strong>6. FORMA DE UTILIZAÇÃO DOS SERVIÇOS</strong>
<br><br>

6.1 - Ao contratar os serviços o CONTRATANTE se obriga a respeitar a legislação em vigor de utilização da rede Internet, 
devendo abster-se de: 
<br><br>

a) acessar senhas, modificar dados privativos, arquivos ou assumir identidade de terceiros;
<br><br>

b) desrespeitar leis de direito autoral e de propriedade intelectual; 
<br><br>

c) transmitir ou armazenar qualquer tipo de material cujo conteúdo infrinja a Lei em vigor, relacionado com drogas, crianças e 
adolescentes em cena de sexo explícito ou pornografia;
<br><br>

d) divulgar informações falsas ou incompletas de caráter sigiloso; 
<br><br>

e) prejudicar usuários da INTERNET, através do uso de programas, acessando computadores, alterando arquivos, programas e dados 
existentes na rede;
<br><br>

f) estimular a prática de condutas ilícitas ou contrárias à moral e aos bons costumes, bem como, atos discriminatórios de 
cunho sexual, racial, religioso ou qualquer outra condição. 
<br><br>

g) Divulgar ou anunciar produtos e serviços através de correio eletrônico, salvo nos acasos de expressa do destinatário a 
CONTRATADA.
<br><br>

6.2 - A CONTRATADA poderá, sem qualquer aviso prévio, suspender ou impedir a divulgação de material, quando for considerado 
ilegal, impróprio ou determinado por autoridade Federal, Estadual ou Municipal, comunicando o fato imediatamente ao 
CONTRATANTE. 
<br><br>

6.3 - Cabe exclusivamente ao usuário a aquisição dos equipamentos, e manutenção<sup>1</sup>, terminais e suas interfaces com as redes de 
telecomunicação, necessários à utilização dos serviços.
<br><br>

6.4 - Quaisquer alterações nas condições da prestação dos serviços serão previamente comunicadas ao CONTRATANTE, sempre que 
for possível.
<br></p>";

$dados .= "<p class='obs_direita'><sup>(1)</sup>Apenas para equipamentos adquiridos por terceiros.
<br><hr>
</p>";

$dados .= "<p class='texto'><strong>7. RISCOS NA UTILIZAÇÃO DA INTERNET</strong>
<br><br>

7.1 - A CONTRATADA não se responsabilizará por qualquer dano ou prejuízo direto ou indireto que o CONTRATANTE venha a sofrer, 
ou que cause a terceiros, como consequência da utilização da INTERNET. Perda total ou parcial de informações, arquivos ou de 
programas contaminados por vírus, clonagem ou cópia do número de cartão de crédito, contas bancárias e suas respectivas senhas, 
fraude na compra de produtos e serviços pela Internet, como não entrega ou não prestação de serviços contratados. 
<br><br>

7.2 - É de exclusiva responsabilidade do CONTRATANTE prevenir-se dos riscos mencionados e de outros advindos da INTERNET.
<br><br><hr>
</p>";

$dados .= "<p class='texto'><strong>8. PRAZO E DA EXTINÇÃO DO PRESENTE CONTRATO</strong>
<br><br>

8.1 - O presente contrato é celebrado por prazo indeterminado. 
<br><br>

8.2 - O presente contrato poderá ser rescindido, de forma imediata e sem qualquer aviso prévio, sempre que uma das partes 
violar quaisquer dispositivos constantes neste instrumento ou contrária à legislação vigente.
<br><br><hr>
</p>";

$dados .= "<p class='texto'><strong>9. NORMAS APLICÁVEIS, FORO E DISPOSIÇÕES GERAIS</strong>
<br><br>

9.1 - O presente Contrato será regido pelas leis brasileiras, 
<br><br>

9.2 - O CONTRATANTE reconhece e declara que leu e que está ciente e de pleno acordo com todos os termos e condições deste 
contrato.
<br><br>

9.3 - Para dirimir toda e qualquer demandam envolvendo o presente contrato e seu objeto, ficam eleito o foro da Comarca de 
PAULISTA, com expressa renúncia de qualquer outro, por mais especial que seja.
<br><br>
</p>";

$dados .= "<br><br>";
$dados .= "<p class='data_direita'>Paulista, $data</p>";

$dados .= "</div>";
$dados .= "</body";

use Dompdf\Dompdf;
//use Dompdf\Options;

// instancia de options
// $options = new Options;
// $options->setChroot(__DIR__);

// instancia de Dompdf
$dompdf = new Dompdf(['enable_remote' => true]);

//Carreg o html pra dentro da classe
$dompdf->loadHtml($dados);

//Pagina
$dompdf->setPaper('A4', 'portrait');

// renderizar o arquivo em pdf
$dompdf->render();

// Download do arquivo
$dompdf->stream('Contrato.pdf', ['Attachment' => false]);
