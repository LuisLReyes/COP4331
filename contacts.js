var request = new XMLHttpRequest();

request.open('GET', 'http://mistfiner.xyz/API-Files/api/Contact/getContacts.php?Users_idUsers=5', true);
request.onload = function () {

  // Begin accessing JSON data here
  var data = JSON.parse(this.response);

  if (request.status >= 200 && request.status < 400) {
    data.forEach(data => {
      console.log(data.FirstName);
    });
  } else {
    console.log('error');
  }
}

request.send();