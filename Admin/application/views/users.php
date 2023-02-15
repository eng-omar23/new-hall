<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>
<?php include '../../../conn.php'; ?>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Users</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">Authentication</li>
                                <li class="breadcrumb-item active">Users</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-sm-4">
                                     <div class="search-box me-2 mb-2 d-inline-block">
                                            <div class="position-relative">
                                              <input type="text" class="form-control" placeholder="Search...">
                                              <i class="bx bx-search-alt search-icon"></i>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="text-sm-end">
                                        <button id="AddNew" type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-plus me-1"></i> Add New Users</button>
                                    </div>
                                </div><!-- end col-->
                            </div>

                           

                            <div class="table-responsive">
                                <table id="UsersTable" class="table">
                                    <thead class="table-light">
                                        <tr>
                                    
                                            <tr>
                                            <th >#SerialNO</th>
                                            <th >UserName</th>
                                            <th >Password</th>
                                            <th>Email</th>
                                            <th class="align-middle">UserType</th>
                                            <th class="align-middle">Status</th>
                                            <th class="align-middle">ActionDate</th>

                                            <th class="align-middle">Action</th>
                                        </tr>
                                    </thead>
                                    <?php 
                                    $no=1;
                                    $sql="select * from users";
                                    $query=mysqli_query($conn,$sql);
                                    if(mysqli_num_rows($query)>0){
                                        $sql="select * from users";
                                        $query=mysqli_query($conn,$sql);
                                        while($data=mysqli_fetch_array($query)){
                                            ?>
                                    <tbody>
                                       <td><?php echo $no?></td>
                                           <td><?php echo $data['username']?></td>
                                           <td><?php echo $data['password']?></td>
                                           <td><?php echo $data['email']?></td>
                                           <td><?php echo $data['type']?></td>
                                           <td><?php echo $data['status']?></td>
                                           <td><?php echo $data['date']?></td>
                                           <td><a href="custedit.php?cid=<?php echo $data["id"] ?>" class="btn btn-warning"> <i class="fa fa-edit"></i>
                   </a></td>
                   <td> <a href="custdel.php?cid=<?php echo $data['id']?>" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>

                                            <?php
                                            $no++;
                                        }
                                    }
                                    else{
                                        echo "no data availabe";
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- <ul class="pagination pagination-rounded justify-content-end mb-2">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="javascript: void(0);" aria-label="Previous">
                                          <i class="mdi mdi-chevron-left"></i>
                                        </a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="javascript: void(0);">1</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript: void(0);">3</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="javascript: void(0);" aria-label="Next">
                                          <i class="mdi mdi-chevron-right"></i>
                                        </a>
                                    </li>
                                </ul> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <!-- Modal -->
    <div id="UsersModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Users</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="UsersForm" action="user_process.php" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group m-2">
                                    <label class="form-label">UserName</label>
                                    <input type="float" class="form-control" id="UserName" name="UserName" placeholder="User Name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group m-2">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" id="Password" name="Password" placeholder="***">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group m-2">
                                    <label class="form-label">Email</label>
                                    <input type="Email" class="form-control" id="email" name="email" placeholder="Enter user Email">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group m-2">
                                    <label class="form-label">User Company</label>
                                   <select class="form-control" id="company" name="email">
                                    <option value="">choose company for the user</option>
                                    <?php 
                                    $sql="select * from company_reg";
                                    $query=mysqli_query($conn,$sql);
                                    if(mysqli_num_rows($query)>0){
                                        $sql="select * from company_reg";
                                        $query=mysqli_query($conn,$sql);
                                        while($data=mysqli_fetch_array($query)){
                                            ?>
                                            <option value="<?php echo $data['id']?>"><?php echo $data['Name']?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <option value=""></option>

                                   </select>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group m-2">
                                    <label class="form-label">User Type</label>
                                    <select class="form-control" id="UserType" name="UserType">
                                        <option selected disabled value="0">Choose User Type...</option>
                                        <option value="business">business</option>
                                        <option value="User">User</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group m-2">
                                    <label class="form-label">User Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option selected disabled value="0">Choose User Status...</option>
                                        <option value="Active">Active</option>
                                        <option value="InActive">InActive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer m-2">
                            <button class="btn btn-primary" type="submit">Save Changes</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script> © Eng Abdalla.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Design & Develop by Themesbrand
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- end main content-->


<?php include 'footer.php'; ?>
<script src="../js/users.js"></script>