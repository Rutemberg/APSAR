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

                // email
                if (document.formCadastroAtividadesAdaptadas.arquivo.value == "") {
                    alert("Escolha um arquivo");
                    return false;
                }
                
                if (document.formCadastroAtividadesAdaptadas.inputdisciplina.value == "") {
                    alert("Escolha a disciplina");
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
                <img src="img/document-edit-flat.png">
                <h2>Cadastro Atividades adaptadas</h2>
            </header>


            <form name="formCadastroAtividadesAdaptadas" id="formCadastroAtividadesAdaptadas"
                  method="POST"
                  enctype="multipart/form-data"
                  onSubmit="return ValidaFormulario();"
                  action="../Controle/controladorCadastrarAtividadesAdaptadas.php">        

                <label for="inputDisciplina" id="labeldisciplina">Disciplina</label><br>
                <select id="inputDisciplina"
                        name="inputdisciplina"
                        >
                    <option value="">Selecione a disciplina</option>
                    <option value="Arte">Arte</option>
                    <option value="Biologia">Biologia</option>
                    <option value="Educação Física">Educação Física</option>
                    <option value="Educação Religiosa">Educação Religiosa</option>
                    <option value="Espanhol">Espanhol</option>
                    <option value="Filosofia">Filosofia</option>
                    <option value="Física">Física</option>
                    <option value="Geografia">Geografia</option>
                    <option value="História">História</option>
                    <option value="Inglês">Inglês</option>
                    <option value="Língua Portuguesa">Língua Portuguesa</option>
                    <option value="Literatura">Literatura</option>
                    <option value="Matemática">Matemática</option>
                    <option value="Química">Química</option>
                    <option value="Sociologia">Sociologia</option>
                </select>

                <input id="inputnomeatividades"
                       name="inputnomeatividades"
                       placeholder="NOME DA ATIVIDADE"
                       type="text" 
                       value="">
                <label>Descrição</label>
                <textarea id="discricaoatividades"
                          name="discricaoatividades"
                          >
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


                <input type="submit" value="Cadastrar"> 
            </form>
            <footer>
            </footer>
        </div>
    </body>
</html>


