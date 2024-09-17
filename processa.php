<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $nome_completo = $conn->real_escape_string($_POST["nome_completo"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $genero_preferido = $conn->real_escape_string($_POST["genero_preferido"]);
    $nome_filme_serie = $conn->real_escape_string($_POST["nome_filme_serie"]);
    $descricao = $conn->real_escape_string($_POST["descricao"]);

  
    $sql = "INSERT INTO usuarios_filmes (nome_completo, email, genero_preferido, nome_filme_serie, descricao)
            VALUES ('$nome_completo', '$email', '$genero_preferido', '$nome_filme_serie', '$descricao')";

    
    if ($conn->query($sql) === TRUE) {
        echo "Novo registro criado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    
    $conn->close();
}
?>

