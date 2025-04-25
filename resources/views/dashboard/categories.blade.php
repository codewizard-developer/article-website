<!doctype html>
<html lang="en">

    
<!-- Mirrored from preview.pichforest.com/dashonic/layouts/tables-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Apr 2025 05:35:12 GMT -->
<head>
        
        <meta charset="utf-8" />
        <title>Bootstrap Basic | Dashonic - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Pichforest" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJv+N6Yb7Wr+Af6g2eD2M6Ljl1g8+pBRdJrb0RZ+dm6wT4q8uTmcZyFg5d2F" crossorigin="anonymous">


    </head>

    
    <body>

    <!-- <body data-layout="horizontal"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">
          
       
            <!-- ========== Left Sidebar Start ========== -->
     @include('dashboard.navbar')

            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">Users</h4>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        <div class="container-fluid">

                            {{-- Filters --}}
                            <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                               
                          
                            {{-- User Table --}}
                            <div class="card">
                                <div class="card-header">
                                    <h4>User List</h4>
                                </div>
                                <div class="card-body table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Categories</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($categories as $cat)
                                                <tr>
                                                    <td>{{ $cat->id }}</td>
                                                    <td>{{ $cat->cat_name }}</td>
                                                    <td>
                                                        <form action="{{ route('category.delete', $cat->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr><td colspan="3" class="text-center">No categories found</td></tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                
                                    <!-- Pagination -->
                                   
                                    <div class="d-flex justify-content-center">
                                        {{ $categories->links('pagination::bootstrap-5') }}  <!-- Pagination links -->
                                    </div>
                                
                                    <!-- Add Category Button -->
                                    <div class="mt-3">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCategoryModal">Add Category</button>
                                    </div>
                                
                                    <!-- Add Category Modal -->
                                    <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form action="{{ route('category.store') }}" method="POST">
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="cat_name">Category Name</label>
                                                            <input type="text" class="form-control" id="cat_name" name="cat_name" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Add Category</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                         
                        </div>
                  
                        
                      
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
                
          
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

    
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenujs/metismenujs.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/feather-icons/feather.min.js"></script>

        <script src="assets/js/app.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0u6X5fZl8Gp76xN68rFf7zmdHk7lbjRUvHGr7udDi0vkmVQ5" crossorigin="anonymous"></script>


    </body>

<!-- Mirrored from preview.pichforest.com/dashonic/layouts/tables-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Apr 2025 05:35:12 GMT -->
</html>
