@extends('Admin-Panel.layouts.app')
@section('content')
    <!-- breadcrumb -->
    <nav class="navbar navbar-main navbar-expand-lg px-0  shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
                    <li class="breadcrumb-item text-sm " aria-current="page">Add Category</li>
                </ol>
            </nav>
        </div>
    </nav>
    {{-- your actual html start from here here --}}


    <div class="container-fluid py-4">

        <form action="{{ route('admin.category.save') }}" method="post" enctype="multipart/form-data">
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
            <div class="form-group row mt-3">
                <div class="col-md-12">
                    <label for="email">Description *</label>
                    <input type="text" placeholder="Description"
                        class="form-control @error('description') is-invalid @enderror" name="description"
                        autocomplete="off">
                    @error('description')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mt-3">
                <div class="col-md-12">
                    <label for="Photo">Photo *</label>
                    <input type="file" class="form-control @error('filename') is-invalid @enderror" name="filename" />

                    @error('filename')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row mt-3">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">SUBMIT</button>

                </div>
            </div>

        </form>

    </div>
@endsection

@section('js')
@endsection
