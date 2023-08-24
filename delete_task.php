<?php
if (isset($_GET["id"])) 
{
    $task_id = $_GET["id"];

    // Conexão com o banco de dados
    $conn = new mysqli("localhost", "root", "", "job");
    // Testando a conexão
    if ($conn->connect_error) 
    {
        die("Erro na conexão: " . $conn->connect_error);
    }

    // Preparar a consulta SQL para excluir a tarefa com base no ID
    $sql = "DELETE FROM tarefas WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) 
    {
        // Vincular o parâmetro ID à consulta
        $stmt->bind_param("i", $task_id);

        // Executar a consulta
        if ($stmt->execute()) {
            // Tarefa excluída com sucesso, redirecionar de volta para a página de listagem de tarefas
            header("Location: index.php");
        } else {
            echo "Erro ao excluir a tarefa: " . $stmt->error;
        }

        // Fechar a consulta preparada
        $stmt->close();
    } else {
        echo "Erro na preparação da consulta: " . $conn->error;
    }

    // Fechar a conexão com o banco de dados
    $conn->close();
} else 
{
    echo "ID da tarefa não especificado.";
}
?>