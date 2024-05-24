
@extends("layouts.app")
@section("style")
    <link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
@endsection
@section("wrapper")
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Categories</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Show Categories</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!--end breadcrumb-->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    @if (Session::has('status'))
                            <div class="alert alert-{{ Session::get('status') }} border-0 bg-{{ Session::get('status') }} alert-dismissible fade show" id="dismiss">
                                <div class="text-white">{{ Session::get('message')}}</div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                    {{ Session::forget('status') }}
                                    {{ Session::forget('message') }}
                            </div>
                            @endif
                    <div class="card-body">
                           <div class="d-lg-flex align-items-center mb-4 gap-3">
                            
                        </div>

                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == old('category') ? 'selected' : '' }}>
                            @php
                            $position = str_repeat('¦--', $category->position);
                            @endphp
                            {{ $position . ' ' . $category->name }}
                            </option>
                            @if ($category->children->isNotEmpty())
                            @include('admin.categories.partials.subcategories', ['categories' => $category->children, 'child_category' => $category])
                            @endif
                            @endforeach

                           

                        <div class="card mt-3">
                    <div class="card-header input-title">
                        <h4>{{__('Add New Category')}}</h4>
                    </div>
                    <div class="card-body card-body-paddding">
                        <form method="POST" action="{{ url('storeCategories') }}">
                            @csrf
                            <div class="form-group  mt-3">
                                <label for="name">{{__('Name')}}</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}"
                                       placeholder="{{__('Name')}}" tabindex="1"
                                       required >
                                       @if ($errors->has('name'))
                                       <div class="invalid-feedback">
                                           <p>{{ $errors->first('name') }}</p>
                                       </div>
                                   @endif
                            </div>
                            <div class="form-group  mt-3">
                                <label for="name">{{ __('Root Category') }}</label>

                                <select class="form-control selectric lang" name="category">
                                    <option value="">{{ __('Select Root Category') }}</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == old('category') ? 'selected' : '' }}> {{ str_repeat('- ', $category->depth) }}{{ $category->name }}</option>
                                        @if ($category->children->isNotEmpty())
                                        @include('admin.categories.partials.subcategories', ['categories' => $category->children])
                                        @endif
                                    @endforeach


                                </select>

                                @if ($errors->has('category'))
                                    <div class="invalid-feedback">
                                        <p>{{ $errors->first('category') }}</p>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group text-right mt-3">
                                <button type="submit" class="btn btn-outline-primary" tabindex="4">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end page wrapper -->
@endsection

@section("script")
    <script src="assets/plugins/smart-wizard/js/jquery.smartWizard.min.js"></script>
    <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>

    <script>
    $(document).ready(function () {
            $('#example').DataTable();
    });

    </script>
@endsection
