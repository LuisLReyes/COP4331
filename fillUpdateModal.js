function fillUpdateModal(passedId){
    console.log(document.getElementById("contactRow" + passedId).childNodes[0].textContent);
    document.forms["editForm"]["editFirstName"].value = document.getElementById("contactRow" + passedId).childNodes[0].textContent
    document.forms["editForm"]["editLastName"].value = document.getElementById("contactRow" + passedId).childNodes[1].textContent
    document.forms["editForm"]["editAddress"].value = document.getElementById("contactRow" + passedId).childNodes[2].textContent
    document.forms["editForm"]["editPhoneNumber"].value = document.getElementById("contactRow" + passedId).childNodes[3].textContent
    document.forms["editForm"]["editEmail"].value = document.getElementById("contactRow" + passedId).childNodes[4].textContent
}