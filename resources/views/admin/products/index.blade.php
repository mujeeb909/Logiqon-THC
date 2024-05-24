@extends('layouts.app')
@section('style')
    <link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
@endsection
@section('wrapper')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">

            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-tt pe-3">
                    <h1>Subscription Plans</h1>
                </div>

            </div>
            <!--end breadcrumb-->

            <div class="row">
                <div class="alert alert-success" role="alert">
                    Currently you are subscribed to {{ $currentPlan->name }}. Upgrade to
                    {{ $currentPlan->name == 'Basic Plan' ? 'Business Plan' : 'Enterprise' }} to get lead to more
                    features.
                </div>
            </div>
            <div class="pricing-table mt-4">

                <!--end row-->
                <div class="text-center">
                    <button class="btn border-1 p-2 monthly-btn"
                        style="background-color: #F9F9F9;
                        border-radius: 24px;
                        font-size: 23px;
                        width: 136px;">Monthly</button>
                    <button class="btn border-1 p-2 yearly-btn"
                        style="background-color: #F9F9F9;
                        border-radius: 24px;
                        font-size: 23px;
                        width: 136px;">Yearly</button>
                </div>

                <hr />
                <br>
                <div class="row row-cols-1 row-cols-lg-3 monthly-plans">

                    @foreach ($plansMonthly as $index => $planMonthly)
                        <div class="col">
                            <div class="card mb-5 mb-lg-0 {{ $planMonthly->name == $currentPlan->name ? 'bg-info' : '' }}">
                                <div class="card-body">
                                    <h5 class="card-title grey-text text-uppercase text-center">{{ $planMonthly->name }}
                                    </h5>
                                    <h6 class="card-price text-center">${{ $planMonthly->amount }}<span
                                            class="term">/month</span></h6>
                                    <hr class="my-4">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item bg-transparent">Single
                                            User</li>
                                        <li class="list-group-item bg-transparent">5GB
                                            Storage</li>
                                        <li class="list-group-item bg-transparent">Unlimited
                                            Public Projects</li>
                                        <li class="list-group-item bg-transparent">Community
                                            Access</li>
                                        <li class="list-group-item bg-transparent">Unlimited
                                            Private Projects</li>
                                        <li class="list-group-item bg-transparent">Dedicated
                                            Phone Support</li>
                                        <li class="list-group-item bg-transparent">Free
                                            Subdomain</li>
                                        <li class="list-group-item bg-transparent">Monthly
                                            Status Reports</li>
                                    </ul>
                                    <div class="d-grid"> <a href="#"
                                            class="btn {{ $planMonthly->name == $currentPlan->name ? 'btn-white' : 'bg-info text-white' }} my-2 radius-30">{{ $planMonthly->name == $currentPlan->name
                                                ? 'Current Plan'
                                                : 'Upgrade
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            Now' }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="row row-cols-1 row-cols-lg-3 yearly-plans" style="display: none;">
                    @foreach ($plansYearly as $index => $planYearly)
                        <div class="col">
                            <div
                                class="card mb-5 mb-lg-0 {{ $planYearly->amount == $currentPlan->amount ? 'bg-info' : '' }}">
                                <div class="card-body">
                                    <h5 class="card-title grey-text text-uppercase text-center">{{ $planYearly->name }}</h5>
                                    <h6 class="card-price text-center">${{ $planYearly->amount }}<span
                                            class="term">/Year</span></h6>
                                    <hr class="my-4">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item bg-transparent">Single
                                            User</li>
                                        <li class="list-group-item bg-transparent">5GB
                                            Storage</li>
                                        <li class="list-group-item bg-transparent">Unlimited
                                            Public Projects</li>
                                        <li class="list-group-item bg-transparent">Community
                                            Access</li>
                                        <li class="list-group-item bg-transparent">Unlimited
                                            Private Projects</li>
                                        <li class="list-group-item bg-transparent">Dedicated
                                            Phone Support</li>
                                        <li class="list-group-item bg-transparent">Free
                                            Subdomain</li>
                                        <li class="list-group-item bg-transparent">Monthly
                                            Status Reports</li>
                                    </ul>
                                    <div class="d-grid"> <a href="#"
                                            class="btn my-2 radius-30 {{ $planYearly->amount == $currentPlan->amount ? 'btn-white' : 'btn-info text-white' }}">
                                            {{ $planYearly->amount == $currentPlan->amount ? 'Current Plan' : 'Upgrade Now' }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>



            <div class="breadcrumb-tt pt-3">
                <h1>Subscription History</h1>
            </div>


            <div class="table-responsive">
                <table class="table"
                    style="border:1px solid #F9F9F9;border-radius:30px; width:99%;backgroud-color:#f6f6f6">
                    <thead>
                        <tr style="
                        border-bottom: 3px solid #0000002b;">
                            <th>Package Name</th>
                            <th>Monthly/Anually</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($planHistory->count() != 0)
                            @foreach ($planHistory as $ph)
                                <tr>
                                    <td>{{ $ph->plan->name }}</td>
                                    <td>{{ $ph->plan->duration }}</td>
                                    <td>{{ $ph->start_date }}</td>
                                    <td>{{ $ph->end_date }}</td>
                                    <td>{!! $ph->subscription_status == 1
                                        ? '<span class="badge bg-success text-white shadow-sm w-100">Active</span>'
                                        : '<span class="badge bg-danger text-white shadow-sm w-100">Inactive</span>' !!}</td>

                                </tr>
                            @endforeach
                        @else
                            <p>No Subscription History</p>
                        @endif
                    </tbody>

                </table>
            </div>

        </div>
    </div>
    <!--end page wrapper -->
@endsection

@section('script')
    <script src="assets/plugins/smart-wizard/js/jquery.smartWizard.min.js"></script>
    <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <!-- Add this in your head section -->
    <script>
        $(document).ready(function() {
            // Show monthly plans by default
            $('.monthly-btn').addClass('active');
            $('.monthly-plans').show();

            // Toggle between monthly and yearly plans
            $('.monthly-btn').click(function() {
                $('.monthly-btn').addClass('active');
                $('.yearly-btn').removeClass('active');
                $('.monthly-plans').show();
                $('.yearly-plans').hide();
            });

            $('.yearly-btn').click(function() {
                $('.yearly-btn').addClass('active');
                $('.monthly-btn').removeClass('active');
                $('.yearly-plans').show();
                $('.monthly-plans').hide();
            });
        });
    </script>




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
