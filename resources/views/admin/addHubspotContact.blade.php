
@extends("layouts.app")
@section("style")
    <link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
@endsection
@section("wrapper")
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Hubspot CRM</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Show Hubspot</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col-12">
                @if (Session::has('status'))
                <div class="alert alert-{{ Session::get('status') }} border-0 bg-{{ Session::get('status') }} alert-dismissible fade show" id="dismiss">
                    <div class="text-white">{{ Session::get('message')}}</div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                        aria-label="Close"></button>
                        {{ Session::forget('status') }}
                        {{ Session::forget('message') }}
                </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">




                    <div class="card-body">
                        <div class="card">
                            <div class="card-header input-title">
                                <h4>{{__('Add New Hubspot Contact')}}</h4>
                            </div>
                            <div class="card-body card-body-paddding">
                            <form action="{{ url('create-contact') }}" method="post">
                                @csrf
                                <div class="border border-3 p-4 rounded borderRmv">

                                    <div class="mb-3">
                                        <label for="name" class="form-label">First Name</label>
                                        <input type="text" name="firstname" required class="form-control" id="firstname" placeholder="firstname">
                                    </div>

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Last Name</label>
                                        <input type="text" name="lastname" required class="form-control" id="lastname" placeholder="lastname">
                                    </div>

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Phone</label>
                                        <input type="phone" name="phone" required class="form-control" id="phone" placeholder="phone">
                                    </div>

                                    <div class="mb-3">
                                        <label for="price" class="form-label">Email</label>
                                        <input type="email" class="form-control" name='email' id="email" placeholder="email" required>

                                    </div>

                                    <div class="mb-3">
                                        <label for="company" class="form-label">company</label>
                                        <input type="text" name="company" required class="form-control" id="company" placeholder="company">
                                    </div>

                                    <div class="mb-3">
                                        <label for="website" class="form-label">website</label>
                                        <input type="text" name="website" required class="form-control" id="website" placeholder="website">
                                    </div>







                                    <div class="mb-3">
                                            <div class="d-grid">
                                                <button  id="productSave" class="btn btn-info">Save</button>
                                            </div>
                                    </div>
                                </div>
                                </div>


                            </div><!--end row-->
                            </form>
                        </div>
                    </div>

                    </div>
                </div>

    </div>
</div>
<!--end page wrapper -->
@endsection

@section("script")
    <script src="assets/plugins/smart-wizard/js/jquery.smartWizard.min.js"></script>
    <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script>
   $(document).ready(function () {
    $('#example').DataTable();
    console.log("jQuery is ready");


});


    </script>
@endsection
