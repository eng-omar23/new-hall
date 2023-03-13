
    <?php include 'header.php'; ?>
    <?php include 'sidebar.php'; ?>

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
                          <h4 class="mb-sm-0 font-size-18">Expense</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                  <li class="breadcrumb-item active">Registrations</li> 
                                  <li class="breadcrumb-item active">Expense</li>
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
                                          <button id="AddNew" type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i class="mdi mdi-plus me-1"></i> Add New Expense</button>
                                        </div>
                                    </div><!-- end col-->
                                </div>
                
                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap table-check">
                                        <thead class="table-light">
                                            <tr>
                                                <th style="width: 20px;" class="align-middle">
                                                    <!-- <div class="form-check font-size-16">
                                                      <input class="form-check-input" type="checkbox" id="checkAll">
                                                      <label class="form-check-label" for="checkAll"></label>
                                                    </div> -->
                                                </th>
                                                <th class="align-middle">#</th>
                                                <th class="align-middle">Amount</th>
                                                <th class="align-middle">Type</th>
                                                <th class="align-middle">Description</th>
                                                <th class="align-middle">RegDate</th>
                                                <th class="align-middle">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                                <ul class="pagination pagination-rounded justify-content-end mb-2">
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
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <!-- Modal -->
        <div id="ExpenseModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Expense Transaction</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="ExpenseForm">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-2">
                                      <label class="form-label">Amount</label>
                                      <input type="float" class="form-control" id="amount" name="amount" placeholder="0.00" >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group m-2">
                                        <label class="form-label">Expense Type</label>
                                        <select class="form-control" id="type" name="type" >
                                          <option selected disabled value="0">Choose Expense Type...</option>
                                          <option value="Income">Income</option>
                                          <option value="Expense">Expense</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group m-2">
                                        <label class="form-label">Description</label>
                                        <input type="text" class="form-control" id="description" name="description" placeholder="Faah Faahin" >
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
                        <script>document.write(new Date().getFullYear())</script> © Eng Abdalla.
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
    <script src="../js/expense.js"></script>