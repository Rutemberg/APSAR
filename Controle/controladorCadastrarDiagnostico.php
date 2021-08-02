<?php

//Atualizado em 11.10.2016.
if (isset($_FILES['arquivo']['name']) && $_FILES['arquivo']['error'] == 0):
    $idAluno = $_POST['idAluno'];

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
        } else{
            echo "<script>alert('Formato de arquivo invalido');
                        window.location.href='controladorListarAlunos.php';
                        </script>";
            exit();
        }
        
//         echo 'Você poderá enviar apenas arquivos "*.jpg;*.jpeg;*.gif;*.png"<br />';
    } else
        $arquivo = NULL;




    require_once '../Modelo/classeDiagnostico.php';
    require_once '../Modelo/DAO/classeDiagnosticoDAO.php';

    $novoDiagnosticoDAO = new classeDiagnosticoDAO();

    $novoDiagnostico = new classeDiagnostico();
    $novoDiagnostico->setIdAluno($idAluno);
    $novoDiagnostico->setArquivo($arquivo);

    $cadastrar = $novoDiagnosticoDAO->cadastrarDiagnostico($novoDiagnostico);
    if ($cadastrar == FALSE) {
//    echo "<script>alert('Erro no Cadastro');
//                        window.location.href='controladorListarAlunos.php';
//                        </script>";
    } else {
        //        // tenta mover o arquivo para o destino
        if (@move_uploaded_file($arquivo_tmp, $destino)) {
//            echo 'Arquivo salvo com sucesso em : <strong>' . $destino . '</strong><br />';
//            echo "<img src='$destino'/>";
        } else
            echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';

        echo "<script>alert('Cadastrado com Sucesso');
                        window.location.href='controladorListarAlunos.php';
                        </script>";
    }

else:
    echo "<script>alert('Selecione um arquivo!');
                        window.location.href='controladorListarAlunos.php';
                        </script>";

endif;
?>

