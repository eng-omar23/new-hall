<?php
include("header.php");
include("conn.php");
?>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
@import url('https://fonts.googleapis.com/css?family=Quicksand:400,700');
  #a{
color:white;
  }

  .form-control{
    margin-top: 5px;
   

  }
  
 
    </style>
<nav class="navbar navbar-expand-sm navbar-light bg-info fixed-top">
<div class="container-fluid ">

<a class="navbar-brand"  id='a' href="#">Hall Booking Platform</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
  <ul class="navbar-nav ">
    <li class="nav-item ">
      <a class="nav-link" id='a' href="search.php"><i class="fa-sharp fa-solid fa-house-fire"></i>Home</a>
      </li>
    <li class="nav-item ">
      <a class="nav-link" id='a' href="contact.php"><i class="fa-sharp fa-solid fa-id-card "></i>Contact</i></a>
</li>


 
      <li>
              <a class="nav-link" id='a' href="login.php"><i class="fa-solid fa-lock"></i>SignIn</a>
    </li>


  </ul>

</nav>

