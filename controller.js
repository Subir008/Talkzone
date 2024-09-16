const toastLiveExample = document.getElementById("liveToast");
const toast = new bootstrap.Toast(toastLiveExample);
const loader = document.querySelector(".loader");
const loaderwrapper = document.querySelector(".loader-wrapper");

$(document).ready(function (){

  // Storing the search parameter from the url in a variable 
  // For example, if the current URL is https://example.com/path?a=1&b=2&id=123, 
  // the KeyValues variable would hold the string "?a=1&b=2&id=123".
  const KeyValues = window.location.search;

  // Creating a URLSearchParams Object
  const urlParam = new URLSearchParams(KeyValues);

  // Extracting the 'id' Parameter from the url parameter
  const id = urlParam.get('id');
  
  // console.log(id);

  // Comment Load section
  function loadComment(page) {
    $.ajax({
      url: "forum-comment-load.php",
      type: "POST",
      data: { 
        page_no : page,
        id : id
      },
      success : function (data) {
        if(data){
          $('#pagination').remove();
          $("#comment-box").append(data);
        }else{
          $('#loadmore').html("No more comments to load");
          $('#loadmore').prop("disabled",true);
        }
      }
    });
  }
  loadComment();

  $(document).on("click" , "#loadmore" , function () {
    var pid = $(this).data("id");
    $('#loadmore').html("loading ....");
    loadComment(pid);
  });
});

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

// For login functionality
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

  $(".loader-wrapper").css("visibility", "visible");
  $(".loader-wrapper").show();
  $(".loader").show();
  $.ajax({
    url : "login.php",
    type : "POST",
    data : {
      contact : login_contact,
      password : login_password
    },
    success : function (data){
      console.log(data);
      if (data == "Login Successfull"){
        $("#loginModal").modal("hide");
        $('html, body').animate({
          scrollTop: $("#alert").offset().top
        }, );
        $("#alert").css("display","block");
          document.getElementById('alert').innerHTML = `<div class="alert alert-success alert-dismissible fade show" role="alert">
           <strong><p> ${data} </p></strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`;

          window.location.href = "index.php";
      }
     else if (data == "Invalid Contact"){
          $("#loginModal").modal("hide");
          $('html, body').animate({
            scrollTop: $("#alert").offset().top
        }, );
        $("#alert").css("display","block");
       document.getElementById('alert').innerHTML = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
       <strong><p> ${data}!!! </p></strong>
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>`;
      }
      else if (data == "Invalid Password"){
        $("#loginModal").modal("hide");
        $('html, body').animate({
          scrollTop: $("#alert").offset().top
        }, );
        $("#alert").css("display","block");
       document.getElementById('alert').innerHTML = `<div class="alert  alert-danger alert-dismissible fade show" role="alert">
       <strong><p> ${data}!!! </p></strong>
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>`;
      }

      $(".loader").hide();
      $(".loader-wrapper").css("visibility", "hidden");
      $(".loader-wrapper").hide();
    },
  });
});

//For logout functionlity
$(".logged-out").on("click", function (e) {
  e.preventDefault();

  $.ajax({
    url: 'logout.php',
    success: function (data) {
      // console.log(data);

      $('html, body').animate({
        scrollTop: $("#alert").offset().top
      }, );
      $("#alert").css("display","block");
      document.getElementById('alert').innerHTML = `<div class="alert  alert-info alert-dismissible fade show" role="alert">
       <strong><p> ${data} </p></strong>
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>`;
       window.location.href = "index.php";
    }
  });
});

// Comment Submiting to the dB
$("#comment-submit").on("click", function () {
  let forum_id = document.getElementById("forum_id").value;
  let comment = document.getElementById("comment").value;
  let user_id = document.getElementById("user_id").value;

  if (comment == "") {
    document.getElementById("liveToast").style.backgroundColor = "#dd0426";
    document.getElementById(
      "toast-body"
    ).innerHTML = `<h6 ><i class="fa-solid fa-circle-info"> <span style="letter-spacing:1px;" > WARNING</span></i></h6><h6 class="text-light">Comment Field is Blank </h6>`;
    toast.show();
    return;
  }

  // console.log(forum_id);
  // console.log(comment);
  // console.log(user_id);
  $(".loader-wrapper").css("visibility", "visible");
  $(".loader-wrapper").show();
  $(".loader").show();

  $.ajax({
    url: "add-comments.php",
    type: "POST",
    data: {
      forum_id: forum_id,
      comment: comment,
      user_id: user_id,
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

// Adding new discussion
$("#discussion-submit").on("click" , function (e) {

  e.preventDefault();
  // Getting the value from user
  let userId = document.getElementById("user_id").value;
  let discussiontitle = document.getElementById("discussion-title").value; 
  let discussiondetails = document.getElementById("discussion-details").value; 

  // Toaster of error if blank
  if(discussiontitle == ""){
    document.getElementById("liveToast").style.backgroundColor = "#dd0426";
    document.getElementById(
      "toast-body"
    ).innerHTML = `<h6 ><i class="fa-solid fa-circle-info"> <span style="letter-spacing:1px;" > WARNING</span></i></h6><h6 class="text-light"> Discussion Title is Blank </h6>`;
    toast.show();
    return;
  }

  if(discussiondetails == ""){
    document.getElementById("liveToast").style.backgroundColor = "#dd0426";
    document.getElementById(
      "toast-body"
    ).innerHTML = `<h6 ><i class="fa-solid fa-circle-info"> <span style="letter-spacing:1px;" > WARNING</span></i></h6><h6 class="text-light">Discussion Details is Blank </h6>`;
    toast.show();
    return;
  }

  //Showing the toaster
  $(".loader-wrapper").css("visibility", "visible");
  $(".loader-wrapper").show();
  $(".loader").show();

  $.ajax({
    url: "add-discussion.php",
    type: "POST",
    data: {
      userId: userId,
      discussiontitle: discussiontitle,
      discussiondetails: discussiondetails
    },
    success: function (data) {
      if(data == "success"){
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

      // Closing the toaster
      $(".loader").hide();
      $(".loader-wrapper").css("visibility", "hidden");
      $(".loader-wrapper").hide();
      document.location.reload();
    }

  });


});

