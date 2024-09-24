document.getElementById('total-sales').textContent = `0`;
document.getElementById('total-revenue').textContent = `0`;

var customerListApiUrl = 'http://127.0.0.1:5000/getAllCustomers';
var customerSaveApiUrl = 'http://127.0.0.1:5000/insertCustomer';
var productSaveApiUrl = 'http://127.0.0.1:5000/insertProduct';
var productDeleteApiUrl = 'http://127.0.0.1:5000/deleteProduct';


function callApi(method, url, data) {
    $.ajax({
        method: method,
        url: url,
        data: data
    }).done(function( msg ) {
        window.location.reload();
    });
}
