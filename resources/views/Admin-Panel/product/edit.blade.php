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
        @foreach ($products as $product)
            <form action="{{ route('admin.product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="name">Title *</label>
                        <input type="text" placeholder="Title" class="form-control @error('title') is-invalid @enderror"
                            value="{{ $product->title }}" name="title" autocomplete="off">
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
                            value="{{ $product->description }}" autocomplete="off">
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
                        <select class="form-control  @error('brand_id') is-invalid @enderror" name="brand_id"
                            id="specialization">
                                @foreach ( as )
                                    
                                @endforeach
                            <option value="{{ $product->brand_id }}">{{ $product->brand_id }}</option>

                        </select>
                        @error('brand_id')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="categeory">Categeory</label>
                        <select class="form-control  @error('categeory_id') is-invalid @enderror" name="categeory_id">

                            <option value="{{ $product->category_id }}">{{ $product->category_id }}</option>


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
                            <option value="{{ $product->colors }}">{{ $product->colors }}</option>

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
                            <option value="Default">{{ $product->condition }}</option>

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
                            value="{{ $product->price }}" name="price" autocomplete="off">
                        @error('price')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="Discount">Discount *</label>
                        <input type="text" placeholder="Discount"
                            class="form-control @error('discount') is-invalid @enderror" name="discount"
                            value="{{ $product->discount }}" autocomplete="off">
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
                            class="form-control @error('quantity') is-invalid @enderror" name="quantity" autocomplete="off"
                            value="{{ $product->quantity }}">
                        @error('quantity')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
              
                    <div class="col-md-4">
                        <label for="Discount">Photo *</label>
                        <input type="file" placeholder="Discount"
                            class="form-control @error('image_url') is-invalid @enderror" name="image_url"
                            autocomplete="off">
                        @error('image_url')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                          {{-- Image Show --}}
                          @php
                          $img_path = $product->image_url;
                          $img_path = str_replace('"', '', $img_path);
                      @endphp
                      <div class="col-2">
                          <img src="{{ asset('storage\uploads\\') . $img_path }}" height='100' width='100'
                              alt="bannerImage">
                          <input type="hidden" name="old_url" value="{{ $product->image_url }}">
                      </div>
                      {{-- Image Show --}}
                </div>
        @endforeach

        <div class="form-group row mt-4">
            <div class="col-md-12">
                <button type="submit" class="form-control btn btn-primary">Update</button>
            </div>

        </div>

    </div>

    </form>

    </div>
@endsection

@section('js')
@endsection
