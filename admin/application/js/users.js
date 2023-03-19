

$("#AddNew").on("click", function(){
    $("#UsersModal").modal("show");
   
})

$(document).ready(function(){
                   

    alert('hellow wolrd')
})

$("#UsersForm").on("submit", function(e){
    e.preventDefault();

    let UserName = $("#UserName").val();
    let Password = $("#Password").val();
    let Tell = $("#Tell").val();
    let UserType = $("#UserType").val();
    let UserStatus = $("#UserStatus").val();

    if(UserName == ""){
        toastr.error("Please Enter User Name...");
        return;
    }
    if(Password == ""){
        toastr.error("Please Enter Password...");
        return;
    }
    if(Tell == ""){
        toastr.error("Please Enter Tell...");
        return;
    }
    if( UserType == null){
        toastr.error("Please Choose User Type...");
        return;
    }
    if( UserStatus == null){
        toastr.error("Please Choose User Status...");
        return;
    }
  
    let sendingData = {
        "UserName": UserName,
        "Password": Password,
        "Tell": Tell,
        "UserType": UserType,
        "UserStatus": UserStatus,
        "action": "RegisterUsers"
    }
    
    $.ajax({
        method: "POST",
        dataType: "JSON",
        url : "../api/users.php",
        data : sendingData,
        success: function(data){

            console.log(data);
        },
        error: function(data){

        }
    })


})

