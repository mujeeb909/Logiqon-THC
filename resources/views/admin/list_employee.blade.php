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
            <div class="breadcrumb-title pe-3">List</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">List Employees</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    @if (Session::has('status'))
                            <div class="alert alert-{{ Session::get('status') }} border-0 bg-{{ Session::get('status') }} alert-dismissible fade show" id="dismiss">
                                <div class="text-white">{{ Session::get('message')}}</div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                    {{ Session::forget('status') }}
                                    {{ Session::forget('message') }}
                            </div>
                            @endif
                    <div class="card-body">
                           <div class="d-lg-flex align-items-center mb-4 gap-3">
                                            <div class="ms-auto">

                                                <a href="{{ url('importantLinksAdd') }}" class="btn btn-outline-info px-3"><i class="bx bxs-plus-square"></i> Add New Links</a>

                                            </div>
                                        </div>
                        <div class="row p-2">
                            <div class="col-12">
                                <div class="table-responsive" >
                                      <table id="example"  class="table table-striped table-bordered" style="width:99%">
                                        <thead>
                                            <tr>
                                                <th>Sr #</th>
                                                <th>EMP_IMAGE</th>
                                                <th>EMP_NAME</th>
                                                <th>DESIGNATION</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php($i = 1)
                                            @foreach ($employees  as $team)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>
                                                    
                                                    <img src="{{'teams/img/' . $team->emp_img}}" style="height: 33px" alt="" class="img-d img-fluid">
                                                 </td>

                                                <td>{{ $team->emp_name }}</td>
                                                <td>
                                              
                                                   {{ $team->designation}}
                                                  
                                                  </td>
                                                <td>
                                                
                                                 <div class="d-flex order-actions">
                                                    <a href="employee-edit?id={{ $team->id }}" class="ms-3"><i class='bx bxs-edit text-info'></i></a>
                                                    <a href="employee-delete/{{ $team->id }}" class="ms-3"><i class='bx bxs-trash text-danger'></i></a>

                                                    </div>
                                                </td>


                                            </tr>
                                            @php($i++)
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
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

    <script>
    $(document).ready(function () {
            $('#example').DataTable();
    });

    </script>
@endsection