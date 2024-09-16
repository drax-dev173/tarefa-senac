<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logistics_db";

// Cria conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Obtém dados do formulário
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];

// Prepara e executa a query
$sql = "INSERT INTO products (name, description, price, quantity) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssdi", $name, $description, $price, $quantity);

if ($stmt->execute()) {
    echo "<!DOCTYPE html>
<html lang='pt-br'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <link rel='stylesheet' href='script.css'>
</head>
<body>
        <p>Produto cadastrado com sucesso!</p>
    <div>
        <a href='list.php'>Ir para a lista de produtos</a>
    <div>
    
</body>
</html>";
} else {
    echo "<p>Erro ao cadastrar produto: " . $stmt->error . "</p>";
}

$stmt->close();
$conn->close();