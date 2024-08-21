document.addEventListener('DOMContentLoaded', function() {
    fetch('/products/')
        .then(response => response.json())
        .then(data => {
            localStorage.setItem('products', JSON.stringify(data));

        })
        .catch(error => console.error('Error fetching products:', error));
});

if (localStorage.getItem('products')) {
    for (let i = 0; i < localStorage.getItem('products').length; i++) {
        let products = JSON.parse(localStorage.getItem('products'));
        let list = document.getElementsByClassName('row row-cols-4')[0];
        let newDiv = document.createElement('div');
        newDiv.className = 'col';
        newDiv.innerHTML = `<input type="checkbox" value="${products[i].id}">
                            <li>${products[i].name}</li> 
                            <li>${products[i].price}$</li>
                            <li>${products[i].sku}</li>
                            <li>${products[i].product_type}</li>
                            <li>${products[i].property}</li>`;
        list.appendChild(newDiv);
    }
    }
  


