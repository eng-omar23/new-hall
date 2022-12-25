<?php 
include("conn.php");
include("nav.php");
?> 
<style>

body{
    background-color: white;
    background: #000;
    color:white;
    text-align: center;
    background-color: white;
}
.container{
     margin-top: 55px;
}

</style>

<div class="container justify-center mt-5">
    <div class="card shadow">
        <div class="card-header bg bg-dark text-center">Hall Registration</div>
        <div class="card-body">

  <div class="alert alert-danger" id="error"> </div>
<div class="alert alert-success" id="success"></div>
            <form id="fall_form" method="Post" action="facility_handler.php" >
                
                <input type="hidden"name="facilityid" id="facilityid">

  <label class="form-label">Facility Name</label>
                <input type="text"name="name" id="name" class="form-control" placeholder="Enter Facility Name">
               
                <label class="form-label">Price</label>

                <input type="text"name="price" id="price" class="form-control" placeholder="Enter facility Price ">

                
               
                <input type="submit" value="Save" class="btn btn-primary btn-sm mt-2 float-right">
</form>
</div>
</div>
</div>

            <script>
                $(document).ready(function(){
      
                    $("#error").css("display","none");
                    $("#success").css("display","none");
                })
             $("#fall_form").submit(function(e){   
          
          

                e.preventDefault();

                $.ajax({
                    url:"facility_handler.php",
                    data: new FormData($(this)[0]),
                    cache: false,
                    contentType: false,
                    processData: false,
                    method: 'POST',
                    type: 'POST',
                    success:function(resp){
         
                        var res=jQuery.parseJSON(resp);
                        if (res.status==200){
                            $("#success").css("display","block");
                            $("#success").text(res.message);
                        }
                        else if (res.status==404){
                            $("#success").css("display","none");
                            $("#error").css("display","block");
                            $("#error").text(res.message);
                        }
                    }
                });


             });
            
            </script>
        </div>

 