<?php
include("conn.php");
include("Bussiness/home.php");
include("header.php");
?>
<style>

body{

    margin-top: 5%;

}


</style>

<div class="container justify-center mt-5">
    <div class="card shadow">
        <div class="card-header bg bg-info  text-center text-white">Hall Registration</div>
        <div class="card-body">

  <div class="alert alert-danger" id="error"> </div>
<div class="alert alert-success" id="success"></div>
            <form id="hall_form" method="Post" action="./hall/hall_handler.php" enctype="multipart/form-data">
                
                <input type="hidden"name="hallid" id="hallid">
                <label class="form-label">Company Name</label>
  <select class="form-control" id="company_id" name="company_id">
    <option value="">chooose your Parent Company</option>
    <?php 
    $_query=mysqli_query($conn,"select * from company_reg");
    if(mysqli_num_rows($_query)>0){
        $_query=mysqli_query($conn,"select * from company_reg");
        while($data=mysqli_fetch_array($_query)){
            ?>
            <option value="<?php echo $data["id"];?>"><?php echo $data['Name']?></option>
            <?php
        }
    }
    else{
        ?>
        <option value="">No data Available</option>
        <?php
    }
    ?>
  </select>
  <label class="form-label">Hall Type</label>
                <input type="text"name="type" id="type" class="form-control" placeholder="Enter Hall Type">
               
                <label class="form-label">Location</label>

                <input type="text"name="location" id="location" class="form-control" placeholder="Enter Hall Location">

                
                <label class="form-label">Capacity</label>
                <input type="text"name="capacity" id="capacity" class="form-control" placeholder="Enter hall capacity">
                
                <label class="form-label">Charge_perhead</label>
                <input type="text"name="charge_perhead" id="charge_perhead" class="form-control" placeholder="Enter Charging Amount">
                
                
                
                <label class="form-label">Hall Photo</label>
                <input type="file"name="photo" id="photo" class="form-control">
                <label class="form-label" for="date">Date</label>
               
                <input type="date" id="date" name="mdate" class="form-control">

                <label class="form-label">Hall Description </label>
      <textarea class="form-control" id='desc' name="desc" id="comment"></textarea>
               
                <input type="submit" value="Save" class="btn btn-primary btn-sm mt-2 float-right">
                <a href="./hall/hview.php?id=<?php echo $id ?>"class="btn btn-success btn-sm mt-2 mr-4 float-right">View record</a>

</form>
</div>
</div>
</div>

            <script>
                $(document).ready(function(){
      
                    $("#error").css("display","none");
                    $("#success").css("display","none");
                })
             $("#hall_form").submit(function(e){   
       
          

                e.preventDefault();

                $.ajax({
                    url:"./hall/hall_handler.php",
                    data: new FormData($(this)[0]),
                    cache: false,
                    contentType: false,
                    processData: false,
                    method: 'POST',
                    type: 'POST',
                    success:function(resp){
                        alert(resp)
                  
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

 