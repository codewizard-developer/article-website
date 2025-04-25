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
                                <div class="d-flex flex-wrap gap-2">
                                    <input type="text" id="search" class="form-control" placeholder="Search users..." value="{{ request('search') }}">
                                    <select id="planFilter" class="form-select">
                                        <option value="">All Plans</option>
                                        <option value="basic" {{ request('plan') == 'basic' ? 'selected' : '' }}>Basic</option>
                                        <option value="premium" {{ request('plan') == 'premium' ? 'selected' : '' }}>Premium</option>
                                    </select>
                                    <select id="perPage" class="form-select">
                                        @foreach([10, 20, 50, 100] as $limit)
                                            <option value="{{ $limit }}" {{ request('per_page', 10) == $limit ? 'selected' : '' }}>{{ $limit }}</option>
                                        @endforeach
                                    </select>
                                </div>
                        
                                <div class="d-flex gap-2 mt-2 mt-md-0">
                                    <button id="delete-basic" class="btn btn-danger">Delete All Basic Users</button>
                                    <button id="delete-unverified" class="btn btn-warning">Delete Unverified Users</button>
                                    <button id="bulk-delete-btn" class="btn btn-dark">Delete Selected</button>
                                </div>
                            </div>
                          
                            {{-- User Table --}}
                            <div class="card">
                                <div class="card-header">
                                    <h4>User List</h4>
                                </div>
                                <div class="card-body table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" id="select-all"></th>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Country</th>
                                                <th>Plan</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($users as $user)
                                                <tr>
                                                    <td><input type="checkbox" class="user-checkbox" value="{{ $user->id }}"></td>
                                                    <td>{{ $user->id }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->username }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->phone }}</td>
                                                    <td>{{ $user->country }}</td>
                                                    <td>{{ ucfirst($user->plan) }}</td>
                                                    <td class="d-flex gap-1">
                                                        <a href="{{ url('user/edit/' . $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                                        <form method="POST" action="{{ route('user.delete', $user->id) }}" onsubmit="return confirm('Delete this user?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-sm btn-danger">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr><td colspan="9" class="text-center">No users found</td></tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <div class="mt-3 d-flex justify-content-center">
                                        {{ $users->links('pagination::bootstrap-5') }}
                                    </div>
                                </div>
                            </div>
                         
                        </div>
                    
                        <script>
                            const searchInput = document.getElementById('search');
                            const planFilter = document.getElementById('planFilter');
                            const perPage = document.getElementById('perPage');
                        
                            function applyFilters() {
                                const search = searchInput.value;
                                const plan = planFilter.value;
                                const per = perPage.value;
                                const url = new URL(window.location.href);
                                url.searchParams.set('search', search);
                                url.searchParams.set('plan', plan);
                                url.searchParams.set('per_page', per);
                                window.location.href = url.toString();
                            }
                        
                            [searchInput, planFilter, perPage].forEach(el => {
                                el.addEventListener('change', () => {
                                    setTimeout(applyFilters, 500);
                                });
                            });
                        
                            document.getElementById('delete-basic').addEventListener('click', () => {
                                if (confirm('Delete all basic users?')) {
                                    fetch("{{ route('user.delete.basic') }}", {
                                        method: 'DELETE',
                                        headers: {
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                            'Accept': 'application/json',
                                        }
                                    }).then(res => res.ok ? location.reload() : alert("Error deleting"));
                                }
                            });
                        
                            document.getElementById('delete-unverified').addEventListener('click', () => {
                                if (confirm('Delete all unverified users?')) {
                                    fetch("{{ route('user.delete.unverified') }}", {
                                        method: 'DELETE',
                                        headers: {
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                            'Accept': 'application/json',
                                        }
                                    }).then(res => res.ok ? location.reload() : alert("Error deleting"));
                                }
                            });
                        
                            document.getElementById('select-all').addEventListener('change', function () {
                                const checked = this.checked;
                                document.querySelectorAll('.user-checkbox').forEach(cb => cb.checked = checked);
                            });
                        
                            document.getElementById('bulk-delete-btn').addEventListener('click', () => {
                                const ids = Array.from(document.querySelectorAll('.user-checkbox:checked')).map(cb => cb.value);
                                if (ids.length === 0) return alert("No users selected.");
                        
                                if (confirm(`Delete ${ids.length} user(s)?`)) {
                                    fetch("{{ route('user.bulk.delete') }}", {
                                        method: 'POST',
                                        headers: {
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                            'Content-Type': 'application/json'
                                        },
                                        body: JSON.stringify({ ids })
                                    }).then(res => res.ok ? location.reload() : alert("Error deleting"));
                                }
                            });
                        </script>
                        
                      
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

    </body>

<!-- Mirrored from preview.pichforest.com/dashonic/layouts/tables-basic.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Apr 2025 05:35:12 GMT -->
</html>
