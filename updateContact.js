function editContact(editid,userid) {
    var request = new XMLHttpRequest();
    console.log("we got here!");
    request.open('PUT', 'https://www.hammerfall.xyz/API-Files/api/Contact/updateContact.php', false);
    request.setRequestHeader("Content-Type", "application/json");
    
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
     
            var json = JSON.stringify(request.responseText);
            //console.log(json.inputFirstName + ", " + json.inputLastName + ", " + json.inputEmail + ", " + json.inputAddress + ", " + json.inputPhoneNumber + ", " + json.Users_isUsers);
             
        }
    };

    var teststring1 = document.forms["editForm"]["firstName"].value;
    var teststring2 = document.forms["editForm"]["lastName"].value;
    var teststring3 = document.forms["editForm"]["email"].value;
    var teststring4 = document.forms["editForm"]["address"].value;
    var teststring5 = document.forms["editForm"]["phone"].value;
    
    var prepareddata = {  "idContacts" :editid,
                        "FirstName": teststring1,
                        "LastName": teststring2,
                        "Email": teststring3,
                        "Address": teststring4,
                        "PhoneNumber": teststring5,
                        "Users_idUsers" : userid};
    
    
    
    var data = JSON.stringify(prepareddata); 
    
    
    console.log(data);
                       
    request.send(data);
    location.reload();
    }                             
