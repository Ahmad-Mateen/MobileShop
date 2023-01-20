@extends('Admin-Panel.layouts.app')
@section('content')
    <!-- breadcrumb -->
    <nav class="navbar navbar-main navbar-expand-lg px-0  shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
                    <li class="breadcrumb-item text-sm " aria-current="page">Add Brand</li>
                </ol>
            </nav>
        </div>
    </nav>
    {{-- your actual html start from here here --}}


    <div class="container-fluid py-4">

        <form action="{{ route('admin.brand.save') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <div class="col-md-12">
                    <label for="name">Title *</label>
                    <input type="text" placeholder="Title" class="form-control @error('title') is-invalid @enderror"
                        name="title" autocomplete="off">
                    @error('title')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row mt-2">
                <div class="col-md-12">
                    <label for="name">Title *</label>
                    <select class="form-control supervisior @error('status') is-invalid @enderror" name="status">
                        <option value="0">Active</option>
                        <option value="1">Inactive</option>
                    </select>
                </div>
            </div>


            <div class="form-group mt-2 ">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">SUBMIT</button>

                </div>
            </div>

        </form>

    </div>
@endsection

@section('js')
@endsection
