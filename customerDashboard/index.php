<?php
 session_start();	
include("header.php");
include("../conn.php");
?>
  <head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
		
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- font awesome -->
    <link  rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

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
<nav class="navbar navbar-expand-sm navbar-light bg-primary fixed-top">
<div class="container-fluid ">
	<?php
$id=$_SESSION['cust_id'];
$sql="select * from customers where custid='$id'";
$query=mysqli_query($conn,$sql);
if($query){
	$data=mysqli_fetch_array($query);
}
else{
	echo "No data returned";
}


?>
<a class="navbar-brand"  id='a' href="#"><?php echo $data['firstname']?></a>
<img src="../image/avatar.jpg" width="50" alt="Bootstrappin'">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
  <ul class="navbar-nav ">
    <li class="nav-item ">
      <a class="nav-link btn-primary" id='a' href="cus_dashboard.php"> <i class="fa fa-Dashboard"></i> Dashboard</a>
      <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle btn-primary" id='a' href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa-solid fa-action">
                        Actions</i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" onclick="getModal()">cancell Booking</a>
                        <a class="dropdown-item" href="rating.php">Review</a>
                        <a class="dropdown-item" onclick="get_postponeModal()">Postbone Event</a>
   
                        </div>
                    </li> 

 
                    <a class="nav-link btn-primary"  id='a' href="search.php">Notification<i class="fa-solid fa-bell"></i></a>
      <a class="nav-link" id='a' href="search.php">logout</a>
    </li>


  </ul>

</nav>

<div id="cancel_modal" class="modal" tabindex="-1" role="dialog">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<h5 class="modal-title">Cancel Booking</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>
	      	<div class="modal-body">
	
	        	<div class="form-group">
	        		<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" />
	        	</div>
	        	<div class="form-group">
	        		<textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
	        	</div>
	        	<div class="form-group text-center mt-4">
	        		<button type="submit" class="btn btn-primary" id="save_review">Submit</button>
	        	</div>
	      	</div>
    	</div>
  	</div>
</div>
<div id="postpone_modal" class="modal" tabindex="-1" role="dialog">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<h5 class="modal-title">Postpone Booking</h5>
	        	<button type="button" class="close" data-dismiss="postpone_modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>
	      	<div class="modal-body">
	
	        	<div class="form-group">
	        		<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" />
	        	</div>
	        	<div class="form-group">
	        		<textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
	        	</div>
	        	<div class="form-group text-center mt-4">
	        		<button type="submit" class="btn btn-primary" id="save_review">Submit</button>
	        	</div>
	      	</div>
    	</div>
  	</div>
</div>
<script src="jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>


    <script>
        function getModal(){
            $("#cancel_modal").show();
        }
        function get_postponeModal(){
            $("#postpone_modal").show();
        }
    </script>