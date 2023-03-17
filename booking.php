<?php
include('nav.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
    * {
        margin: 0;
        padding: 0;
        overflow: hidden;
        box-sizing: border-box;
    }

    body {
        height: 100%;
        width: 100%;


    }

    label {
        top: 45%;
        left: 60%;
        position: relative;
        font-size: 25px;
        color: #7d2ae8;
        cursor: pointer;
    }

    label input {

        position: absolute;
        opacity: 0;
    }

    .input-check {
        position: relative;
        display: inline-block;
        top: 5px;
        width: 30px;
        height: 30px;
        border: 2px solid #ccc;
        border-radius: 4px;
        margin-right: 5px;
        transition: .5s;

    }

    label input:checked~.input-check {
        background: #7d2ae8;
        border-color: #7d2ae8;
        animation: animate .7s ease;
    }

    @keyframes animate {
        0% {
            transform: scale(1)
        }

        40% {
            transform: scale(1.3, .7)
        }

        55% {
            transform: scale(1)
        }

        70% {
            transform: scale(1.2, .8)
        }

        80% {
            transform: scale(1)
        }

        90% {
            transform: scale(1)
        }

        100% {
            transform: scale(1.2, .9)
        }

    }

    .input-check::before {
        content: "";
        position: absolute;
        width: 15px;
        height: 6px;
        top: 6px;
        left: 4px;
        border-bottom: 4px solid #fff;
        border-left: 4px solid #fff;
        transform: scale(0) rotate(-45deg);
        transition: .5s;

    }

    label input:checked~.input-check::before {
        transform: scale(1) rotate(-45deg);
    }



    .container {
        display: flex;

        justify-content: center;
        position: absolute;
        top: 45%;
        left: 23%;
        transform: translate(-50%, -50%);
    }

    .imag {
        border-radius: 10px;
    }
    </style>
</head>

<body>
   
    <div class="container mt-5">
        <div class="card">
            <div class="imag">
                <img src="image//save.jpg" height=900%; width=500; alt="">
</div>
  <div class="card-body">
  <h7 class="card-title"> Location : km5</h5><br>
    <h7 class="card-title">Price:15$ per person</h5>
    <p class="card-text">Capacity: 6000</p>
    <p class="card-text">we welcome you with open hands</p>
  </div>
           

        </div>

    </div>
 <center>
 <h2 class="mt-3 text-align-center fs-4">Hall Details</h2>
 </center>
   
  
    
<section class="conatiner">
    
<div>
        <label>
            <input type="checkbox">
            <span class="input-check"></span>
            Aircondition 12$
        </label>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br>
        <label>
            <input type="checkbox">
            <span class="input-check"></span>
            Aircondition 12$
           
    
        </label> <br>
        <label>
            <input type="checkbox">
            <span class="input-check"></span>
            Aircondition 12$
        </label> <br>
        <label>
            <input type="checkbox">
            <span class="input-check"></span>
            Aircondition 12$
        </label>
    </div>
</section>
    
<!-- hnh -->


</body>

</html>