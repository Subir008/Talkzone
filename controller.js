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

// For clearing login form
function clearlogindata() {
  document.getElementById("login_password").value = "";
  document.getElementById("login_contact").value = "";
}

// For adding signup data
$("#signup").on("click", function (e) {
  e.preventDefault();
  let contact = document.getElementById("contact").value;
  let password = document.getElementById("password").value;
  let confirmPassword = document.getElementById("confirmPassword").value;

  if (contact == "") {
    document.getElementById("liveToast").style.backgroundColor = "#ffc107";
    document.getElementById(
      "toast-body"
    ).innerHTML = `<h6><i class="fa-solid fa-circle-info"> <span style="letter-spacing:1px;"> WARNING</span></i></h6><h6>Fill Contact Field</h6>`;
    toast.show();
    return;
  }
  if (password == "") {
    document.getElementById("liveToast").style.backgroundColor = "#ffc107";
    document.getElementById(
      "toast-body"
    ).innerHTML = `<h6><i class="fa-solid fa-circle-info"> <span style="letter-spacing:1px;"> WARNING</span></i></h6><h6>Fill Password Field</h6>`;
    toast.show();
    return;
  }
  if (confirmPassword == "") {
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

$("#login").on("click", function (e) {
  e.preventDefault();
  let login_contact = document.getElementById("login_contact").value;
  let login_password = document.getElementById("login_password").value;

  if (login_contact == "") {
    document.getElementById("liveToast").style.backgroundColor = "#ffc107";
    document.getElementById(
      "toast-body"
    ).innerHTML = `<h6><i class="fa-solid fa-circle-info"> <span style="letter-spacing:1px;"> WARNING</span></i></h6><h6>Fill Contact Field</h6>`;
    toast.show();
    return;
  }
  if (login_password == "") {
    document.getElementById("liveToast").style.backgroundColor = "#ffc107";
    document.getElementById(
      "toast-body"
    ).innerHTML = `<h6><i class="fa-solid fa-circle-info"> <span style="letter-spacing:1px;"> WARNING</span></i></h6><h6>Fill Password Field</h6>`;
    toast.show();
    return;
  }

  $.ajax({
    url : "login.php",
    type : "POST",
    data : {
      contact : login_contact,
      password : login_password
    },
    success : function (data){
      console.log(data);
      if (data == "Invalid Contact"){
        $("#alert").css("display","block");
       document.getElementById('alert').innerHTML = `<strong><p> ${data} </p></strong>
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>`;
      }
    },
  });
});

$("#comment-submit").on("click", function () {
  let forum_id = document.getElementById("forum_id").value;
  let comment = document.getElementById("comment").value;

  if (comment == "") {
    document.getElementById("liveToast").style.backgroundColor = "#ff493d";
    document.getElementById(
      "toast-body"
    ).innerHTML = `<h6 ><i class="fa-solid fa-circle-info"> <span style="letter-spacing:1px;" > WARNING</span></i></h6><h6 class="text-light">Comment Field is Blank </h6>`;
    toast.show();
    return;
  }

  console.log(forum_id);
  console.log(comment);
  $(".loader-wrapper").css("visibility", "visible");
  $(".loader-wrapper").show();
  $(".loader").show();

  $.ajax({
    url: "add-comments.php",
    type: "POST",
    data: {
      forum_id: forum_id,
      comment: comment,
    },
    success: function (data) {
      // console.log(data);

      document.getElementById("comment").value = "";

      if (data == "Comment Added Successfully") {
        document.getElementById("liveToast").style.backgroundColor = "#1aa179";
        document.getElementById(
          "toast-body"
        ).innerHTML = `<h6><i class="fa-solid fa-circle-info"> <span style="letter-spacing:1px;"> SUCCESS</span></i></h6><h6>${data}</h6>`;
        toast.show();
      } else {
        document.getElementById("liveToast").style.backgroundColor = "#dc3545";
        document.getElementById(
          "toast-body"
        ).innerHTML = `<h6><i class="fa-solid fa-circle-info"> <span style="letter-spacing:1px;"> ERROR </span></i></h6><h6>${data}</h6>`;
        toast.show();
      }

      $(".loader").hide();
      $(".loader-wrapper").css("visibility", "hidden");
      $(".loader-wrapper").hide();
      document.location.reload();
    },
  });
});
