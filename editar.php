<?php
include 'db_connect.php';

$id = $_GET['id']; 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_completo = $_POST["nome_completo"];
    $email = $_POST["email"];
    $genero_preferido = $_POST["genero_preferido"];
    $nome_filme_serie = $_POST["nome_filme_serie"];
    $descricao = $_POST["descricao"];

    $sql = "UPDATE usuarios_filmes SET nome_completo='$nome_completo', email='$email', genero_preferido='$genero_preferido', nome_filme_serie='$nome_filme_serie', descricao='$descricao' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro atualizado com sucesso!";
        header("Location: listar.php");
    } else {
        echo "Erro ao atualizar: " . $conn->error;
    }
}


$sql = "SELECT * FROM usuarios_filmes WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Filme/Série</title>
</head>
<body>

<h2>Editar Filme ou Série</h2>

<form action="" method="POST">
    <label for="nome_completo">Nome Completo:</label>
    <input type="text" id="nome_completo" name="nome_completo" value="<?php echo $row['nome_completo']; ?>" required><br>

    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required><br>

    <label for="genero_preferido">Gênero Preferido:</label>
    <select id="genero_preferido" name="genero_preferido" required>
        <option value="Ação" <?php if ($row['genero_preferido'] == 'Ação') echo 'selected'; ?>>Ação</option>
        <option value="Comédia" <?php if ($row['genero_preferido'] == 'Comédia') echo 'selected'; ?>>Comédia</option>
        <option value="Drama" <?php if ($row['genero_preferido'] == 'Drama') echo 'selected'; ?>>Drama</option>
        <option value="Ficção Científica" <?php if ($row['genero_preferido'] == 'Ficção Científica') echo 'selected'; ?>>Ficção Científica</option>
        <option value="Terror" <?php if ($row['genero_preferido'] == 'Terror') echo 'selected'; ?>>Terror</option>
    </select><br>

    <label for="nome_filme_serie">Nome do Filme/Série:</label>
    <input type="text" id="nome_filme_serie" name="nome_filme_serie" value="<?php echo $row['nome_filme_serie']; ?>" required><br>

    <label for="descricao">O que achou:</label>
    <textarea id="descricao" name="descricao" rows="4" required><?php echo $row['descricao']; ?></textarea><br>

    <input type="submit" value="Atualizar">
</form>

</body>
</html>
