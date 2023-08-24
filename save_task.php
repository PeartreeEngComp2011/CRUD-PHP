<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"];
    
    // Conexão com o banco de dados
    $conn = new mysqli("localhost", "root", "", "job");
    if ($conn->connect_error) 
    {
        die("Erro na conexão: " . $conn->connect_error);
    }

    // Inserir a nova tarefa no banco de dados
    $sql = "INSERT INTO tarefas (titulo, descricao) VALUES ('$titulo', '$descricao')";
    if ($conn->query($sql) === TRUE) 
    {
        header("Location: index.php");
    } else 
    {
        echo "Erro ao adicionar a tarefa: " . $conn->error;
    }

    $conn->close();
}
?>