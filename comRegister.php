<?php 
include("conn.php");
include("nav.php");
?> 
<style>

body{

    margin-top: 5%;

}


</style>

<div class="container justify-center mt-5">
    <div class="card shadow">
        <div class="card-header bg bg-info  text-center text-white">Company Registration</div>
        <div class="card-body">

  <div class="alert alert-danger" id="error"> </div>
<div class="alert alert-success" id="success"></div>
            <form id="company_reg" method="Post" action="./company/comprocess.php" enctype="multipart/form-data">
                
                <input type="hidden"name="cid" id="cid">
                

                <label class="form-label">company Name</label>
                <input type="text"name="Name" id="Name" class="form-control" placeholder="Enter Company Name">
               
                <label class="form-label">Email</label>

                <input type="text"name="Email" id="Email" class="form-control" placeholder="Enter Company Emal">

                
                <label class="form-label">Company Address</label>
                <input type="text"name="Address" id="Address" class="form-control" placeholder="Enter Company Locaton">
                
                <label class="form-label">Phone</label>
                <input type="text"name="Phone" id="Phone" class="form-control" placeholder="Enter Company Phone ">
                
                
                
                <label class="form-label">Company Photo</label>
                <input type="file"name="Logo" id="logo" class="form-control">
        

                <label class="form-label">Company Description </label>
      <textarea class="form-control" id='desc' name="desc" id="comment"></textarea>
               
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
             $("#company_reg").submit(function(e){ 
              
          

                e.preventDefault();

                $.ajax({
                    url:"./company/comprocess.php",
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
                            $("#error").css("display","none");
                            $("#success").text(res.message);
                        }
                        else if (res.status==404){
                            $("#success").css("display","none");
                            $("#error").css("display","block");
                            $("#success").text(res.message);
                        }
                    }
                });


             });
            
            </script>
        </div>

 