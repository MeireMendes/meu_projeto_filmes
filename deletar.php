<?php
include 'db_connect.php';

$id = $_GET['id']; 


$sql = "DELETE FROM usuarios_filmes WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Registro excluído com sucesso!";
} else {
    echo "Erro ao excluir: " . $conn->error;
}


header("Location: listar.php");

$conn->close();
?>
