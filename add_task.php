<!DOCTYPE html>
<html>
<head>
    <title>Adicionar Tarefa</title>
</head>
<body>
    <h1>Adicionar Tarefa</h1>
    <!-- Link para voltar a lista de tarefas -->
    <a href="index.php">Voltar para a lista de tarefas</a>
    <!-- Formulário que exibe os campos de tarefas e que chama o "save_task.php" -->
    <form action="save_task.php" method="post">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" required><br>
        <label for="descricao">Descrição:</label><br>
        <textarea id="descricao" name="descricao" rows="4" cols="50"></textarea><br>
        <input type="submit" value="Adicionar">
    </form>
</body>
</html>