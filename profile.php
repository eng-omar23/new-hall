<?php 
 include("nav.php");
 include("conn.php");

 ?>
<style>

.cards-wrapper {
  display: flex;
  justify-content: center;
}
.card img {
  max-width: 100%;
  max-height: 100%;
}
.card {
  margin: 0 0.5em;
  box-shadow: 2px 6px 8px 0 rgba(22, 22, 26, 0.18);
  border: none;
  border-radius: 0;
}
.carousel-inner {
  padding: 1em;
}
.carousel-control-prev,
.carousel-control-next {
  background-color: black;
  width: 5vh;
  height: 5vh;
  border-radius: 50%;
  top: 50%;

  transform: translateY(-50%);
}
@media (min-width: 768px) {
  .card img {
    height: 11em;
  }
}
</style>
<?php
$query=mysqli_query($conn,"select * from company_reg where id=9");
$data=mysqli_fetch_array($query);
?>
    <div class="container-fliud mt-5">
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="cards-wrapper">
      <div class="card">
        <img src="<?php echo $data['company_logo']?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?php echo $data['Name']?></h5>
          <h7 class="card-title"><?php echo $data['phone']?></h7>
          <p class="card-text"><?php echo $data['Description']?></p>
          <a href="halls.php?id=<?php echo $data['id']?>" class="btn btn-primary">See Available halls<a>
        </div>
      </div>
      <?php
      $query=mysqli_query($conn,"select * from company_reg where id=10");
      $data=mysqli_fetch_array($query);
      ?>
      <div class="card d-none d-md-block">
      <img src="<?php echo $data['company_logo']?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?php echo $data['Name']?></h5>
          <h7 class="card-title"><?php echo $data['phone']?></h7>
          <p class="card-text"><?php echo $data['Description']?></p>
          <a href="halls.php?id=<?php echo $data['id']?>" class="btn btn-primary">See Available halls<a>
        </div>
      </div> <?php
      $query=mysqli_query($conn,"select * from company_reg where id=11");
      $data=mysqli_fetch_array($query);
      ?>
      <div class="card d-none d-md-block">
      <img src="<?php echo $data['company_logo']?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?php echo $data['Name']?></h5>
          <h7 class="card-title"><?php echo $data['phone']?></h7>
          <p class="card-text"><?php echo $data['Description']?></p>
          <a href="halls.php?id=<?php echo $data['id']?>" class="btn btn-primary">See Available halls<a>
        </div>
      </div><?php
      $query=mysqli_query($conn,"select * from company_reg where id=12");
      $data=mysqli_fetch_array($query);
      ?>
      <div class="card d-none d-md-block">
      <img src="<?php echo $data['company_logo']?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?php echo $data['Name']?></h5>
          <h7 class="card-title"><?php echo $data['phone']?></h7>
          <p class="card-text"><?php echo $data['Description']?></p>
          <a href="halls.php?id=<?php echo $data['id']?>" class="btn btn-primary">See Available halls<a>
        </div>
      </div>
 
      
    </div>
    </div>
    <?php
         $query=mysqli_query($conn,"select * from company_reg where id=13");
         $data=mysqli_fetch_array($query);
    ?>
    <div class="carousel-item">
      <div class="cards-wrapper">
        <div class="card">
        <img src="<?php echo $data['company_logo']?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?php echo $data['Name']?></h5>
          <h7 class="card-title"><?php echo $data['phone']?></h7>
          <p class="card-text"><?php echo $data['Description']?></p>
          <a href="halls.php?id=<?php echo $data['id']?>" class="btn btn-primary">See Available halls<a>
          </div>
        </div>
        <?php
      $query=mysqli_query($conn,"select * from company_reg where id=15");
      $data=mysqli_fetch_array($query);
      ?>
      <div class="card d-none d-md-block">
      <img src="<?php echo $data['company_logo']?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?php echo $data['Name']?></h5>
          <h7 class="card-title"><?php echo $data['phone']?></h7>
          <p class="card-text"><?php echo $data['Description']?></p>
          <a href="halls.php?id=<?php echo $data['id']?>" class="btn btn-primary">See Available halls<a>
        </div>
      </div>
      <?php
      $query=mysqli_query($conn,"select * from company_reg where id=15");
      $data=mysqli_fetch_array($query);
      ?>
      <div class="card d-none d-md-block">
      <img src="<?php echo $data['company_logo']?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?php echo $data['Name']?></h5>
          <h7 class="card-title"><?php echo $data['phone']?></h7>
          <p class="card-text"><?php echo $data['Description']?></p>
          <a href="halls.php?id=<?php echo $data['id']?>" class="btn btn-primary">See Available halls<a>
        </div>
      </div>   
      <?php
      $query=mysqli_query($conn,"select * from company_reg where id=11");
      $data=mysqli_fetch_array($query);
      ?>
      <div class="card d-none d-md-block">
      <img src="<?php echo $data['company_logo']?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?php echo $data['Name']?></h5>
          <h7 class="card-title"><?php echo $data['phone']?></h7>
          <p class="card-text"><?php echo $data['Description']?></p>
          <a href="halls.php?id=<?php echo $data['id']?>" class="btn btn-primary">See Available halls<a>
        </div>
      </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="cards-wrapper">
        <div class="card">
        <img src="<?php echo $data['company_logo']?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?php echo $data['Name']?></h5>
          <h7 class="card-title"><?php echo $data['phone']?></h7>
          <p class="card-text"><?php echo $data['Description']?></p>
          <a href="halls.php?id=<?php echo $data['id']?>" class="btn btn-primary">See Available halls<a>
          </div>
        </div>
        <?php
      $query=mysqli_query($conn,"select * from company_reg where id=15");
      $data=mysqli_fetch_array($query);
      ?>
      <div class="card d-none d-md-block">
      <img src="<?php echo $data['company_logo']?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?php echo $data['Name']?></h5>
          <h7 class="card-title"><?php echo $data['phone']?></h7>
          <p class="card-text"><?php echo $data['Description']?></p>
          <a href="halls.php?id=<?php echo $data['id']?>" class="btn btn-primary">See Available halls<a>
        </div>
      </div>
      <?php
      $query=mysqli_query($conn,"select * from company_reg where id=15");
      $data=mysqli_fetch_array($query);
      ?>
      <div class="card d-none d-md-block">
      <img src="<?php echo $data['company_logo']?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?php echo $data['Name']?></h5>
          <h7 class="card-title"><?php echo $data['phone']?></h7>
          <p class="card-text"><?php echo $data['Description']?></p>
          <a href="halls.php?id=<?php echo $data['id']?>" class="btn btn-primary">See Available halls<a>
        </div>
      </div>   
      <?php
      $query=mysqli_query($conn,"select * from company_reg where id=11");
      $data=mysqli_fetch_array($query);
      ?>
      <div class="card d-none d-md-block">
      <img src="<?php echo $data['company_logo']?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?php echo $data['Name']?></h5>
          <h7 class="card-title"><?php echo $data['phone']?></h7>
          <p class="card-text"><?php echo $data['Description']?></p>
          <a href="halls.php?id=<?php echo $data['id']?>" class="btn btn-primary">See Available halls<a>
        </div>
      </div>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    </div>

