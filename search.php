<?php
include('nav.php');
?>
<style>

</style>
<section class="header">
<div class="container">  
   
   <form action="#" method="post">
       <div class="container mt-3 text-alight-center">
         <input  type="text" id="key" name="key" onkeyup="search()"  class="form-control form-control-sm" width="50%" placeholder="Search for Hall " >
       </div>
       
   </form>
 
 </div>

 <?php

 include('halls.php');

?>


<script>

function search(key){
    $.ajax({
      url:"searchProcess.php",
      type:"post",
      data:{key:key},
      success:function(data,status){
        alert("successfull deleted ");
        displayData();
      }
    });
  }



</script>



