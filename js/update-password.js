$("#password_changes").on("click", function (e) {
  e.preventDefault();

  let user_id = document.getElementById("user_id").value;
  let current_password = document.getElementById("current_password").value;
  let new_password = document.getElementById("new_password").value;
  let confirm_password = document.getElementById("confirm_password").value;

  //Showing the toaster
  $(".loader-wrapper").css("visibility", "visible");
  $(".loader-wrapper").show();
  $(".loader").show();

  $.ajax({
    url: "update-password.php",
    type: "POST",
    data: {
      user_id: user_id,
      current_password: current_password,
      new_password: new_password,
      confirm_password: confirm_password,
    },
    success: function (data) {
      // console.log(data);

      if (data == "Password updated successfully") {
        document.getElementById("liveToast").style.backgroundColor = "#1aa179";
        document.getElementById(
          "toast-body"
        ).innerHTML = `<h6><i class="fa-solid fa-circle-info"> <span style="letter-spacing:1px;"> SUCCESS</span></i></h6><h6>${data}</h6>`;
        toast.show();
        logout();
      } else if (data == "Error updating password") {
        document.getElementById("liveToast").style.backgroundColor = "#dc3545";
        document.getElementById(
          "toast-body"
        ).innerHTML = `<h6><i class="fa-solid fa-circle-info"> <span style="letter-spacing:1px;"> ERROR </span></i></h6><h6>${data}</h6>`;
        toast.show();
      } else if (data == "New Password and Confirm Password do not match") {
        document.getElementById("liveToast").style.backgroundColor = "#dc3545";
        document.getElementById(
          "toast-body"
        ).innerHTML = `<h6><i class="fa-solid fa-circle-info"> <span style="letter-spacing:1px;"> ERROR </span></i></h6><h6>${data}</h6>`;
        toast.show();
      } else if (data == "Invalid Current Password") {
        document.getElementById("liveToast").style.backgroundColor = "#dc3545";
        document.getElementById(
          "toast-body"
        ).innerHTML = `<h6><i class="fa-solid fa-circle-info"> <span style="letter-spacing:1px;"> ERROR </span></i></h6><h6>${data}</h6>`;
        toast.show();
      }

      // Closing the toaster
      $(".loader").hide();
      $(".loader-wrapper").css("visibility", "hidden");
      $(".loader-wrapper").hide();

      
    },
  });
});
