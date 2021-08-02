<!DOCTYPE html>
<html lang="pt">
    <head>

        <meta charset="UTF-8">
        <title>Formulário</title>
        <link rel="stylesheet" type="text/css" href="css/FormBuscaestilo.css">
    </head>
    <body>
        <form id="formBusca" name="formBuscaAdministrador" 
              method="POST" action="../Controle/controladorBuscarAdministrador.php">
            <label>Nome</label><br>
            <input type="text" id="nomeAdministrador" name="nomeAdministrador" value="">
            <input type="submit" value="Buscar Administrador">


        </form>

    </body>
</html>
