document.getElementById('productForm').addEventListener('submit', function(event) {
    var name = document.getElementById('name').value;
    var description = document.getElementById('description').value;
    var price = document.getElementById('price').value;
    var quantity = document.getElementById('quantity').value;
    var messageElement = document.getElementById('message');
    
    if (!name || !description || isNaN(price) || isNaN(quantity) || price <= 0 || quantity < 0) {
        event.preventDefault(); // Impede o envio do formulário
        messageElement.textContent = 'Por favor, preencha todos os campos corretamente.';
        messageElement.style.color = 'red';
    }
});
