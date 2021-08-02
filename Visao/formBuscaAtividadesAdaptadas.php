<!DOCTYPE html>
<html lang="pt">
    <head>

        <meta charset="UTF-8">
        <title>Formulário</title>
        <link rel="stylesheet" type="text/css" href="css/FormBuscaestilo.css">

    </head>
    <body>
        <form id="formBusca" name="formBuscaatividade" 
              method="POST" action="../Controle/controladorBuscarAtividadesAdaptadas.php">
            <label>Nome</label><br>
            <input type="text" id="nomeAtividade" name="nomeAtividade" value="">
            <br>
            <input type="submit" value="Buscar Atividade">


        </form>

    </body>
</html>
