@extends('Admin-Panel.layouts.app')
@section('content')
    <!-- breadcrumb -->
    <nav class="navbar navbar-main navbar-expand-lg px-0  shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
                    <li class="breadcrumb-item text-sm " aria-current="page">Add Product</li>
                </ol>
            </nav>
        </div>
    </nav>
    {{-- your actual html start from here here --}}


    <div class="container-fluid py-4">

        <form action="{{route('admin.product.save')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="name">Title *</label>
                    <input type="text" placeholder="Title" class="form-control @error('title') is-invalid @enderror"
                        name="title" autocomplete="off">
                    @error('title')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="Description">Description *</label>
                    <input type="text" placeholder="Title"
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
                <div class="col-md-6">
                    <label for="brand">Brand</label>
                    <select class="form-control  @error('brand_id') is-invalid @enderror"
                        name="brand_id" id="specialization">
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->title }}</option>
                        @endforeach

                    </select>
                    @error('brand_id')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="categeory">Categeory</label>
                    <select class="form-control  @error('categeory_id') is-invalid @enderror"
                        name="categeory_id" >
                        @foreach ($categeories as $categeory)
                            <option value="{{ $categeory->id }}">{{ $categeory->title }}</option>
                        @endforeach

                    </select>
                    @error('categeory_id')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row mt-3">
                <div class="col-md-6">
                    <label for="colors">Colors</label>
                    <select class="form-control supervisior @error('color') is-invalid @enderror" name="colors">
                        <option value="Black">Black</option>
                        <option value="Blue">Blue</option>
                        <option value="Gold">Gold</option>
                        <option value="Green">Green</option>
                        <option value="Orange">Orange</option>
                        <option value="Navy Blue">Navy Blue</option>
                        <option value="Light Blue">Light Blue</option>
                        <option value="Sea Green">Sea Green</option>
                    </select>
                    @error('colors')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="Condition">Condition</label>
                    <select class="form-control  @error('condition') is-invalid @enderror" name="condition">
                        <option value="Default">Default</option>
                        <option value="New">New</option>
                        <option value="Hot">Hot</option>
                    </select>
                    @error('condition')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row mt-3">
                <div class="col-md-6">
                    <label for="Price">Price *</label>
                    <input type="text" placeholder="Price" class="form-control @error('price') is-invalid @enderror"
                        name="price" autocomplete="off">
                    @error('price')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="Discount">Discount *</label>
                    <input type="text" placeholder="Discount"
                        class="form-control @error('discount') is-invalid @enderror" name="discount" autocomplete="off">
                    @error('discount')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row mt-3">
                <div class="col-md-6">
                    <label for="Quantity">Quantity *</label>
                    <input type="text" placeholder="quantity"
                        class="form-control @error('quantity') is-invalid @enderror" name="quantity" autocomplete="off">
                    @error('quantity')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="Discount">Photo *</label>
                    <input type="file" placeholder="Discount"
                        class="form-control @error('image_url') is-invalid @enderror" name="image_url" autocomplete="off">
                    @error('image_url')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row mt-4">
                <div class="col-md-12">
                    <button type="submit" class="form-control btn btn-primary">Submit</button>
                </div>

            </div>

    </div>

    </form>

    </div>
@endsection

@section('js')
@endsection
