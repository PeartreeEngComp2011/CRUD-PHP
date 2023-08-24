<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $id = $_POST["id"];
    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"];
    
    // Conexão com o banco de dados
    $conn = new mysqli("localhost", "root", "", "job");
    if ($conn->connect_error) 
    {
        die("Erro na conexão: " . $conn->connect_error);
    }

    // Atualizar a tarefa no banco de dados
    $sql = "UPDATE tarefas SET titulo='$titulo', descricao='$descricao' WHERE id=$id";
    if ($conn->query($sql) === TRUE) 
    {
        header("Location: index.php");
    } else 
    {
        echo "Erro ao atualizar a tarefa: " . $conn->error;
    }

    $conn->close();
}
?>