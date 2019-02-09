function submitContact() {

var firstName = document.forms["myForm"]["inputFirstName"].value;
var lastName = document.forms["myForm"]["inputLastName"].value;
var email = document.forms["myForm"]["inputEmail"].value;
var address = document.forms["myForm"]["inputAddress"].value;
var phone = document.forms["myForm"]["inputPhone"].value;

var contact_data=JSON.stringify({    "FirstName": firstName,
                                     "LastName": lastName,
                                     "Email": email,
                                     "Address": address,
                                     "PhoneNumber": phone,
                                     "Users_idUsers": 5
                                });
console.log(contact_data);


$.ajax({
   url: "https://www.hammerfall.xyz/API-Files/api/Contact/addContact.php",
   type : "POST",
   contentType : 'application/json',
   data : contact_data,
   success : function(result){
   console.log("adding contact");
   // store jwt to cookie
 //  setCookie("token", result.token, 1);
   
   // show home page & tell the user it was a successful login
 //  showHomePage();
   alert("CONTACT CREATE SUCCSSFULLL!!");
   //location = 'contacts.html';
   
   },
   error: function(xhr, resp, text){
   console.log("NOPE!");
   // on error, tell the user login has failed & empty the input boxes
   $('#response').html("<div class='alert alert-danger'>Adding Contact failed.</div>");
   
   }
   });                           
}