    // Sample data for customers and products
    const customers = ['John Doe', 'Jane Smith', 'Alice Brown'];
    const products = [
        { name: 'Laptop', price: 1200 },
        { name: 'Phone', price: 800 },
        { name: 'Tablet', price: 400 },
    ];

    // Populate the customer dropdown
    const billingCustomer = document.getElementById('billing-customer');
    customers.forEach(customer => {
        const option = document.createElement('option');
        option.textContent = customer;
        option.value = customer;
        billingCustomer.appendChild(option);
    });

    // Populate the product dropdown
    const billingProducts = document.getElementById('billing-products');
    products.forEach(product => {
        const option = document.createElement('option');
        option.textContent = `${product.name} - $${product.price}`;
        option.value = product.price;
        billingProducts.appendChild(option);
    });

    // Handle billing form submission
    const billingForm = document.getElementById('billing-form');
    const billingRecords = document.getElementById('billing-records');
    let totalAmount = document.getElementById('total-amount');

    billingForm.addEventListener('submit', function (e) {
        e.preventDefault();
        
        const customer = billingCustomer.value;
        const selectedProducts = Array.from(billingProducts.selectedOptions).map(option => option.textContent);
        const total = Array.from(billingProducts.selectedOptions).reduce((acc, option) => acc + Number(option.value), 0);
        
        totalAmount.textContent = `$${total}`;

        // Add billing record to the list
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${customer}</td>
            <td>${selectedProducts.join(', ')}</td>
            <td>$${total}</td>
            <td>
                <button class="edit-btn">Edit</button>
                <button class="delete-btn">Delete</button>
            </td>
        `;
        billingRecords.appendChild(row);

        // Clear the form
        billingForm.reset();
        totalAmount.textContent = '$0';
    });

    // Handle Edit and Delete actions
    billingRecords.addEventListener('click', function (e) {
        if (e.target.classList.contains('delete-btn')) {
            const row = e.target.closest('tr');
            billingRecords.removeChild(row);  // Delete the billing record
        } else if (e.target.classList.contains('edit-btn')) {
            const row = e.target.closest('tr');
            const customer = row.children[0].textContent;
            const selectedProducts = row.children[1].textContent.split(', ');
            const total = row.children[2].textContent;

            // Populate form fields for editing
            billingCustomer.value = customer;
            Array.from(billingProducts.options).forEach(option => {
                option.selected = selectedProducts.includes(option.textContent);
            });
            totalAmount.textContent = total;

            // Remove the row being edited
            billingRecords.removeChild(row);
        }
    });