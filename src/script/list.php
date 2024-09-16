<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>Lista de Produtos</h1>

    <?php if (isset($_GET['message'])): ?>
        <p class="status-message"><?php echo htmlspecialchars($_GET['message']); ?></p>
    <?php endif; ?>

    <table>
        <tbody id="productTableBody">
            <?php include 'listitens.php'; ?>
        </tbody>
    </table>

   <div class="container">
     <a class="cad" href="index.html">Cadastrar produto</a>
   </div> 
</body>
</html>
