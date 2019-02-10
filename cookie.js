function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
function eraseCookie(name) {
    document.cookie = name+'=; Max-Age=-99999999;';
}
function getId(addingContact){
    var token = getCookie('token');
        console.log("cheker");
        console.log(token);
        var form_data = JSON.stringify({ token:token });
   
                        
        $.ajax({
                url: "https://www.hammerfall.xyz/API-Files/api/User/validate.php",
                type : "POST",
                contentType : 'application/json',
                data : form_data,
                success : function(result){//response
                    if(addingContact){
                        submitContact(result.data);
                      holder = result.data;
                    }
                    else{
                        loadContacts(result.data);
                        holder = result.data;
                    }
                console.log("ID of the currently logged in person: " + result.data.idUsers);
                // store jwt to cookie
            
                },
                error: function(xhr, resp, text){
                console.log("NOPE!");
                
                // on error, tell the user login has failed & empty the input boxes
                
                
                }
                });
   
}
function getterz()
{
    var token = getCookie('token');
    console.log("cheker");
    console.log(token);
    var form_data = JSON.stringify({ token:token });
    
    
    $.ajax({
           url: "https://www.hammerfall.xyz/API-Files/api/User/validate.php",
           type : "POST",
           contentType : 'application/json',
           data : form_data,
           success : function(result){//response
           
           
           // store jwt to cookie
           getter2(result.data.idUsers);
           },
           error: function(xhr, resp, text){
           console.log("NOPE!");
           
           // on error, tell the user login has failed & empty the input boxes
           
           
           }
           });
    

}
function getter2(uerid)
{
    
    
    $.ajax({
           url: 'https://www.hammerfall.xyz/API-Files/api/Contact/getContacts.php?Users_idUsers=' + userid,
           type : "GET",
           contentType : 'application/json',
           data : {},
           success : function(result){//response
           
          
           // store jwt to cookie
           create(result.data.idUsers);
           },
           error: function(xhr, resp, text){
           console.log("NOPE!");
           
           // on error, tell the user login has failed & empty the input boxes
           
           
           }
           });
    
}
function test()
{
    
    
    
    
}

function populate(id)
{
    
    
    
     //  document.forms["editForm"]["firstName"].value =table['contactRow'+id][FirstName];
//    console.log(document.forms["editForm"]["firstName"].value);
    
    alert("PRESSED");
}
/*
$(document).on('click', 'button', function () {
               var indexRow = this.parentNode.parentNode.rowIndex;
             var check=  document.getElementById("myTable")
              // alert(check);
               
               bid = this.id; // button ID
               contactRowId = $(this).closest('tr').attr('id'); // table row ID
               contactRowId =  contactRowId.replace(/\D+/g, ''); //Strip away everything
               alert(contactRowId);
               });
               */
