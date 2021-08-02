<?php
//Atualizado em 10.11.2016.
$nome=$_POST['inputNome'];
$cpf=$_POST['inputCpf'];
$email=$_POST['inputEmail'];
$dataNascimento=$_POST['inputdataNascimento'];
$senha=$_POST['inputSenha'];
$sexo = $_POST['inputSexo'];
$Qualificacoes = $_POST['inputQualificacoes'];


$ddi= $_POST ['inputDdi'];
$ddd= $_POST ['inputDdd'];
$numero= $_POST ['inputNumero'];

$cep=$_POST ['inputcep'];
$uf=$_POST ['inputuf'];
$cidade=$_POST ['inputcidade'];
$bairro=$_POST ['inputbairro'];
$logradouro=$_POST ['inputlogradouro'];
$complemento=$_POST ['inputcomplemento'];


require_once '../Modelo/classeCoordenador.php';
require_once '../Modelo/classeEndereco.php';
require_once '../Modelo/classeTelefone.php';
require_once '../Modelo/DAO/classeCoordenadorDAO.php';


$novoCoordenador = new classeCoordenador();
$novoCoordenador->setNome($nome);
$novoCoordenador->setCpf($cpf);
$novoCoordenador->setEmail($email);
$novoCoordenador->setDataNascimento($dataNascimento);
$novoCoordenador->setSenha($senha);
$novoCoordenador->setSexo($sexo);
$novoCoordenador->setQualificacao($Qualificacoes);

$novoTelefone = new classeTelefone();
$novoTelefone->setDdi($ddi);
$novoTelefone->setDdd($ddd);
$novoTelefone->setNumero($numero);

$novoEndereco = new classeEndereco();
$novoEndereco->setCep($cep);
$novoEndereco->setUf($uf);
$novoEndereco->setCidade($cidade);
$novoEndereco->setBairro($bairro);
$novoEndereco->setLogradouro($logradouro);
$novoEndereco->setComplemento($complemento);

$novoCoordenadorDAO = new classeCoordenadorDAO();
$cadastrar = $novoCoordenadorDAO->cadastrarCoordenador($novoCoordenador, $novoEndereco, $novoTelefone);
if ($cadastrar == FALSE) {
    echo "<script>alert('Erro no Cadastro');
                        window.location.href='../Visao/formCadastroCoordenador.php';
                        </script>";
} else {
    echo "<script>alert('Cadastrado com Sucesso');
                        window.location.href='controladorListarCoordenador.php';
                        </script>";
}
?>
    

<!--echo 'Nome da Professor: ' . $novoProfessor->getNome();

echo '<br/>';

echo 'Email da Professor: ' . $novoProfessor->getEmail();

echo '<br/>';

echo 'Cargo da Professor: '. $novoProfessor->getCargo();

echo '<br/>';

echo 'Endereço da Professor: ' . $novoProfessor->getEndereço();

echo '<br/>';

echo 'Telefone da Professor: ' . $novoProfessor->getTelefone();

echo '<br/>';


?>