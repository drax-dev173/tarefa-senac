<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logistics_db";

//cria conexão
$conn = new mysqli($servername, $username, $password, $dbname);

//verifica conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Prepara e executa a query
$sql = "SELECT id, name, description, price, quantity FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>";
            
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["name"] . "</td>
                <td>" . $row["description"] . "</td>
                <td>" . number_format($row["price"], 2, ',', '.') . "</td>
                <td>" . $row["quantity"] . "</td>
                <td>
                    <a href='edit.php?id=" . $row["id"] . "'>Editar</a> |
                    <a href='delete.php?id=" . $row["id"] . "' onclick='return confirm(\"Tem certeza que deseja excluir este item?\")'>Excluir</a>
                </td>
              </tr>";
    }

    echo "</tbody></table>";
} else {
    echo "<p>Nenhum produto encontrado</p>";
}

$conn->close();