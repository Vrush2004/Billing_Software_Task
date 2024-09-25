const customerForm = document.getElementById('customer-form');
const customerListBody = document.querySelector('#customer-list tbody'); 

customerForm.addEventListener('submit', (e) => {
    e.preventDefault();
    
    const name = document.getElementById('customer-name').value;
    const gender = document.getElementById('customer-gender').value;
    const contact = document.getElementById('customer-contact').value;
    const email = document.getElementById('customer-email').value;

    const newRow = document.createElement('tr');

    const nameCell = document.createElement('td');
    nameCell.textContent = name;
    newRow.appendChild(nameCell);

    const genderCell = document.createElement('td');
    genderCell.textContent = gender;
    newRow.appendChild(genderCell);

    const contactCell = document.createElement('td');
    contactCell.textContent = contact; 
    newRow.appendChild(contactCell); 

    const emailCell = document.createElement('td');
    emailCell.textContent = email; 
    newRow.appendChild(emailCell); 

    customerListBody.appendChild(newRow);

    customerForm.reset();
});
