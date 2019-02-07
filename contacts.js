var request = new XMLHttpRequest();

request.open('GET', 'http://mistfiner.xyz/API-Files/api/Contact/getContacts.php?Users_idUsers=5', true);
request.onload = function () {

  // Begin accessing JSON data here
  var data = JSON.parse(this.response);
  console.log(JSON.parse(this.response));
  if (request.status >= 200 && request.status < 400) {
    data.forEach(Contact => {
      

      var div = document.getElementById('myTable');
      var td1 = '<td>'+JSON.stringify(Contact.FirstName)+'</td>';
      var td2 = '<td>'+JSON.stringify(Contact.LastName)+'</td>';
      var td3 = '<td>'+JSON.stringify(Contact.Address)+'</td>';
      var td4 = '<td>'+JSON.stringify(Contact.Phone)+'</td>';
      var td5 = '<td>'+JSON.stringify(Contact.Email)+'</td>';
      
      div.innerHTML += '<tr data-toggle="modal" data-target="#editModal" class="clickable">'+ td1 + td2 + td3 + td4 + td5 +'</tr>';
      


    });
  } else {
    console.log('error');
  }
}

request.send();
