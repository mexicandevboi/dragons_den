$(document).ready(function () {

    const phpFolder = 'php/';

    function getUsers() {
        //get users from php file using xmlhttprequest
        var xhr = new XMLHttpRequest();
        xhr.open('GET', phpFolder + 'getUsers.php', false);
        xhr.send();
        if (xhr.status != 200) {
            //if error return the data defined above
            return data;
        }
        //return the data from the php file
        return JSON.parse(xhr.responseText);
    }

    function getOrders() {
        //get orders from php file using xmlhttprequest
        var xhr = new XMLHttpRequest();
        xhr.open('GET', phpFolder + 'getOrders.php', false);
        xhr.send();
        if (xhr.status != 200) {
            //if error return the data defined above
            return data;
        }
        //return the data from the php file
        console.log(xhr.responseText);
        return JSON.parse(xhr.responseText);
    }


    //find the table #users-table
    var table = $('#users-table');
    var tbody = table.find('tbody');
    //fiil the table using id, name and email from data
    data = getUsers();
    data.forEach(function (user) {
        tbody.append('<tr><td>' + user.id + '</td><td>' + user.username + '</td><td>' + user.email + '</td></tr>');
    });

    var ordersTable = $('#orders-table');
    var ordersTbody = ordersTable.find('tbody');
    //fill the table using id, username, total_amount, order_date and status from data and add a button to view the order
    data = getOrders();
    data.forEach(function (order) {
        ordersTbody.append('<tr><td>' + order.order_id + '</td><td>' + order.username + '</td><td>' + order.total_amount + '</td><td>' + order.order_date + '</td><td>' + order.status + '</td><td><button class="btn btn-secondary" data-id="' + order.order_id + '">Ver</button></td></tr>');
    });


    //assign a click event to every button in table #orders-table to redirect them to the order details page
    ordersTable.find('button').click(function () {
        window.location.href = 'detallePedido.php?id=' + $(this).data('id');
    });
});