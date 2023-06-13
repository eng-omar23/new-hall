<?php
include("conn.php");
include("nav.php");
?>
<style>
  .card{
    margin-right: 45px;
    margin-top: 25px;
    margin-left: 45px;
    margin-bottom: 49px;
  }
</style>
<div class="container-fluid text-center ">
    <div class="row row-cols-12 rows-md-4 g-3">
<?php

if(isset($_POST['input'])){
    $key = $_POST['input'];
$query=mysqli_query($conn,"select * from halls  where hall_type like '{$key}%'");
if(mysqli_num_rows($query)>0){
while($data=mysqli_fetch_array($query)){
?>
<div class="card" style="width: 15rem;">
  <img class="card-img-top" src="<?php echo $data['hall_photo']?>" height=45%; width=45; alt="Card image cap">
  <div class="card-body">
  <h7 class="card-title">Location:<?php echo $data['location']?></h5><br>
    <h7 class="card-title">Price:<?php echo $data['charge_perhead']?>$ per person</h5>
    <p class="card-text">Capacity:<?php echo $data['capacity']?> Persons</p>
    
    <a href="viewDetails.php?id=<?php echo $data['hall_id']?>" class="btn btn-primary">View Detai</a>
  </div>
</div>
  <?php
}
}
else if(empty($key)){
    header("location : search.php");
}
else{
  echo "<h7 class='text-danger text-center mt-3'> No Data Found</h5>";
}
?>
</div>

</div>
<?php
}