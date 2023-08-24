<!DOCTYPE html>
<html>
<head>
    <title>Lista de Tarefas</title>
</head>

<!-- Dando um estilo para a tabela -->
<style>
    table 
    {
        width: 100%;
        border-collapse: collapse;
    }

    table, th, td 
    {
        border: 1px solid black;
    }

    th, td 
    {
        padding: 8px;
        text-align: left;
    }

    th 
    {
        background-color: #f2f2f2;
    }

    a 
    {
        text-decoration: none;
    }
</style>

<body>
    <h1>Lista de Tarefas</h1>
    <a href="add_task.php">Adicionar Tarefa</a>
    <!-- Criando uma tabela -->
    <table border="1">
        <tr>
            <th>Título</th>
            <th>Descrição</th>
            <th>Ações</th>
        </tr>
        <?php
        // Conexão com o banco de dados
        $conn = new mysqli("localhost", "root", "", "job");
        // Testando a conexão
        if ($conn->connect_error)
        {
            die("Erro na conexão: " . $conn->connect_error);
        }

        // Consulta para obter todas as tarefas
        $sql = "SELECT * FROM tarefas";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) 
        {
            while ($row = $result->fetch_assoc()) 
            {
                echo "<tr>";
                echo "<td>" . $row["titulo"] . "</td>";
                echo "<td>" . $row["descricao"] . "</td>";    
                echo "<td><a href='edit_task.php?id=" . $row["id"] . "'>Editar</a> | <a href='delete_task.php?id=" . $row["id"] . "'>Excluir</a></td>";
                echo "</tr>";
            }
        } else 
        {
            echo "<tr><td colspan='3'>Nenhuma tarefa encontrada.</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>