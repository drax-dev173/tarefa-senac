<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logistics_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$id = $_POST['id'];
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];

$sql = "UPDATE products SET name=?, description=?, price=?, quantity=? WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssdii", $name, $description, $price, $quantity, $id);

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
        <p>Produto atualizado com sucesso!</p>
    <div>
        <a href='list.php'>Ir para a lista de produtos</a>
    <div>
    
</body>
</html>";
} else {
    echo "Erro ao atualizar produto: " . $stmt->error;
}

$stmt->close();
$conn->close();
