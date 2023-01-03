<?php
include("header.php");
include("conn.php");
?>

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
      <a class="nav-link" id='a' href="#">Home <i class="fa fa-home"></i></a>
    </li>
    <li class="nav-item ">
      <a class="nav-link" id='a' href="contact.php">Contact<i class="fa fa-address-book"></i></a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" id='a' href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       Register<i class="fa fa-registered"></i>
      </a>
      <div class="dropdown-menu"   aria-labelledby="navbarDropdownMenuLink">
      <a class="dropdown-item"   href="comRegister.php">Business</a>
      <a class="dropdown-item"   href="hall_Reg.php">Hall</a>
       
      </div>
    <li class="nav-item ">
      <a class="nav-link" id='a' href="login.php">Sign/Signup<i class="fas fa-sign-in-alt"></i></a>
    </li>


  </ul>

</nav>
