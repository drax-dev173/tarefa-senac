<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "logistics_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Se houver um ID na URL, busca o produto correspondente
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM products WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        echo "Produto não encontrado.";
        exit;
    }
} else {
    echo "ID não fornecido.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    <link rel="stylesheet" href="lista.css">
</head>
<body>
    <h1>Editar Produto</h1>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">

        <label for="name">Nome do Produto:</label>
        <input type="text" id="name" name="name" value="<?php echo $product['name']; ?>" required>

        <label for="description">Descrição:</label>
        <textarea id="description" name="description" required><?php echo $product['description']; ?></textarea>

        <label for="price">Preço:</label>
        <input type="number" id="price" name="price" step="0.01" value="<?php echo $product['price']; ?>" required>

        <label for="quantity">Quantidade em Estoque:</label>
        <input type="number" id="quantity" name="quantity" value="<?php echo $product['quantity']; ?>" required>

        <button type="submit">Atualizar Produto</button>
    </form>
</body>
</html>
