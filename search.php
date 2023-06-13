<?php
include('nav.php');
?>

<section class="header">
<div class="container">  
 
       <div class="container mt-3 text-alight-center">
         <input  type="text" id="livesearch" name="livesearch" class="form-control form-control-sm" width="50%" placeholder="Search for Hall " autocomplete="off" >
         <div id="searchResult">
       </div>
 </div>
  
 </div>
 <?php

 include('halls.php');




?>
</section>


<script type="text/javascript">

$(document).ready(function(){

  $('#livesearch').keyup(function(e){
    var input = $(this).val(); 
   //alert(input)
   e.preventDefault();
   if(input !=""){
    $.ajax({
      url:"../search_handler.php",
      method :"POST",
      data : {input : input},

      success:function(data){
      
        $('#searchResult').html(data);
      }
    })
   }
   else{
    $('#searchResult').css('display','none');
   }
  })

})




</script>







