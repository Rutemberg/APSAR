<?php
//Atualizado em 10.11.16
session_start();
if (isset($_SESSION['atividadesAdaptadasAlterado'])) {
    $idAtividadesAdaptadas = $_SESSION['idAtividadesAdaptadasAlterado'];
    $nomeAtividadesAdaptadas = $_SESSION['nomeAtividadesAdaptadasAlterado'];
    $descricaoAtividadesAdaptadas = $_SESSION['descricaoAtividadesAdaptadasAlterado'];
    $arquivoAtividadesAdaptadas = $_SESSION['arquivoAtividadesAdaptadasAlterado'];
    $disciplinaAtividadesAdaptadas = $_SESSION['disciplinaAtividadesAdaptadasAlterado'];
} else {
    $idAtividadesAdaptadas = NULL;
    $nomeAtividadesAdaptadas = NULL;
    $descricaoAtividadesAdaptadas = NULL;
    $arquivoAtividadesAdaptadas = NULL;
}
?>

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="pt"> <!--Atualizado em 10.11.2016.-->
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/Formatividades.css">
        <script type="text/javascript">
// Validação
            function ValidaFormulario() {


                if (document.formCadastroAtividadesAdaptadas.inputnomeatividades.value == "") {
                    alert("Digite o nome da atividade");
                    document.getElementById("inputnomeatividades").focus();
                    return false;
                }

                return true;
            }
        </script>
    </head>

    <body>
        <!--Atualizado em 10.11.2016.-->
        <div id="corpoform">
            <header>
                <img src="img/Att.png">
                <h2>Cadastro Atividades adaptadas</h2>
            </header>


            <form name="formCadastroAtividadesAdaptadas" id="formCadastroAtividadesAdaptadas"
                  method="POST"
                  enctype="multipart/form-data"
                  onSubmit="return ValidaFormulario();"
                  action="../Controle/controladorAlterarAtividadesAdaptadas.php">        

                <input id="inputidAtividadealterado"
                       name="inputidAtividadealterado"
                       type="hidden" 
                       value="<?php echo $idAtividadesAdaptadas; ?>">

                <label for="inputDisciplina" id="labeldisciplina">Disciplina</label><br>
                <select id="inputDisciplina"
                        name="inputdisciplina"
                        >
                    <option value="<?php echo $disciplinaAtividadesAdaptadas; ?>"><?php echo $disciplinaAtividadesAdaptadas; ?></option>
                </select>

                <input id="inputnomearquivo"
                       name="inputnomearquivo"
                       type="hidden"
                       style="text-transform: none"
                       value="<?php echo $arquivoAtividadesAdaptadas; ?>">

                <input id="inputnomeatividades"
                       name="inputnomeatividades"
                       type="text" 
                       value="<?php echo $nomeAtividadesAdaptadas; ?>">

                <label>Descrição</label>
                <textarea id="discricaoatividades"
                          name="discricaoatividades"><?php echo $descricaoAtividadesAdaptadas; ?>
                </textarea>

                <div id="diagnosticoaluno">
                    <div class="corpodiagnostico">

                        <div class="cadastrararquivo">

                            <label id="labelarquivo" for="arquivo">Adicionar arquivo</label><input id="arquivo" name="arquivo" type="file"/>
                            <div class="copbririnput">
                            </div>

                        </div>
                    </div>

                </div>


                <input id="submitalterar" type="submit" value="Alterar"> 
            </form>
            <footer>
            </footer>
        </div>
    </body>
</html>




