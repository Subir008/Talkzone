const toastliveToastImage = document.getElementById("liveToastImage");
const imagetoast = new bootstrap.Toast(liveToastImage);

// Updating Profile section
$("#personal_info").on("submit" , function (e) {
    e.preventDefault();

    //Showing the toaster
    $(".loader-wrapper").css("visibility", "visible");
    $(".loader-wrapper").show();
    $(".loader").show();
    
    $.ajax({
        url: "profile-update.php",
        type: "POST",
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function (data) {
            // console.log(data);

            let text = data ;
  
            // Split the text into an array using the <br> tag as the separator
            let resultArray =  text.split('<br>');
            let imageUpdateStatus = resultArray[0];
            let profileUpdateStatus = resultArray[1];
      
            // Toaster of Image Submission
            if(imageUpdateStatus == "Image Uploaded Successfully"){ 
              document.getElementById("liveToastImage").style.backgroundColor = "#1aa179";
              document.getElementById(
                "image-toast-body"
              ).innerHTML = `<h6><i class="fa-solid fa-circle-info"> <span style="letter-spacing:1px;"> SUCCESS</span></i></h6><h6>${imageUpdateStatus}</h6>`;
              imagetoast.show();
            }else{
              document.getElementById("liveToastImage").style.backgroundColor = "#dc3545";
              document.getElementById(
                "image-toast-body"
              ).innerHTML = `<h6><i class="fa-solid fa-circle-info"> <span style="letter-spacing:1px;"> ERROR </span></i></h6><h6>${imageUpdateStatus}</h6>`;
              imagetoast.show();
            }
            
            // Toaster of discussion submission
            if(profileUpdateStatus == "Data Updated Successfully"){
              document.getElementById("liveToast").style.backgroundColor = "#1aa179";
              document.getElementById(
                "toast-body"
              ).innerHTML = `<h6><i class="fa-solid fa-circle-info"> <span style="letter-spacing:1px;"> SUCCESS</span></i></h6><h6>${profileUpdateStatus}</h6>`;
              toast.show();
            }else{
              document.getElementById("liveToast").style.backgroundColor = "#dc3545";
              document.getElementById(
                "toast-body"
              ).innerHTML = `<h6><i class="fa-solid fa-circle-info"> <span style="letter-spacing:1px;"> ERROR </span></i></h6><h6>${profileUpdateStatus}</h6>`;
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