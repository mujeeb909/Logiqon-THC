@extends('layouts.app')
@section('style')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
@endsection
@section('wrapper')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">

            <div class="modal fade" id="exampleVerticallycenteredModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Contact Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Name:</strong> <span id="modal-name"></span></p>
                            <p><strong>Email:</strong> <span id="modal-email"></span></p>
                            <p><strong>Phone Number:</strong> <span id="modal-phone_no"></span></p>
                            <p><strong>State:</strong> <span id="modal-address"></span></p>
                            <p><strong>Note:</strong> <span id="modal-message"></span></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="alertPlaceholder" class="container mt-3"></div>
                            <h1>Contact Manager</h1>
                            <div class="row p-2">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="form-group col-md-4 position-relative">
                                            <input type="text" name="search" id="search" class="form-control"
                                                placeholder="Search"
                                                style="border-radius: 20px; background-color:#F9F9F9; height:45px; width:250px; padding-left: 34px; font-size: 18px;">
                                        </div>


                                        <div class="form-group col-md-4 offset-md-4">
                                            <div class="dropdown">
                                                <button class="btn dropdown-toggle" type="button" data-toggle="dropdown"
                                                    style="border-radius: 20px; background-color:#F9F9F9; height:45px; width:150px; font-size:20px">
                                                    Sort by
                                                </button>
                                                <ul class="dropdown-menu"
                                                    style="border-radius: 20px; background-color:#F9F9F9; height:60px; width:150px;">
                                                    <li><a href="{{ route('contacts', ['sortOrder' => 'asc']) }}">Asc</a>
                                                    </li>
                                                    <li><a href="{{ route('contacts', ['sortOrder' => 'desc']) }}">Dsc</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <button class="btn pt-2 rounded-25 text-white m-4"
                                                style="background-color: #FF0000; font-size:21px; border-radius:25px; width:150px"
                                                onclick="deleteSelectedRows()"><i class="fa fa-trash mr-4"
                                                    aria-hidden="true"></i>Delete</button>

                                        </div>

                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table"
                                                style="border:1px solid #F9F9F9;border-radius:30px; width:99%;backgroud-color:#f6f6f6">
                                                <thead>
                                                    <tr>
                                                        <th><input type="checkbox" id="select-all" name="select-all"
                                                                value="all"></th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Phone Number</th>
                                                        <th>State</th>
                                                        <th>Note</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($enquiries->count() != 0)
                                                        @foreach ($enquiries as $enquirie)
                                                            <tr class="data-row" data-name="{{ $enquirie->name }}"
                                                                data-email="{{ $enquirie->email }}"
                                                                data-phone_no="{{ $enquirie->phone_no }}"
                                                                data-address="{{ $enquirie->address }}"
                                                                data-message="{{ $enquirie->message }}">
                                                                <th scope="row"><input type="checkbox"
                                                                        class="select-checkbox" name="select"
                                                                        value="{{ $enquirie->id }}"></th>
                                                                <td>{{ $enquirie->name }}</td>
                                                                <td>{{ $enquirie->email }}</td>
                                                                <td>{{ $enquirie->phone_no }}</td>
                                                                <td>{{ $enquirie->address }}</td>
                                                                <td>{{ $enquirie->message }}</td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="6">No Contacts found</td>
                                                        </tr>
                                                    @endif
                                                </tbody>

                                            </table>
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
    </div>
    <!--end page wrapper -->
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/plugins/smart-wizard/js/jquery.smartWizard.min.js"></script>
    <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <script>
        $(document).ready(function() {
            // Handle row click
            $('.data-row').on('click', function() {
                // Get data attributes
                var name = $(this).data('name');
                var email = $(this).data('email');
                var phone_no = $(this).data('phone_no');
                var address = $(this).data('address');
                var message = $(this).data('message');

                // Populate modal
                $('#modal-name').text(name);
                $('#modal-email').text(email);
                $('#modal-phone_no').text(phone_no);
                $('#modal-address').text(address);
                $('#modal-message').text(message);

                // Show modal
                $('#exampleVerticallycenteredModal').modal('show');
            });
        });

        function deleteSelectedRows() {

            const checkboxes = document.querySelectorAll('.select-checkbox:checked');
            const selectedIds = [];

            checkboxes.forEach(function(checkbox) {

                selectedIds.push(checkbox.value);
            });
            if (selectedIds == 0) {
                swal("Please select at least one row to delete!", {
                    icon: "error",
                });
                return false;
            }

            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover contact info!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "{{ route('deleteSelectedRows') }}",
                            method: 'POST',
                            data: {
                                ids: selectedIds,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {

                                swal("Poof! Info has been deleted!", {
                                    icon: "success",
                                });

                                location.reload();
                            },
                            error: function(xhr, status, error) {
                                swal("Error Occured!", {
                                    icon: "error",
                                });
                                console.error(error);
                            }
                        });

                    }
                });

        }


        const selectAllCheckbox = document.getElementById('select-all');


        const checkboxes = document.querySelectorAll('#select');


        selectAllCheckbox.addEventListener('change', function() {
            checkboxes.forEach(function(checkbox) {

                checkbox.checked = selectAllCheckbox.checked;
            });
        });
    </script>


    <script>
        $(document).ready(function() {

            $('#search').keyup(function(event) {
                if (event.keyCode === 13) {
                    performSearch();
                }
            });
        });

        function performSearch() {
            // Get the search query from the input field
            var searchQuery = $('#search').val();

            // Redirect to the search route with the search query
            window.location.href = "{{ route('contacts') }}?search=" + searchQuery;
        }
    </script>
@endsection
