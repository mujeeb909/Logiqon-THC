<!--sidebar wrapper -->

@if (Session::get('role_id') == 2)
    <div class="sidebar-wrapper" data-simplebar="true">
        <center>
            <div class="sidebar-header">
                <div class="menu-title">

                    TalentHunt Connect
                    {{--  <img src="assets/images/logo-icon1.png11" class="logo-icon" alt="logo icon" style="
            margin-left: 4rem;
            width: 90px;
            ">  --}}
                </div>


            </div>
        </center>
        <!--navigation-->
        <ul class="metismenu" id="menu">

            <div>
                <div class="top-sidebar-menu">
                    <li>
                        <a href="{{ url('dashboard') }}">
                            <div class="parent-icon"><i class='bx bxs-dashboard'></i>
                            </div>
                            <div class="menu-title">Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('profile-page') }}">
                            <div class="parent-icon"><i class='bx bxs-user'></i>
                            </div>
                            <div class="menu-title">Profile Page</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('contacts') }}">
                            <div class="parent-icon"><i class='bx bxs-contact'></i>
                            </div>
                            <div class="menu-title">Contacts</div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('plans') }}">
                            <div class="parent-icon"><i class="bx bx-cart"></i>
                            </div>
                            <div class="menu-title">Subscriptions</div>
                        </a>
                    </li>
                </div>

                <br>
                <br>
                <br>
                <br>
                <div class="spacer" style="height:300px"></div>

                <div class="bottom-sidebar-menu">

                    <li>
                        <a href="setting-change-password">
                            <div class="parent-icon"><i class='bx bx-cog'></i>

                            </div>
                            <div class="menu-title" style="">Setting</div>
                        </a>
                    </li>

                    <li>
                        <a href="logout">
                            <div class="parent-icon"><i class='bx bx-log-out-circle'></i>
                            </div>
                            <div class="menu-title" style="color: red;">LOG OUT</div>
                        </a>
                    </li>

                </div>
            </div>


            <!--end navigation-->
    </div>
@else
    <div class="sidebar-wrapper" data-simplebar="true">
        <center>
            <div class="sidebar-header">
                <div class="menu-title">

                    Technical Test
                    {{--  <img src="assets/images/logo-icon1.png11" class="logo-icon" alt="logo icon" style="
            margin-left: 4rem;
            width: 90px;
            ">  --}}
                </div>

                <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
                </div>
            </div>
        </center>
        <!--navigation-->
        <ul class="metismenu" id="menu">



            <li>
                <a href="{{ url('dashboard') }}">
                    <div class="parent-icon"><i class='bx bx-home-circle'></i>
                    </div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>





            {{-- <li class="menu-label"></li> --}}

            {{-- -------------------------------------------Admin Routes----------------------------------------------------- --}}

            <li>
                <a href="{{ url('showCategories') }}">
                    <div class="parent-icon"><i class="bx bx-file"></i>
                    </div>
                    <div class="menu-title">Show Categories</div>
                </a>
            </li>

            <li>
                <a href="{{ url('addProducts') }}">
                    <div class="parent-icon"><i class="bx bx-cart"></i>
                    </div>
                    <div class="menu-title">Add Product</div>
                </a>
            </li>
            <li>
                <a href="{{ url('getProducts') }}">
                    <div class="parent-icon"><i class="bx bx-cart"></i>
                    </div>
                    <div class="menu-title">Products List</div>
                </a>
            </li>


            <li>
                <a href="{{ url('addHubspotContact') }}">
                    <div class="parent-icon"><i class="bx bx-cart"></i>
                    </div>
                    <div class="menu-title">Add Hubspot Contact</div>
                </a>
            </li>

            <li>
                <a href="{{ url('hubspot-connect') }}">
                    <div class="parent-icon"><i class="bx bx-cart"></i>
                    </div>
                    <div class="menu-title">Connect with HubSpot</div>
                </a>
            </li>

            <li>
                <a href="{{ url('login-azure') }}">
                    <div class="parent-icon"><i class="bx bx-cart"></i>
                    </div>
                    <div class="menu-title">Connect with AD</div>
                </a>
            </li>

            <li>
                <a href="{{ url('exportUsers') }}">
                    <div class="parent-icon"><i class='bx bx-home-circle'></i>
                    </div>
                    <div class="menu-title">Export Users</div>
                </a>
            </li>




            <br>
            <br>
            <br>
            <br>


            <li>
                <a href="logout">
                    <div class="parent-icon"><i class="bx bx-money"></i>
                    </div>
                    <div class="menu-title" style="color: red;">LOG OUT</div>
                </a>
            </li>




            <!--end navigation-->
    </div>
@endif
<!--end sidebar wrapper -->
