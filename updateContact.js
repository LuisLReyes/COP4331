var request = new XMLHttpRequest();

request.open('POST', 'http://mistfiner.xyz/API-Files/api/Contact/updateContact.php', true);
request.setRequestHeader("Content-Type", "application/json");

request.onreadystatechange = function () {
    if (request.readyState === 4 && request.status === 200) {

        var json = JSON.stringify(request.responseText);
        console.log(json.inputFirstName + ", " + json.inputLastName + ", " + json.inputEmail + ", " + json.inputAddress + ", " + json.inputPhoneNumber + ", " + json.Users_isUsers);
         
    }
};

var data = JSON.stringify({"FirstName": inputFirstName,
                           "LastName": inputLastName,
                           "Email": inputEmail,
                           "Address": inputEmail,
                           "PhoneNumber": inputPhoneNumber,
                           "Users_idUsers": 5}); 

console.log(data);
                   
request.send(data);                            