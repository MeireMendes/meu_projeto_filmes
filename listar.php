<?php
include 'db_connect.php';


$sql = "SELECT * FROM usuarios_filmes";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Filmes e Séries</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #e50914;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Lista de Filmes e Séries Assistidos</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Nome Completo</th>
        <th>E-mail</th>
        <th>Gênero Preferido</th>
        <th>Nome do Filme/Série</th>
        <th>Descrição</th>
        <th>Ações</th>
    </tr>
    
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["nome_completo"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["genero_preferido"] . "</td>";
            echo "<td>" . $row["nome_filme_serie"] . "</td>";
            echo "<td>" . $row["descricao"] . "</td>";
            echo "<td>
                    <a href='editar.php?id=" . $row["id"] . "'>Editar</a> | 
                    <a href='deletar.php?id=" . $row["id"] . "' onclick='return confirm(\"Tem certeza que deseja excluir?\")'>Excluir</a>
                  </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>Nenhum registro encontrado</td></tr>";
    }
    ?>

</table>

</body>
</html>

<?php
$conn->close();
?>
