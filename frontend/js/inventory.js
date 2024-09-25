const productForm = document.getElementById('product-form');
const productListBody = document.getElementById('product-list tbody');

productForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const productName = document.getElementById('product-name').value;
    const productPrice = document.getElementById('product-price').value;
    const productQuantity = document.getElementById('product-quantity').value;
    const productBrand = document.getElementById('product-brand').value;

    const newRow = document.createElement('tr'); 

    const nameCell = document.createElement('td');
    nameCell.textContent = productName; 
    newRow.appendChild(nameCell); 

    const priceCell = document.createElement('td');
    priceCell.textContent = productPrice; 
    newRow.appendChild(priceCell); 

    const quantityCell = document.createElement('td');
    quantityCell.textContent = productQuantity;
    newRow.appendChild(quantityCell);

    const brandCell = document.createElement('td');
    brandCell.textContent = productBrand; 
    newRow.appendChild(brandCell);

    productListBody.appendChild(newRow);

    productForm.reset();
});

