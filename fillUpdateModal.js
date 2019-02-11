function fillUpdateModal(passedId){
    document.forms["editForm"]["editFirstName"].value = document.getElementById("contactRow" + passedId).childNodes[0];
    document.forms["editForm"]["editLastName"].value = document.getElementById("contactRow" + passedId).childNodes[1];
    document.forms["editForm"]["editAddress"].value = document.getElementById("contactRow" + passedId).childNodes[2];
    document.forms["editForm"]["editPhoneNumber"].value = document.getElementById("contactRow" + passedId).childNodes[3];
    document.forms["editForm"]["editEmail"].value = document.getElementById("contactRow" + passedId).childNodes[4];
}