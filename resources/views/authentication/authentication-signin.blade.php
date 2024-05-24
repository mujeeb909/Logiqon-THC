<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->

    <link rel="icon" href="assets/favicon.pngddd" type="image/png" />
    <!-- loader-->
    <link href="assets/css/pace.min.css" rel="stylesheet" />
    <script src="assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="assets/css/app.css" rel="stylesheet">
    <link href="assets/css/icons.css" rel="stylesheet">



    <title> Sign in</title>
</head>

<body class="bg-img-container bg-img-container-register">
    <!--wrapper-->
    <div class="wrapper" style="background-color: white">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col mx-auto">
                        <div class="mb-4 text-center">
                            <img src="assets/images/pnex-icon.png" width="120" alt="" />
                        </div>





                        <div class="card bg-transparent blured-card blured-card-register fade-in-card">

                            {{-- <div class="card-body"> --}}
                            <div class="border p-4 rounded">
                                <div class="text-center">
                                    <h3 class="">Login to your Account</h3>

                                </div>
                                @if (Session::has('status'))
                                    <div class="alert alert-{{ Session::get('status') }} border-0 bg-{{ Session::get('status') }} alert-dismissible fade show"
                                        id="dismiss">
                                        <div class="text-white">{{ Session::get('message') }}</div>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                        {{ Session::forget('status') }}
                                        {{ Session::forget('message') }}
                                    </div>
                                @endif
                                <div class=" text-center mb-4">
                                    <hr />
                                </div>
                                <div class="form-body pt-4">
                                    <form method="post"
                                        action="{{ url('adminlogin') }}"class="row g-3 needs-validation" novalidate>
                                        @csrf
                                        <div class="col-12">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="text" class="form-control" id="email" name="email"
                                                placeholder="email"
                                                style="background-color: #f9f9f9; border-radius:10px" required>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback" id="username-msg">Please Enter email</div>
                                        </div>
                                        <div class="col-12">
                                            <label for="inputChoosePassword" class="form-label">
                                                Password</label>
                                            <div class="input-group" id="show_hide_password">
                                                <input type="password" class="form-control border-end-0" id="password"
                                                    required name="password"
                                                    style="background-color: #f9f9f9; border-radius:10px"
                                                    placeholder="Enter Password" minlength="5"> <a href="javascript:;"
                                                    class="input-group-text bg-transparent"><i
                                                        class='bx bx-hide'></i></a>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback" id="password-msg">Password must be 5
                                                    characters long</div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 text-end"> <a href="#" style="color: #0092CD">Forgot
                                                Password
                                                ?</a>
                                        </div>

                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button id="login-button" type="submit" disabled class="btn text-white"
                                                    style="background-color: #0092CD; border-radius:15px ">
                                                    Login
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <p>Don't have an account yet? <a href="{{ url('signup') }}"
                                                    style="color: #0092CD7">Sign up here </a>
                                            </p>
                                        </div>



                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- </div> --}}
                <!--end row-->
            </div>
        </div>
    </div>
    <!--end wrapper-->

    <!--plugins-->
    <script src="assets/js/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
        });
    </script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>

    <script>
        $(document).ready(function() {
            $("#login-button").attr('disabled', false);
            $("#dismiss").delay(3000).slideUp(300, function() {
                $(this).alert('close');
            });
        });
    </script>
</body>

</html>
