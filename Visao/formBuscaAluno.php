<!DOCTYPE html>
<html lang="pt">
    <head>

        <meta charset="UTF-8">
        <title>Formulário</title>
        <link rel="stylesheet" type="text/css" href="css/FormBuscaestilo.css">

    </head>
    <body>
        <form id="formBusca" name="formBuscaAluno" 
              method="POST" action="../Controle/controladorBuscarAluno.php">
            <label>Nome</label><br>
            <input type="text" id="nomeAluno" name="nomeAluno" value="">

            <input type="submit" value="Buscar Aluno">


        </form>
    </body>
</html>


