<?php

@include("../conn.php");
include("header.php");
?>

<style>
    @import url('https://fonts.googleapis.com/css?family=Quicksand:400,700');

    #a {
        color: white;
    }

    .form-control {
        margin-top: 5px;


    }
</style>
<?php
$id=$_GET['id'];
$query=mysqli_query($conn,"select * from company_reg  where id='$id'");
$data=mysqli_fetch_array($query);

?>
<nav class="navbar navbar-expand-sm navbar-light bg-dark fixed-top">
    <div class="container-fluid ">

        <a class="navbar-brand" id='a' href="#"><?php echo $data['Name']?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav ">
                <li class="nav-item ">
                    <a class="nav-link" id='a' href="#">Home </a>
                </li>
             
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id='a' href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Register</i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="Users.php">Users</a>
                        <a class="dropdown-item" href="../hall_Reg.php?id=<?php echo $data["id"];?>">Hall</a>
                         <a class="dropdown-item" href="../facility.php?id=<?php echo $data["id"];?>">facility</a>
                         <a class="dropdown-item" href="customers.php">customers</a>
                    </div>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id='a' href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Booking</i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="../comRegister.php?id=<?php echo $data["id"];?>">Booking</a>
                        <a class="dropdown-item" href="hall_Reg.php">Payment</a>
                         <a class="dropdown-item" href="hall_Reg.php">cancellation</a>
                         <a class="dropdown-item" href="hall_Reg.php">invoice</a>
                    </div>
                    
                <li class="nav-item ">
                    <a class="nav-link" id='a' href="login.php">log Out</a>
                </li>


            </ul>

</nav>