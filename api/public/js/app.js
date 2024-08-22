document.addEventListener('DOMContentLoaded', function() {
    fetch('/products/')
        .then(response => response.json())
        .then(data => {
        
            localStorage.setItem('products', JSON.stringify(data));

            displayProducts(data);
        })
        .catch(error => console.error('Error fetching products:', error));

    if (localStorage.getItem('products')) {
        let products = JSON.parse(localStorage.getItem('products'));
        
        displayProducts(products);
    }

    function displayProducts(products) {
        let list = document.getElementsByClassName('row row-cols-4')[0];

        list.innerHTML = '';

        products.forEach(product => {
            let newDiv = document.createElement('div');
            newDiv.className = 'col';
            newDiv.innerHTML = `
                <input type="checkbox" value="${product.id}">
                <li>${product.name}</li> 
                <li>${product.price}$</li>
                <li>${product.sku}</li>
                <li>${product.product_type}</li>
                <li>${product.property}</li>`;
            list.appendChild(newDiv);
        });
    }
});
