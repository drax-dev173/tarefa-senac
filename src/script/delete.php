<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logistics_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 

    $sql = "DELETE FROM products WHERE id=?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            header("Location: list.php?message=" . urlencode("Produto excluído com sucesso."));
            exit;
        } else {
            echo "Erro ao excluir produto: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Erro ao preparar a query: " . $conn->error;
    }
} else {
    echo "ID do produto não fornecido.";
}

$conn->close();