<?php

//Atualizado em 10.11.2016-->
require_once '../Modelo/DAO/classeAtividadesAdaptadasDAO.php';
$atividadesAdaptadasDAO = new classeAtividadesAdaptadasDAO();


if (isset($_GET['idAtividadesAdaptadas'])) {//$_GET acessa os valores do formulario. 
    $idAtividadesAdaptadas = $_GET['idAtividadesAdaptadas'];
    $atividadesAdaptadasDAO->buscarAtividadesAdaptadasPorId($idAtividadesAdaptadas);
    header('Location:../Visao/formAlterarAtividadesAdaptadas.php');
} else {

    $nomeantigoarquivo = $_POST['inputnomearquivo'];
    $disciplinaantiga = $_POST['inputdisciplina'];
    $idAtividadesAdaptadas = $_POST['inputidAtividadealterado']; //$_POST, metodo que passa as variaveis do formulário codificadas
    $nomeAtividadesAdaptadas = $_POST['inputnomeatividades']; //$_POST, metodo que passa as variaveis do formulário codificadas
    $nomeAtividadesAdaptadas = mb_convert_case($nomeAtividadesAdaptadas, MB_CASE_UPPER, 'UTF-8');
    $descricaoAtividadesAdaptadas = $_POST['discricaoatividades'];  //as variáveis não são visiveis ao usuário.    


    if (isset($_FILES['arquivo']['name']) && $_FILES['arquivo']['error'] == 0) {
        //Cria a pasta
        if (!is_dir("../ArquivosAtividades")):
            mkdir('../ArquivosAtividades/', 0744);
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
            $destino = '../ArquivosAtividades/' . $arquivo;
//        // tenta mover o arquivo para o destino
            if (@move_uploaded_file($arquivo_tmp, $destino)) {
//            echo 'Arquivo salvo com sucesso em : <strong>' . $destino . '</strong><br />';
//            echo "<img src='$destino'/>";
            } else
                echo 'Erro ao salvar o arquivo. Aparentemente você não tem permissão de escrita.<br />';
        } else {
            echo "<script>alert('Formato de arquivo invalido');
                        window.location.href='../Visao/formAlterarAtividadesAdaptadas.php';
                        </script>";
            exit();
        }
        if (is_dir("../ArquivosAtividades") && file_exists("../ArquivosAtividades/" . $nomeantigoarquivo)):
            unlink("../ArquivosAtividades/{$nomeantigoarquivo}");
        endif;
    } else
        $arquivo = $nomeantigoarquivo;


    require_once '../Modelo/classeAtividadesAdaptadas.php';
    $novoAtividadesAdaptadas = new classeAtividadesAdaptadas();
    $novoAtividadesAdaptadas->setIdAtividadesAdaptadas($idAtividadesAdaptadas);
    $novoAtividadesAdaptadas->setDisciplina($disciplinaantiga);
    $novoAtividadesAdaptadas->setNome($nomeAtividadesAdaptadas);
    $novoAtividadesAdaptadas->setDescricao($descricaoAtividadesAdaptadas);
    $novoAtividadesAdaptadas->setArquivoAtividadesAdaptadas($arquivo);

    $alterar = $atividadesAdaptadasDAO->alterarAtividadesAdaptadas($novoAtividadesAdaptadas);
    if ($alterar == FALSE) {
        echo "<script>alert('Erro na Alteracao');
                        window.location.href='../Visao/formAlterarAtividadesAdaptadas.php';
                        </script>";
    } else {
        echo "<script>alert('Alterado com Sucesso');
                        window.location.href='controladorListarAtividadesAdaptadas.php';
                        </script>";
    }
}
