const toastliveToastImage = document.getElementById("liveToastImage");
const imagetoast = new bootstrap.Toast(liveToastImage);

// Adding new discussion
$("#discussion-submit").on("submit" , function (e) {

    e.preventDefault();
    // Getting the value from user
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
      data: new FormData(this),
      contentType: false,
      processData : false,
      success: function (data) {
        // console.log(data);
        let text = data ;
  
        // Split the text into an array using the <br> tag as the separator
        let resultArray =  text.split('<br>');
        let imageUploadStatus = resultArray[0];
        let discussionAddedStatus = resultArray[1];
  
        // Toaster of Image Submission
        if(imageUploadStatus == "Image Uploaded Successfully"){ 
          document.getElementById("liveToastImage").style.backgroundColor = "#1aa179";
          document.getElementById(
            "image-toast-body"
          ).innerHTML = `<h6><i class="fa-solid fa-circle-info"> <span style="letter-spacing:1px;"> SUCCESS</span></i></h6><h6>${imageUploadStatus}</h6>`;
          imagetoast.show();
        }else{
          document.getElementById("liveToastImage").style.backgroundColor = "#dc3545";
          document.getElementById(
            "image-toast-body"
          ).innerHTML = `<h6><i class="fa-solid fa-circle-info"> <span style="letter-spacing:1px;"> ERROR </span></i></h6><h6>${imageUploadStatus}</h6>`;
          imagetoast.show();
        }
        
        // Toaster of discussion submission
        if(discussionAddedStatus == "Discussion Added Successfully"){
          document.getElementById("liveToast").style.backgroundColor = "#1aa179";
          document.getElementById(
            "toast-body"
          ).innerHTML = `<h6><i class="fa-solid fa-circle-info"> <span style="letter-spacing:1px;"> SUCCESS</span></i></h6><h6>${discussionAddedStatus}</h6>`;
          toast.show();
        }else{
          document.getElementById("liveToast").style.backgroundColor = "#dc3545";
          document.getElementById(
            "toast-body"
          ).innerHTML = `<h6><i class="fa-solid fa-circle-info"> <span style="letter-spacing:1px;"> ERROR </span></i></h6><h6>${discussionAddedStatus}</h6>`;
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
  