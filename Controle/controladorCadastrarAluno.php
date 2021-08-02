<?php

/* * ****
 * Upload de imagens
 * **** */

// verifica se foi enviado um arquivo


if (isset($_FILES['arquivo']['name']) && $_FILES['arquivo']['error'] == 0) {
    //Cria a pasta
    if (!is_dir("../Arquivos")):
        mkdir('../Arquivos/', 0744);
    endif;

    $nome = $_FILES['arquivo']['name'];

    // Pega a extensão
    $extensao = pathinfo($nome, PATHINFO_EXTENSION);
    // Converte a extensão para minúsculo
    $extensao = strtolower($extensao);

    //Tratamento do nome
    $nome = substr($_FILES['arquivo']['name'], 0, strrpos($_FILES['arquivo']['name'], "."));
    $nome = str_replace(' ', '', str_replace('.', '-', $nome));


//    echo 'Você enviou o arquivo: <strong>' . $nome . '</strong><br />';
//    echo 'Este arquivo é do tipo: <strong > ' . $_FILES['arquivo']['type'] . ' </strong ><br />';
//    echo 'Temporáriamente foi salvo em: <strong>' . $_FILES['arquivo']['tmp_name'] . '</strong><br />';
//    echo 'Seu tamanho é: <strong>' . $_FILES['arquivo']['size'] . '</strong> Bytes<br /><br />';

    $arquivo_tmp = $_FILES['arquivo']['tmp_name'];

    // Aqui eu enfileiro as extensões permitidas e separo por ';'
    // Isso serve apenas para eu poder pesquisar dentro desta String
    if (strstr('.jpg;.jpeg;.gif;.png;.txt;.doc;.ppt;.pdf;.zip', $extensao)) {
        // Cria um nome único para esta imagem
        // Evita que duplique as imagens no servidor.
        // Evita nomes com acentos, espaços e caracteres não alfanuméricos
        $arquivo = uniqid(time()) . "." . $extensao;

        // Concatena a pasta com o nome
        $destino = '../Arquivos/' . $arquivo;
//        // tenta mover o arquivo para o destino
        if (@move_uploaded_file($arquivo_tmp, $destino)) {
//            echo 'Arquivo salvo com sucesso em : <strong>' . $destino . '</strong><br />';
//            echo "<img src='$destino'/>";
        } else
            echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
    } else {
        echo "<script>alert('Formato de arquivo invalido');
                        window.location.href='../Visao/formCadastroAluno.php';
                        </script>";
        exit();
    }
} else
    $arquivo = NULL;



//Atualizado em 08.11.2016
$nome = $_POST ['inputNome'];
$sexo = $_POST ['inputSexo'];
$cpf = $_POST ['inputCpf'];
$email = $_POST['inputEmail'];
$matricula = $_POST ['inputMatricula'];
$dataNascimento = $_POST ['inputDataNascimento'];


$ddi = $_POST ['inputDdi'];
$ddd = $_POST ['inputDdd'];
$numero = $_POST ['inputNumero'];

$cep = $_POST ['inputCep'];
$uf = $_POST ['inputUf'];
$cidade = $_POST ['inputCidade'];
$bairro = $_POST ['inputBairro'];
$logradouro = $_POST ['inputLogradouro'];
$complemento = $_POST ['inputComplemento'];


require_once '../Modelo/classeAluno.php';
require_once '../Modelo/classeEndereco.php';
require_once '../Modelo/classeTelefone.php';
require_once '../Modelo/classeDiagnostico.php';
require_once '../Modelo/DAO/classeAlunoDAO.php';


$novoAluno = new classeAluno();
$novoTelefone = new classeTelefone();
$novoEndereco = new classeEndereco();

if (isset($arquivo)):
    $novoDiagnostico = new classeDiagnostico();
    $novoDiagnostico->setArquivo($arquivo);

else: $novoDiagnostico = null;
endif;

$novoAluno->setNome($nome);
$novoAluno->setSexo($sexo);
$novoAluno->setCpf($cpf);
$novoAluno->setEmail($email);
$novoAluno->setMatricula($matricula);
$novoAluno->setDataNascimento($dataNascimento);



$novoTelefone->setDdi($ddi);
$novoTelefone->setDdd($ddd);
$novoTelefone->setNumero($numero);

$novoEndereco->setCep($cep);
$novoEndereco->setUf($uf);
$novoEndereco->setCidade($cidade);
$novoEndereco->setBairro($bairro);
$novoEndereco->setLogradouro($logradouro);
$novoEndereco->setComplemento($complemento);


$novoAlunoDAO = new classeAlunoDAO();
$idAlunoInserido = $novoAlunoDAO->cadastrarAluno($novoAluno, $novoEndereco, $novoTelefone, $novoDiagnostico);
//se for cadastrado

if ($idAlunoInserido) {
    echo "
    <script type='text/javascript'>
    alert('Cadastrado com Sucesso!');        
    location.href='controladorListarAlunos.php';        
    </script>
    ";
}
//se nao for cadastrado
else {
    echo "
        
      <script type='text/javascript'>
    alert('Erro no cadastro!');        
    location.href='../Visao/formCadastroAluno.php';        
    </script>  
    ";
}


