const toastLiveExample = document.getElementById("liveToast");
const toast = new bootstrap.Toast(toastLiveExample);
const loader = document.querySelector(".loader");
const loaderwrapper = document.querySelector(".loader-wrapper");

// For clearing signup form
function cleardata() {
    document.getElementById("contact").value = "";
    document.getElementById("password").value = "";
    document.getElementById("confirmPassword").value = "";
}

$("#signup").on("click", function (e) {
  e.preventDefault();
  let contact = document.getElementById("contact").value;
  let password = document.getElementById("password").value;
  let confirmPassword = document.getElementById("confirmPassword").value;

    if(contact == ""){
        document.getElementById("liveToast").style.backgroundColor = "#ffc107";
        document.getElementById(
          "toast-body"
        ).innerHTML = `<h6><i class="fa-solid fa-circle-info"> <span style="letter-spacing:1px;"> WARNING</span></i></h6><h6>Fill Contact Field</h6>`;
        toast.show();
        return;
    }
    if(password == ""){
        document.getElementById("liveToast").style.backgroundColor = "#ffc107";
        document.getElementById(
          "toast-body"
        ).innerHTML = `<h6><i class="fa-solid fa-circle-info"> <span style="letter-spacing:1px;"> WARNING</span></i></h6><h6>Fill Password Field</h6>`;
        toast.show();
        return;
    }
    if(confirmPassword == ""){
        document.getElementById("liveToast").style.backgroundColor = "#ffc107";
        document.getElementById(
          "toast-body"
        ).innerHTML = `<h6><i class="fa-solid fa-circle-info"> <span style="letter-spacing:1px;"> WARNING</span></i></h6><h6>Fill Confirm Password Field</h6>`;
        toast.show();
        return;
    }


//   console.log(password, contact);

  $(".loader-wrapper").css("visibility", "visible");
  $(".loader-wrapper").show();
  $(".loader").show();
  $.ajax({
    url: "signup.php",
    type: "POST",
    data: {
      contact: contact,
      password: password,
      confirmPassword: confirmPassword,
    },
    success: function (data) {
    //   console.log(data);

      $("#signupModal").modal("hide");
      document.getElementById("contact").value = "";
      document.getElementById("password").value = "";
      document.getElementById("confirmPassword").value = "";
      
      if (data == "Data Inserted Successfully") {
        document.getElementById("liveToast").style.backgroundColor = "#1aa179";
        document.getElementById(
          "toast-body"
        ).innerHTML = `<h6><i class="fa-solid fa-circle-info"> <span style="letter-spacing:1px;"> SUCCESS</span></i></h6><h6>${data}</h6>`;
        toast.show();
        // return;
      } else if (data == "Password Mismatched") {
        document.getElementById("liveToast").style.backgroundColor = "#ffc107";
        document.getElementById(
          "toast-body"
        ).innerHTML = `<h6><i class="fa-solid fa-circle-info"> <span style="letter-spacing:1px;"> WARNING</span></i></h6><h6>${data}</h6>`;
        toast.show();
        // return;
      } else {
        document.getElementById("liveToast").style.backgroundColor = "#dc3545";
        document.getElementById(
          "toast-body"
        ).innerHTML = `<h6><i class="fa-solid fa-circle-info"> <span style="letter-spacing:1px;"> ERROR </span></i></h6><h6>${data}</h6>`;
        toast.show();
        // return;
      }

      $(".loader").hide();
      $(".loader-wrapper").css("visibility", "hidden");
      $(".loader-wrapper").hide();

    },
  });
});
