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
                            <li class="breadcrumb-item"><i class="bx bx-home-alt"></i>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Password and Security</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card">
                                <div class="card-header input-title">
                                    <h4>Change Password</h4>
                                </div>

                                <div id="success-msg">
                                </div>
                                <div class="card-body card-body-paddding">
                                    <form id="passwordChangeForm">
                                        @csrf
                                        <div class="border border-3 p-4 rounded borderRmv">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Current Passoword</label>
                                                <input type="password" name="product_name" required class="form-control"
                                                    id="current_password" placeholder="******">
                                                <p id="msgc-info" class="text-danger"></p>
                                            </div>

                                            <div class="mb-3">
                                                <label for="price" class="form-label">New Passoword</label>
                                                <input type="password" class="form-control" name='price' id="new_password"
                                                    placeholder="******" required>
                                                <p id="msg-info" class="text-danger"></p>

                                            </div>
                                            <div class="mb-3">
                                                <label for="price" class="form-label">Confirm New Passoword</label>
                                                <input type="password" class="form-control" name='price'
                                                    id="confirm_password" placeholder="******" required>
                                                <p id="msg-info" class="text-danger"></p>

                                            </div>

                                            <div class="mb-3">
                                                <div class="d-grid">
                                                    <button id="formSave" class="btn text-white"
                                                        style="background-color: #0092CD">Change Password</button>
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

@section('script')
    <script src="assets/plugins/smart-wizard/js/jquery.smartWizard.min.js"></script>
    <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#formSave').click(function(event) {
                event.preventDefault();
                var form = $('#passwordChangeForm');
                var currentPassword = $('#current_password').val();
                var newPassword = $('#new_password').val();
                var confirmPassword = $('#confirm_password').val();


                if (currentPassword == "") {
                    $('#msgc-info').html('Plz add current Password.').fadeIn().delay(5000).fadeOut();
                    return;
                }

                if (newPassword == "") {
                    $('#msg-info').html('Plz add new Password.').fadeIn().delay(5000).fadeOut();
                    return;
                }

                if (currentPassword === newPassword) {
                    $('#msg-info').html('Current password and new password cannot be the same.').fadeIn()
                        .delay(5000).fadeOut();
                    return;
                }

                if (newPassword !== confirmPassword) {
                    $('#msg-info').html('New password and confirm password do not match.').fadeIn().delay(
                        5000).fadeOut();
                    return;
                }

                $.ajax({
                    url: "{{ route('validateCurrentPassword') }}",
                    method: 'POST',
                    data: {
                        current_password: currentPassword,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            form.submit();
                            $('#success-msg').html(
                                '<div id="success-msg" class="alert alert-success" role="alert">Password updated successfully.</div>'
                            ).fadeIn().delay(3000).fadeOut();
                        } else {
                            $('#msgc-info').html(response.message).fadeIn().delay(3000)
                                .fadeOut();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        $('#success-msg').html(
                            '<div id="success-msg" class="alert alert-danger" role="alert">Error Occurred!</div>'
                        ).fadeIn().delay(3000).fadeOut();
                    }
                });
            });
        });
    </script>
@endsection
