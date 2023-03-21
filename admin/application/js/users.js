

$("#AddNew").on("click", function(){
    $("#UsersModal").modal("show");
   
})

$(document).ready(function() {

alert('hwlloe')


})
$("#UsersForm").submit(function(e) {
    e.preventDefault();
    $.ajax({
        url: "../api/users.php",
        data: new FormData($(this)[0]),
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST',
        success: function(resp) {
            alert(resp)

            var res = jQuery.parseJSON(resp);
            if (res.status == 200) {
                $("#success").css("display", "block");
                $("#success").text(res.message);
            } else if (res.status == 404) {
                $("#success").css("display", "none");
                $("#error").css("display", "block");
                $("#error").text(res.message);
            }
        }
    });


});

