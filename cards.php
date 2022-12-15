<?php

include("nav.php");
?>
<style>
  .card{
    margin-right: 45px;
    margin-top: 95px;
    margin-left: 45px;
   
  }
  body{
    background-color: white;
  }

</style>
<div class="container text-center ">
    <div class="row row-cols-4 rows-md-3 g-3">

<?php

$query=mysqli_query($conn,"select * from company_reg");
if(mysqli_num_rows($query)>1){
while($data=mysqli_fetch_array($query)){
?>


<div class="card" style="width: 15rem;">
  <img class="card-img-top" src="<?php echo $data['company_logo']?>" height=45%; width=45; alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo $data['Name']?></h5>
    <p class="card-text"><?php echo $data['Description']?></p>
    <a href="halls.php?id=<?php echo $data['id']?>" class="btn btn-primary">View Halls</a>
  </div>
</div>
  <?php
}
}
else{
  echo "No data Data Available";
}
?>


</div>

</div>