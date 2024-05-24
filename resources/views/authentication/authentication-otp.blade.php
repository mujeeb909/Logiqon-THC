@php
    $userId = Session::get('userId');

@endphp

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
    <title>OTP Verification</title>
    <style>
        .otp-field {
            flex-direction: row;
            column-gap: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .otp-field input {
            height: 45px;
            width: 42px;
            border-radius: 6px;
            outline: none;
            font-size: 1.125rem;
            text-align: center;
            border: 1px solid #ddd;
        }

        .otp-field input:focus {
            box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
        }

        .otp-field input::-webkit-inner-spin-button,
        .otp-field input::-webkit-outer-spin-button {
            display: none;
        }

        .resend {
            font-size: 12px;
        }

        .footer {
            position: absolute;
            bottom: 10px;
            right: 10px;
            color: black;
            font-size: 12px;
            text-align: right;
            font-family: monospace;
        }

        .footer a {
            color: black;
            text-decoration: none;
        }
    </style>
</head>

<body class="bg-img-container bg-img-container-register">
    <div class="wrapper" style="background-color: white; height:100vh">
        <div class="d-flex align-items-center justify-content-center my-5 my-lg-0">
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
                                        <h3 class="">OTP Verification</h3>
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
                                    <hr />
                                </div>
                                <section class="container-fluid bg-body-tertiary d-block">
                                    <div class="row justify-content-center">
                                        <div class="col-12 col-md-6 col-lg-4" style="min-width: 500px;">
                                            <div class="card bg-white mb-5 mt-2 border-0"
                                                style="box-shadow: 0 12px 15px rgba(0, 0, 0, 0.02);">
                                                <div class="card-body p-5 text-center">
                                                    <h4>Verify</h4>
                                                    <p>Your code was sent to you via email</p>
                                                    <form method="POST" action="{{ route('verify-account') }}">
                                                        @csrf
                                                        <input type="hidden" name="user_id"
                                                            value="{{ $userId }}">
                                                        <div class="otp-field mb-4">
                                                            <input type="number" name="otp[]" required />
                                                            <input type="number" name="otp[]" disabled />
                                                            <input type="number" name="otp[]" disabled />
                                                            <input type="number" name="otp[]" disabled />
                                                            <input type="number" name="otp[]" disabled />
                                                            <input type="number" name="otp[]" disabled />
                                                        </div>

                                                        <button type="submit" class="btn btn-primary mb-3"
                                                            style="background-color: #0092CD; border-radius:15px ">Verify</button>
                                                    </form>
                                                    <p class="resend text-muted mb-0">
                                                        Didn't receive code? <a
                                                            href="{{ url('resend-verify-account?user_id=' . $userId) }}"
                                                            style="color: #0092CD7">Request again</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
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
    <script>
        const inputs = document.querySelectorAll(".otp-field > input");
        window.addEventListener("load", () => inputs[0].focus());
        inputs[0].addEventListener("paste", function(event) {
            event.preventDefault();
            const pastedValue = (event.clipboardData || window.clipboardData).getData("text");
            const otpLength = inputs.length;
            for (let i = 0; i < otpLength; i++) {
                if (i < pastedValue.length) {
                    inputs[i].value = pastedValue[i];
                    inputs[i].removeAttribute("disabled");
                } else {
                    inputs[i].value = "";
                }
            }
        });
        inputs.forEach((input, index1) => {
            input.addEventListener("keyup", (e) => {
                const currentInput = input;
                const nextInput = input.nextElementSibling;
                const prevInput = input.previousElementSibling;
                if (currentInput.value.length > 1) {
                    currentInput.value = "";
                    return;
                }
                if (nextInput && nextInput.hasAttribute("disabled") && currentInput.value !== "") {
                    nextInput.removeAttribute("disabled");
                    nextInput.focus();
                }
                if (e.key === "Backspace") {
                    inputs.forEach((input, index2) => {
                        if (index1 <= index2 && prevInput) {
                            input.setAttribute("disabled", true);
                            input.value = "";
                            prevInput.focus();
                        }
                    });
                }
            });
        });
    </script>
    <!--app JS-->
    <script src="assets/js/app.js"></script>
    <script>
        $(document).ready(function() {
            $("#dismiss").delay(3000).slideUp(300, function() {
                $(this).alert('close');
            });
        });
    </script>
</body>

</html>
