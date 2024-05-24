<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="assets/test.png" type="image/png" />
    <!-- loader-->
    <link href="assets/css/pace.min.css" rel="stylesheet" />
    <script src="{{ 'assets/js/pace.min.js' }}"></script>
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="assets/css/app.css" rel="stylesheet">
    <link href="assets/css/icons.css" rel="stylesheet">
    <title>Signup</title>
</head>



<body class="bg-img-container bg-img-container-register">
    <!--wrapper-->
    <div class="wrapper" style="background-color: white; height:100vh">
        <div class="d-flex align-items-center
        justify-content-center my-5 my-lg-0">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
                    <div class="col mx-auto">
                        <div class="my-4 text-center">
                            <img src="assets/images/pnex-icon.png" width="180" alt="" />
                        </div>
                        <div class="card bg-transparent blured-card blured-card-register fade-in-card">
                            <div class="card-body">
                                <div class="p-4">
                                    <div class="text-center">
                                        <h3 class="">Create an Account</h3>

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
                                    <div class=" text-center mb-4"> <span> SIGN UP WITH EMAIL</span>
                                        <hr />
                                    </div>
                                    <div class="form-body">
                                        <form class="row g-3 needs-validation" novalidate method="POST"
                                            action="{{ url('register') }}">
                                            @csrf
                                            <div class="col-sm-12">
                                                <label for="name" class="form-label">Full Name *</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    value="{{ old('name') }}" placeholder="Name" required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Please Enter Your Name</div>
                                            </div>

                                            <div class="col-12">
                                                <label for="email" class="form-label">Email Address
                                                </label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    value="{{ old('email') }}" placeholder="example@user.com"
                                                    style="background-color: #f9f9f9; border-radius:10px" required>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Please Enter a Valid Email Address</div>
                                            </div>
                                            <div class="col-12">
                                                <label for="password" class="form-label">Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" class="form-control border-end-0"
                                                        id="password" name="password" placeholder="Enter Password"
                                                        style="background-color: #f9f9f9; border-radius:10px" required
                                                        minlength="5">
                                                    <a href="javascript:;" class="input-group-text bg-transparent"><i
                                                            class='bx bx-hide'></i></a>
                                                    <div class="valid-feedback">Looks good!</div>
                                                    <div class="invalid-feedback">Password must be 5 characters long
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label for="phone_no" class="form-label">Phone No
                                                </label>
                                                <input type="number" class="form-control" id="phone_no"
                                                    style="background-color: #f9f9f9; border-radius:10px"
                                                    name="phone_no" placeholder="Phone No" required minlength="11"
                                                    value="{{ old('phone_no') }}">
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Phone No must be 11 characters long</div>
                                            </div>


                                            <div class="col-12 mt-3">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary"
                                                        style="background-color: #0092CD; border-radius:15px ">Sign
                                                        up</button>
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-center">
                                                <p>Already have an account? <a href="{{ url('login') }}"
                                                        style="color: #0092CD7">Log in </a>
                                                </p>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
    <!--end wrapper-->
    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <!--Password show & hide js -->
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
    <!--app JS-->
    <script src="assets/js/app.js"></script>

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
            $("#dismiss").delay(3000).slideUp(300, function() {
                $(this).alert('close');
            });
        });
    </script>
</body>

</html>
