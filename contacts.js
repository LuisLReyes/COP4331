function loadContacts(cookieData){
  var request = new XMLHttpRequest();
  var url = 'https://www.hammerfall.xyz/API-Files/api/Contact/getContacts.php?Users_idUsers=' + cookieData.idUsers;
  console.log(url);
  request.open('GET', url , true);
  request.onload = function () {

    // Begin accessing JSON data here
    var data = JSON.parse(this.response);
    //console.log(JSON.parse(this.response));
    if (request.status >= 200 && request.status < 400 ) {
      console.log(data);
      data.data.forEach(Contact => {
        

        var div = document.getElementById('myTable');
        var id = JSON.stringify(Contact.idContacts).replace(/['"]+/g, '');
        var td1 = '<td id="FirstName'+id+'>'+JSON.stringify(Contact.FirstName)+'</td>';
        var td2 = '<td id="LastName'+id+'>'+JSON.stringify(Contact.LastName)+'</td>';
        var td3 = '<td id="Address'+id+'>'+JSON.stringify(Contact.Address)+'</td>';
        var td4 = '<td id="PhoneNumber'+id+'>'+JSON.stringify(Contact.PhoneNumber)+'</td>';
        var td5 = '<td id="Email'+id+'>'+JSON.stringify(Contact.Email)+'</td>';
        var deletebutton = '<td><button type="button" class="close" aria-label="Close" onclick="return deleteContact('+id+')"><span aria-hidden="true">&times;</span></button></td>';
        var editbutton = '<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal" id="button-style">Edit</button></td>';

        td1 = td1.replace(/['"]+/g, '');
        td2 = td2.replace(/['"]+/g, '');
        td3 = td3.replace(/['"]+/g, '');
        td4 = td4.replace(/['"]+/g, '');
        td5 = td5.replace(/['"]+/g, '');

        div.innerHTML += '<tr id="contactRow' + id + '" "data-toggle="modal" data-target="#editModal" class="clickable">'+ td1 + td2 + td3 + td4 + td5 + editbutton + deletebutton+'</tr>';

  
      });
    } else {
      console.log('error');
    }
  }

  request.send();
}
