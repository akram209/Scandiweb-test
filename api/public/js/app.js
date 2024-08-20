document.addEventListener('DOMContentLoaded', function() {
    fetch('/products/')
        .then(response => response.json())
        .then(data => {
            localStorage.setItem('products', JSON.stringify(data));
        })
        .catch(error => console.error('Error fetching products:', error));
});

if (localStorage.getItem('products')) {
    let products = JSON.parse(localStorage.getItem('products'));
    let app = document.getElementById('app');
    app.innerHTML = '<ul>' + products.map(product => `<li>${product.name} - $${product.price}</li>`).join('') + '</ul>';
}

