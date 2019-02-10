function submitContact(cookieData) {
    var request = new XMLHttpRequest();
    request.open('POST', 'https://www.hammerfall.xyz/API-Files/api/Contact/addContact.php', false);
    request.setRequestHeader("Content-Type", "application/json");
    
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
    
            var json = JSON.stringify(request.responseText);
            //console.log(json.inputFirstName + ", " + json.inputLastName + ", " + json.inputEmail + ", " + json.inputAddress + ", " + json.inputPhoneNumber + ", " + json.Users_isUsers);
             
        }
    };
    var teststring1 = document.forms["myForm"]["firstName"].value;
    var teststring2 = document.forms["myForm"]["lastName"].value;
    var teststring3 = document.forms["myForm"]["email"].value;
    var teststring4 = document.forms["myForm"]["address"].value;
    var teststring5 = document.forms["myForm"]["phone"].value;
    
    
    var prepareddata = {"FirstName": teststring1,
                        "LastName": teststring2,
                        "Email": teststring3,
                        "Address": teststring4,
                        "PhoneNumber": teststring5,
                        "Users_idUsers": cookieData.idUsers};
    
    console.log(prepareddata);
    
    var data = JSON.stringify(prepareddata); 
    
    
    console.log(data);
    //alert("Check Console!");                   
    request.send(data); 
    location.reload();
    }
    