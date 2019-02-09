var request = new XMLHttpRequest();

request.open('GET', 'http://mistfiner.xyz/API-Files/api/Contact/getContacts.php?Users_idUsers=5', true);
request.onload = function () {

  // Begin accessing JSON data here
  var data = JSON.parse(this.response);
  //console.log(JSON.parse(this.response));
  if (request.status >= 200 && request.status < 400) {
    data.data.forEach(Contact => {
      

      var div = document.getElementById('myTable');
      var id = JSON.stringify(Contact.idContacts).replace(/['"]+/g, '');
      var td1 = '<td id="FirstName'+id+'>'+JSON.stringify(Contact.FirstName)+'</td>';
      var td2 = '<td id="LastName'+id+'>'+JSON.stringify(Contact.LastName)+'</td>';
      var td3 = '<td id="Address'+id+'>'+JSON.stringify(Contact.Address)+'</td>';
      var td4 = '<td id="PhoneNumber'+id+'>'+JSON.stringify(Contact.PhoneNumber)+'</td>';
      var td5 = '<td id="Email'+id+'>'+JSON.stringify(Contact.Email)+'</td>';

      td1 = td1.replace(/['"]+/g, '');
      td2 = td2.replace(/['"]+/g, '');
      td3 = td3.replace(/['"]+/g, '');
      td4 = td4.replace(/['"]+/g, '');
      td5 = td5.replace(/['"]+/g, '');

      div.innerHTML += '<tr id="contactRow' + id + '" "data-toggle="modal" data-target="#editModal" class="clickable">'+ td1 + td2 + td3 + td4 + td5 +'</tr>';

 
    });
  } else {
    console.log('error');
  }
}

request.send();
