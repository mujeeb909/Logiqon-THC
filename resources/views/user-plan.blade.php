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
    <title>Purchase our Plan</title>
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
                                        <h3 class="">Purchase your Plan</h3>

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
                                <div class="col">
                                    <div class="card mb-5 mb-lg-0">
                                        <div class="card-body">
                                            <h5 class="card-title grey-text text-uppercase text-center">
                                                Basic Plan
                                            </h5>
                                            <h6 class="card-price text-center">$5.99<span class="term">/month</span>
                                            </h6>
                                            <hr class="my-4">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item bg-transparent">Showcase our Talent</li>
                                                <li class="list-group-item bg-transparent">Uploading Audios and videos
                                                </li>
                                                <li class="list-group-item bg-transparent">Contact Manager</li>
                                                <li class="list-group-item bg-transparent">Customize your Profile</li>
                                            </ul>
                                            <div class="d-flex justify-content-center">
                                                <form action="{{ route('payment') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="amount" value="5.99">
                                                    <input type="hidden" name="duration" value="monthly">
                                                    <input type="hidden" name="plan_name" value="Basic Plan">
                                                    <button type="submit"
                                                        class="btn bg-info text-white my-2 radius-30">Purchase
                                                        now</button>
                                                </form>
                                            </div>
                                        </div>


                                    </div>
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
