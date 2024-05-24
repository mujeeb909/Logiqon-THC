@extends('layouts.app')
@section('style')
    <link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
@endsection
@section('second-sidebar')
    <!-- Second Sidebar content -->

    <div class="second-sidebar" data-simplebar="true">
        <center>
            <div class="second-sidebar-header">
                <div class="menu-title" style="font-size: 35px; font-weight: 500; margin-top:25px">

                    Settings

                </div>


            </div>
        </center>
        <br>
        <br><br><br>
        <!--navigation-->
        <ul class="second-sidebar-metismenu" id="menu">
            <li class="{{ Request::is('setting-change-password') ? 'active' : '' }}">
                <a href="setting-change-password">
                    <div class="menu-title mb-4" style="color:black;font-size:22px;">Change Password</div>
                </a>
            </li>
            <li class="{{ Request::is('terms-conditions') ? 'active' : '' }}">
                <a href="{{ url('terms-conditions') }}">
                    <div class="parent-icon">
                    </div>
                    <div class="menu-title mb-4" style="color:black;font-size:22px;">Terms and Conditions</div>
                </a>
            </li>

            <li class="{{ Request::is('privacy-policy') ? 'active' : '' }}">
                <a href="{{ url('privacy-policy') }}">
                    <div class="parent-icon">
                    </div>
                    <div class="menu-title mb-4" style="color:black;font-size:22px;">Privacy Policy</div>
                </a>
            </li>
            <li class="{{ Request::is('delete-account') ? 'active' : '' }}">
                <a href="{{ url('delete-account') }}">
                    <div class="parent-icon">
                    </div>
                    <div class="menu-title mb-4" style="color:black;font-size:22px;">Delete Account</div>
                </a>
            </li>
        </ul>
        <!--end navigation-->
    </div>
@endsection
@section('wrapper')
    <!--start page wrapper -->
    <div class="page-wrapper" style="margin-left: 550px">
        <div class="page-content">
            <!--breadcrumb-->


            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Settings</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Terms and Conditions</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="row">

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="alertPlaceholder" class="container mt-3"></div>
                            <h1>Terms and Conditions</h1>
                            <div class="row p-2">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, fugiat? Laudantium
                                        asperiores adipisci dolorum repellat, ullam cumque eum ratione esse corporis nulla
                                        aspernatur quo, deleniti soluta natus placeat distinctio hic.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal for adding a new supplier -->


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end page wrapper -->
@endsection
