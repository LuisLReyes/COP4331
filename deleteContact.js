function deleteContact(deleteid) {
    if (confirm('Are you sure you want to delete this contact?')) {
    var request = new XMLHttpRequest();
    
    request.open('DELETE', 'https://www.hammerfall.xyz/API-Files/api/Contact/deleteContact.php', false);
    request.setRequestHeader("Content-Type", "application/json");
    
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
    
            var json = JSON.stringify(request.responseText);
            //console.log(json.inputFirstName + ", " + json.inputLastName + ", " + json.inputEmail + ", " + json.inputAddress + ", " + json.inputPhoneNumber + ", " + json.Users_isUsers);
             
        }
    };

    var prepareddata = {"idContacts": deleteid};
    
    var data = JSON.stringify(prepareddata); 
    
    console.log(data);
                       
    request.send(data); 
    location.reload();
}
else{

}
    }