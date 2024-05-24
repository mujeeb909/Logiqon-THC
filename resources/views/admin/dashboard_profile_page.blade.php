@extends('layouts.app')
@section('style')
    <link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/profile.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        <style>.page-content {
            background-color: white;
        }

        @media (max-width:380px) {
            .page-content {
                padding: 0px !important;
            }

            .user-edit-icon {
                margin-right: 165px !important;
                margin-top: -66px !important;
            }

            .btn-custom {
                width: 140px;
                font-size: 14px !important;
            }

            .rectangle-parent {
                padding: 0px !important;
            }
        }
    </style>
@endsection
@section('wrapper')
    <!--start page wrapper -->
    <div class="page-wrapper" style="background-color: white">
        <div class="page-content">
            <!--breadcrumb-->


            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class=" container breadcrumb-tt pe-3">My Profile </div>
            </div>
            <section class="rectangle-group">
                <img class="frame-item" alt="" src="./assets/images/profile-images/bg-cover.png" />
                <i class='bx bx-edit-alt'
                    style='color:#0092CD;  margin-left: -70px;
    z-index: 1;
    margin-top: 20px; font-size: 32px'></i>
                <div class="row">
                    <div class="wrapper-ellipse-48">
                        <img class="wrapper-ellipse-48-child" loading="lazy" alt=""
                            src="./assets/images/profile-images/user.jpg" />
                        <i class='bx bx-edit-alt user-edit-icon'
                            style='color:#0092CD;  margin-right: 815px;
    z-index: 1;
    margin-top: 20px; font-size: 32px'></i>
                    </div>


                </div>


            </section>
            <!--end breadcrumb-->


            <div class="row">
                <div class="public-view">
                    <main class="rectangle-parent">
                        <div class="frame-child"></div>
                        <section class="frame-parent">
                            <div class="frame-group">

                                <div class="frame-wrapper">
                                    <div class=" container" style="width: auto;">
                                        <nav class="display">
                                            <button class=" btn-custom" type="button"><svg class="i-icon"
                                                    xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                    viewBox="0 0 30 24">
                                                    <path fill="white"
                                                        d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5">
                                                    </path>
                                                </svg>View as</button>
                                            <button type="button" class="btn-custom">+ Add Section</button>
                                            <button type="button" class="btn-custom"> <svg class="i-icon"
                                                    xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                                    viewBox="0 0 31 31">
                                                    <path fill="white" fill-rule="evenodd"
                                                        d="M16.5 2.25a3.25 3.25 0 0 0-3.2 3.824L8.57 9.386a.757.757 0 0 0-.068.053a3.25 3.25 0 1 0 0 5.121a.755.755 0 0 0 .068.054l4.73 3.312a3.25 3.25 0 1 0 .617-1.4l-4.479-3.135c.2-.422.312-.893.312-1.391s-.112-.97-.312-1.391l4.48-3.136A3.25 3.25 0 1 0 16.5 2.25M14.75 5.5a1.75 1.75 0 1 1 3.5 0a1.75 1.75 0 0 1-3.5 0M6.5 10.25a1.75 1.75 0 1 0 0 3.5a1.75 1.75 0 0 0 0-3.5m10 6.5a1.75 1.75 0 1 0 0 3.5a1.75 1.75 0 0 0 0-3.5"
                                                        clip-rule="evenodd"></path>
                                                </svg>Share Profile</button>
                                        </nav>

                                    </div>
                                </div>
                                <div class="container">
                                    <form class="mt-4">
                                        <div class="row mb-4">
                                            <div class="col">
                                                <div data-mdb-input-init="" class="form-outline">
                                                    <label class="form-label label-custom" for="name">Name</label>
                                                    <input type="text" id="name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div data-mdb-input-init="" class="form-outline">
                                                    <label class="form-label label-custom" for="nick">Nick Name</label>
                                                    <input type="text" id="nick" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col">
                                                <div data-mdb-input-init="" class="form-outline">
                                                    <label class="form-label label-custom" for="talent">Talent</label>
                                                    <input type="text" id="talent" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div data-mdb-input-init="" class="form-outline">
                                                    <label class="form-label label-custom" for="email">Email</label>
                                                    <input type="email" id="email" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <div class="col">
                                                <div data-mdb-input-init="" class="form-outline">
                                                    <label class="form-label label-custom" for="age">Age</label>
                                                    <input type="text" id="age" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div data-mdb-input-init="" class="form-outline">
                                                    <label class="form-label label-custom" for="state">State</label>
                                                    <input type="text" id="state"
                                                        class="input-custom form-control">
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                                <div class="container">
                                    <div style="display: flex; justify-content: space-between;">
                                        <p class="span-custom ">Tags</p>
                                        <div>
                                            <i style="width: 40px; height:40px" class='bx bx-plus'></i>
                                            <i class='bx bx-edit-alt' style='color:#0092CD;font-size: 32px'></i>
                                        </div>
                                    </div>

                                    <div class="scrollmenu">
                                        <button class="tags">Piano</button>
                                        <button class="tags">Notes</button>
                                        <button class="tags">Guitar</button>
                                        <button class="tags">Artist</button>
                                        <button class="tags">Artist</button>
                                        <button class="tags">Artist</button>
                                        <button class="tags">Artist</button>
                                        <button class="tags">Artist</button>
                                        <button class="tags">Artist</button>

                                    </div>

                                </div>


                            </div>

                            <div class="container">
                                <div style="display: flex; justify-content: space-between;">
                                    <p class="span-custom mb-10 ">Bio</p>
                                    <i class='bx bx-edit-alt'
                                        style='color:#0092CD;  margin-left: -70px; font-size: 32px'></i>
                                </div>

                                <div class="rectangle-parent1">
                                    <div class="rectangle-div"></div>
                                    <div class="container">


                                        <div>
                                            <textarea name="" id=""></textarea>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="container">
                                <div class="" style="display: flex; justify-content:space-between">
                                    <div class="video-title">
                                        <p class="span-custom mb-10 ">Videos</p>
                                    </div class="action-btn">
                                    <div>
                                        <button class="btn btn-default p-2" style="font-weight: 500"><i
                                                style="width: 40px; height:40px" class='bx bx-plus'></i></button>
                                        <Button cclass="btn btn-default p-2" style="font-weight: 500"><i
                                                style="font-size: 15px;" class='bx bxs-grid'></i></Button>
                                    </div>
                                </div>
                                <div>

                                    <div class="videos-wrapper">
                                        <div class="videos-section">
                                            <div class="video-row ">
                                                <div>
                                                    <video class="video" controls>
                                                        <source src="./assets/videos/bg-video.mp4" type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                </div>

                                                <div>
                                                    <video class="video" controls>
                                                        <source src="./assets/videos/bg-video.mp4" type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>

                                                </div>
                                            </div>

                                            <div class="video-row">
                                                <div>
                                                    <video class="video" controls>
                                                        <source src="./assets/videos/bg-video.mp4" type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>

                                                </div>

                                                <div>
                                                    <video class="video" controls>
                                                        <source src="./assets/videos/bg-video.mp4" type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <div class="container">
                                <div class="" style="display: flex; justify-content:space-between">
                                    <div class="video-title">
                                        <p class="span-custom mb-10 ">Audio</p>
                                    </div class="action-btn">
                                    <div>
                                        <button class="btn btn-default p-2" style="font-weight: 500"><i
                                                style="width: 40px; height:40px" class='bx bx-plus'></i></button>
                                        <Button cclass="btn btn-default p-2" style="font-weight: 500"><i
                                                style="font-size: 15px;" class='bx bxs-grid'></i></Button>
                                    </div>
                                </div>
                                <div class=" video-custom">
                                    <div class="container">
                                        <div class="card mt-4">
                                            <div class="card-body">
                                                <p>Audio Name</p>
                                                <div class="row">
                                                    <audio controls="">
                                                        <source
                                                            src="https://interactive-examples.mdn.mozilla.net/media/cc0-audio/t-rex-roar.mp3"
                                                            type="audio/mpeg">
                                                        <source
                                                            src="https://interactive-examples.mdn.mozilla.net/media/cc0-audio/t-rex-roar.ogg"
                                                            type="audio/ogg">
                                                        <source
                                                            src="https://interactive-examples.mdn.mozilla.net/media/cc0-audio/t-rex-roar.wav"
                                                            type="audio/wav">
                                                        Audio not supported
                                                    </audio>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="card mt-4">
                                            <div class="card-body">
                                                <p>Audio Name</p>
                                                <div class="row">
                                                    <audio controls="">
                                                        <source
                                                            src="https://interactive-examples.mdn.mozilla.net/media/cc0-audio/t-rex-roar.mp3"
                                                            type="audio/mpeg">
                                                        <source
                                                            src="https://interactive-examples.mdn.mozilla.net/media/cc0-audio/t-rex-roar.ogg"
                                                            type="audio/ogg">
                                                        <source
                                                            src="https://interactive-examples.mdn.mozilla.net/media/cc0-audio/t-rex-roar.wav"
                                                            type="audio/wav">
                                                        Audio not supported
                                                    </audio>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="d-flex flex-row-reverse">
                                    <button type="button" class="btn-custom">Save</button>

                                </div>
                            </div>
                </div>





                </section>
                </main>
            </div>


        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            $('.dropdown-toggle').click(function() {
                $(this).siblings('.drop').toggle(); // Changed .btn-group to .drop
            });

            $('.dropdown-menu').click(function(event) {
                event.stopPropagation();
            });
        });
    </script>
    <!--end page wrapper -->
@endsection
