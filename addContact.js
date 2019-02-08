var request = new XMLHttpRequest();

request.open('POST', 'http://mistfiner.xyz/API-Files/api/Contact/addContact.php', true);
request.setRequestHeader("Content", "Application/json");

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