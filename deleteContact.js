var request = new XMLHttpRequest();

request.open('POST', 'http://mistfiner.xyz/API-Files/api/Contact/deleteContact.php', true);
request.setRequestHeader("Content-Type", "application/json");

request.onreadystatechange = function () { 
    if (request.readyState === 4 && request.status === 200) {

        //Still searching for delete function
         
    }
};

console.log(data);
                   
request.send(data);                            