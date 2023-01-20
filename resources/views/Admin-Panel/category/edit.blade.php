@extends('Admin-Panel.layouts.app')
@section('content')
    <!-- breadcrumb -->
    <nav class="navbar navbar-main navbar-expand-lg px-0  shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
                    <li class="breadcrumb-item text-sm " aria-current="page">Edit Category</li>
                </ol>
            </nav>
        </div>
    </nav>
    {{-- your actual html start from here here --}}


    <div class="container-fluid py-4">
        @foreach ($catageories as $catageory)
            <form action="{{ route('admin.category.update', $catageory->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="name">Title *</label>
                        <input type="text" placeholder="Title" class="form-control @error('title') is-invalid @enderror"
                            value="{{ $catageory->title }}" name="title" autocomplete="off">
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
                            value="{{ $catageory->description }}" autocomplete="off">
                        @error('description')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                {{-- Image Show --}}
                @php
                    $img_path = $catageory->image_url;
                    $img_path = str_replace('"', '', $img_path);
                @endphp
                <div class="mt-2">
                    <img src="{{ asset('storage\uploads\\') . $img_path }}" height='100' width='100' alt="bannerImage">
                    <label for="image">{{ $catageory->image_url }}</label>
                    <input type="hidden" name="old_url" value="{{ $catageory->image_url }}">
                </div>
                {{-- Image Show --}}
                <div class="form-group row mt-3">
                    <div class="col-md-12">


                        <input type="file" class="form-control @error('filename') is-invalid @enderror" name="filename"
                            value="{{ old('filename' . $catageory->image_url) ?? 'Default' }}" />

                        @error('filename')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Update</button>

                    </div>
                </div>

            </form>
        @endforeach


    </div>
@endsection

@section('js')
@endsection
