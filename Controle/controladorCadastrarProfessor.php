<?php
//Atualizado em 10.11.2016.
$nome = $_POST ['inputNome'];
$dataNascimento = $_POST ['inputdataNascimento'];
$sexo = $_POST ['inputSexo'];
$cpf = $_POST ['inputCpf'];
$email= $_POST ['inputEmail'];
$disciplina= $_POST ['inputdisciplina'];
$senha= $_POST ['inputSenha'];

$ddi= $_POST ['inputDdi'];
$ddd= $_POST ['inputDdd'];
$numero= $_POST ['inputNumero'];

$cep=$_POST ['inputCep'];
$uf=$_POST ['inputUf'];
$cidade=$_POST ['inputCidade'];
$bairro=$_POST ['inputBairro'];
$logradouro=$_POST ['inputLogradouro'];
$complemento=$_POST ['inputComplemento'];




require_once '../Modelo/classeProfessor.php';
require_once '../Modelo/classetelefone.php';
require_once '../Modelo/classeEndereco.php';
require_once '../Modelo/DAO/classeProfessorDAO.php';

$novoProfessor = new classeProfessor();
$novoEndereco = new classeEndereco();
$novoTelefone = new classeTelefone();

$novoProfessor->setNome($nome);
$novoProfessor->setDataNascimento($dataNascimento);
$novoProfessor->setSexo($sexo);
$novoProfessor->setCpf($cpf);
$novoProfessor->setEmail($email);
$novoProfessor->setDisciplina($disciplina);
$novoProfessor->setSenha($senha);

$novoTelefone->setDdi($ddi);
$novoTelefone->setDdd($ddd);
$novoTelefone->setNumero($numero);


$novoEndereco->setCep($cep);
$novoEndereco->setUf($uf);
$novoEndereco->setCidade($cidade);
$novoEndereco->setBairro($bairro);
$novoEndereco->setLogradouro($logradouro);
$novoEndereco->setComplemento($complemento);


$novoProfessorDAO = new classeProfessorDAO();
$idProfessorInserido = $novoProfessorDAO->cadastrarProfessor($novoProfessor, $novoEndereco, $novoTelefone);
if ($idProfessorInserido == FALSE) {
//    echo "<script>alert('Erro no Cadastro');
//                        window.location.href='../Visao/formCadastroProfessor.php';
//                        </script>";
} else {
    echo "<script>alert('Cadastrado com Sucesso');
                        window.location.href='controladorListarProfessor.php';
                        </script>";
}
?>


<!--echo 'Nome do Professor: ' .$novoProfessor->getNome();

echo '<br/>';

echo 'CPF dO Professor: ' .$novoProfessor->getCPF();

echo '<br/>';

//echo 'Cargo do Profissional: '.$novoProfessor->getCargo();

echo '<br/>';

echo 'Telefone do Profissionaql: ' .$novoProfessor->getTelefone();

echo '<br/>';

echo 'Especializacao do Profissional:' .$novoProfessor->getEspecialização();

echo '<br/>';

echo 'Endereço do Professor: ' .$novoProfessor->getEndereço();

echo '<br/>';

echo 'Email do Professor:' .$novoProfessor->getemail();

echo '<br/>';

?>