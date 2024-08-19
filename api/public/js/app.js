document.addEventListener('DOMContentLoaded', function() {
    fetch('/products')
        .then(response => response.json())
        .then(data => {
            let app = document.getElementById('app');
            app.innerHTML = '<ul>' + data.map(product => `<li>${product.name} - $${product.price}</li>`).join('') + '</ul>';
        })
        .catch(error => console.error('Error fetching products:', error));
});
