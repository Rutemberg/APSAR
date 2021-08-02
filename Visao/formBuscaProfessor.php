<!DOCTYPE html>
<html lang="pt">
    <head>

        <meta charset="UTF-8">
        <title>Formulário</title>
        <link rel="stylesheet" type="text/css" href="css/FormBuscaestilo.css">

    </head>
    <body>
        <form id="formBusca" name="formBuscaProfessor" 
              method="POST" action="../Controle/controladorBuscarProfessor.php">
            <label>Nome</label><br>
            <input type="text" id="nomeProfessor" name="nomeProfessor" value="">

            <input type="submit" value="Buscar Professor">


        </form>

    </body>
</html>
