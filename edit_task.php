<!DOCTYPE html>
<html>
<head>
    <title>Editar Tarefa</title>
</head>
<body>
    <h1>Editar Tarefa</h1>
    <a href="index.php">Voltar para a lista de tarefas</a>
    <?php
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        
        // Conexão com o banco de dados
        $conn = new mysqli("localhost", "root", "", "job");
        if ($conn->connect_error) {
            die("Erro na conexão: " . $conn->connect_error);
        }

        // Consulta para obter os dados da tarefa
        $sql = "SELECT * FROM tarefas WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            echo "<form action='update_task.php' method='post'>";
            echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
            echo "<label for='titulo'>Título:</label>";
            echo "<input type='text' id='titulo' name='titulo' value='" . $row["titulo"] . "' required><br>";
            echo "<label for='descricao'>Descrição:</label><br>";
            echo "<textarea id='descricao' name='descricao' rows='4' cols='50'>" . $row["descricao"] . "</textarea><br>";
            echo "<input type='submit' value='Salvar'>";
            echo "</form>";
        } else {
            echo "Tarefa não encontrada.";
        }

        $conn->close();
    } else {
        echo "ID da tarefa não especificado.";
    }
    ?>
</body>
</html>