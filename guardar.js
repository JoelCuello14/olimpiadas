document.querySelector('.btn-add-cart').addEventListener('click', function() {
    // Capturar los datos del producto
    const producto = {
        nombre: document.querySelector('.nombre-producto').textContent,
        precio: document.querySelector('.price').textContent.replace('$', ''),
        imagen: document.querySelector('.foti').src,
    };

    // Enviar los datos al servidor usando fetch
    fetch('http://localhost/olimpiadas2/olimpiadas/guardar_producto.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(producto)
    })
    .then(response => response.json())
    .then(data => {
        if(data.success) {
            alert('Producto añadido al carrito!');
        } else {
            alert('Hubo un error al añadir el producto.');
        }
    })
    .catch(error => console.error('Error:', error));
});
