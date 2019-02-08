var request = new XMLHttpRequest();

request.open('POST', 'http://mistfiner.xyz/API-Files/api/Contact/addContact.php', true);
request.setRequestHeader("Content", "Application/json");

request.setHeader("Access-Control-Allow-Origin", "*");
request.setHeader("Access-Control-Allow-Credentials", "true");
request.setHeader("Access-Control-Allow-Methods", "GET,HEAD,OPTIONS,POST,PUT");
request.setHeader("Access-Control-Allow-Headers", "Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers");

request.onreadystatechange = function () {
    if (request.readyState === 4 && request.status === 200) {
        var json = JSON.parse(request.responseText);
        console.log(json.FirstName + ", " + json.LastName + ", " + json.Email + ", " + json.Address + ", " + json.PhoneNumber + ", " + json.Users_isUsers);
    }
};

var data = JSON.stringify({"FirstName": "Testing",
                            "LastName": "AddContact",
                            "Email": "asdf@gmail.com",
                            "Address": "1234 Street St.",
                            "PhoneNumber": 1234323,
                            "Users_idUsers": 5});

request.send(data);