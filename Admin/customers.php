<?php 
include('nav.php');
?>

<div class="container mt-5">
    <div class="d-flex justify-content-between mt-5">
      <h1 class="text-center">Customer Registeration Form</h1>
      <button type="button" class="btn btn-info my-3" data-bs-toggle="modal" data-bs-target="#completeModal"> Add New customer</button>
    </div>
    <div id="displayDataTable"></div>
  </div>
  
  <div id="completeModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">New Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div iclass="modal-body">
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>