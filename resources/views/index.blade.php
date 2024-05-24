@extends('layouts.app')
@section('style')
    <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <link href="assets/plugins/smart-wizard/css/smart_wizard_all.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
@endsection
<script src="assets/countdown/countdown.js" type="text/javascript"></script>

@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-12">
                    @if (Session::has('status'))
                        <div class="alert alert-{{ Session::get('status') }} border-0 bg-{{ Session::get('status') }} alert-dismissible fade show"
                            id="dismiss">
                            <div class="text-white">{{ Session::get('message') }}</div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            {{ Session::forget('status') }}
                            {{ Session::forget('message') }}
                        </div>
                    @endif
                </div>
            </div>
            @if (Session::get('role_id') == 1)
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3">
                    <div class="col-md-6">
                        <div class="card radius-10 border-start border-0 border-3 border-info">
                            <div class="card-body">

                                <a href="{{ url('showCategories') }}">
                                    <div class="p-3 border radius-10">
                                        <h4 class="text-info text-center">TOTAL Categories</h4>
                                        <hr>
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <p class="mb-0 text-secondary">Total </p>
                                                <h5 class="my-1 text-info"></h5>
                                            </div>
                                            <div class=" ms-auto">
                                                <p class="mb-0 text-secondary"> {{ $totalCategoryies ?? 0 }}</p>
                                                <h5 class="my-1 text-info"></h5>
                                            </div>
                                        </div>

                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card radius-10 border-start border-0 border-3 border-danger">
                            <div class="card-body">

                                <a href="{{ url('getProducts') }}">
                                    <div class="p-3 border radius-10">
                                        <h4 class="text-danger text-center"> TOTAL Products</h4>
                                        <hr>
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <p class="mb-0 text-secondary">Total </p>
                                                <h5 class="my-1 text-danger"></h5>
                                            </div>
                                            <div class=" ms-auto">
                                                <p class="mb-0 text-secondary">{{ $totalProducts ?? 0 }}</p>
                                                <h5 class="my-1 text-danger"></h5>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div><!--end row-->
            @else
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3">
                    <div class="col">
                        <div class="card radius-10 border-start border-0 border-3 border-info">
                            <div class="card-body">


                                <div class="p-3 border radius-10">
                                    <h4 class="text-info text-center">Visits</h4>
                                    <hr>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-secondary"> <strong>Total</strong> </p>
                                            <h5 class="my-1 text-info"></h5>
                                        </div>
                                        <div class=" ms-auto">
                                            <p class="mb-0 text-white badge bg-info rounded-pill"><strong><span
                                                        style="font-weight: bold; font-size: 15px; padding:2px">
                                                        0
                                                    </span></strong></p>
                                            <h5 class="my-1 text-info"></h5>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card radius-10 border-start border-0 border-3 border-danger">
                            <div class="card-body">
                                <div class="p-3 border radius-10">
                                    <h4 class="text-danger text-center"> <strong>Copy Profile</strong></h4>
                                    <hr>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-secondary"><strong id="link">dummy link</strong>
                                            </p>
                                            <h5 class="my-1 text-danger"></h5>
                                        </div>
                                        <div class="ms-auto">
                                            <i style="font-size:24px; cursor:pointer" onclick="copyToClipboard(this)"
                                                class="fa">&#xf0c5;</i>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card radius-10 border-start border-0 border-3 border-success">
                            <div class="card-body">


                                <div class="p-3 border radius-10">
                                    <h4 class="text-success text-center"><strong> Qr Code</strong></h4>

                                    <div class="d-flex align-items-center">

                                        <div class=" ms-auto">
                                            <i id="downloadIcon" style="font-size: 24px; cursor: pointer;"
                                                class="fa">&#xf019;</i>
                                            <h5 class="my-1 text-success"></h5>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>


                <div class="row">
                    <div class="col-12 col-lg-8">

                    </div>



                </div>
            @endif

        </div><!--end row-->
    </div>
    </div>
@endsection

@section('script')
    <script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/plugins/chartjs/js/Chart.min.js"></script>
    <script src="assets/plugins/chartjs/js/Chart.extension.js"></script>
    <script src="assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
    <script src="assets/js/index.js"></script>

    <script src="assets/plugins/chartjs/js/apexcharts.min.js"></script>
    <script src="assets/plugins/chartjs/js/chart.js.2.8.0.js"></script>
    <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#table5').DataTable({
                lengthChange: false,
                'searching': false,
                'paging': false,
                'sorting': false,
            });

            table.buttons().container()
                .appendTo('#table_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script>
        function copyToClipboard() {
            var textToCopy = document.getElementById("link").innerText;

            var tempTextArea = document.createElement("textarea");
            tempTextArea.value = textToCopy;

            document.body.appendChild(tempTextArea);


            tempTextArea.select();
            tempTextArea.setSelectionRange(0, 99999);

            document.execCommand("copy");


            document.body.removeChild(tempTextArea);


            alert("Copied the text: " + textToCopy);
        }
    </script>

    <script>
        // Get the download icon element
        var downloadIcon = document.getElementById("downloadIcon");

        // Attach click event listener to the download icon
        downloadIcon.addEventListener("click", function() {
            // Get the QR code image URL
            var qrCodeImageUrl = document.getElementById("qrCodeImage").src;

            // Create an anchor element to trigger the download
            var downloadLink = document.createElement("a");
            downloadLink.href = qrCodeImageUrl;
            downloadLink.download = "dummy_qr_code.png"; // Set the file name for download

            // Append the anchor element to the document body and click it
            document.body.appendChild(downloadLink);
            downloadLink.click();

            // Remove the anchor element from the document body
            document.body.removeChild(downloadLink);
        });
    </script>
@endsection
