<?php
include("conn.php");
include("nav.php");
?>
<style>
  .card{
    margin-right: 45px;
    margin-top: 85px;
    margin-left: 45px;
    margin-bottom: 49px;
  }
</style>
<div class="container-fluid text-center ">
    <div class="row row-cols-12 rows-md-4 g-3">
<?php
@$id=$_GET['id'];
$query=mysqli_query($conn,"select * from halls where hall_id='$id'");
if(mysqli_num_rows($query)>0){
while($data=mysqli_fetch_array($query)){
?>
<div class="card" style="width: 15rem;">
  <img class="card-img-top" src="<?php echo $data['hall_photo']?>" height=75%; width=75; alt="Card image cap">
  <div class="card-body">
  <h7 class="card-title">Location:<?php echo $data['location']?></h5><br>
    <h7 class="card-title">Price:<?php echo $data['charge_perhead']?>$</h5>
    <p class="card-text">Capacity:<?php echo $data['capacity']?> Persons</p>
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