$("#signup").on("click", function(e){
    e.preventDefault();
    let contact = document.getElementById('contact').value;
    let password = document.getElementById('password').value;
    let confirmPassword = document.getElementById('confirmPassword').value;

    console.log(password , contact);
    
    $.ajax({
        url : "signup.php",
        type : "POST",
        data : {
            contact : contact,
            password : password,
            confirmPassword : confirmPassword
        },
        success : function (data) {
            // console.log(data);
            
            $("#signupModal").modal("hide");
            document.getElementById('contact').value = "";
            document.getElementById('password').value = "";
            document.getElementById('confirmPassword').value = "";
            
        }
    });

});