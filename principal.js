document.addEventListener('DOMContentLoaded', () => {
    const btnAddCart = document.querySelectorAll('.btn-add-cart');

    btnAddCart.forEach(button => {
        button.addEventListener('click', () => {
            alert('Debe iniciar sesión para agregar este producto.');
        });
    });
});