@extends('Admin-Panel.layouts.app')
@section('content')
    <!-- breadcrumb -->
    <nav class="navbar navbar-main navbar-expand-lg px-0  shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
                    <li class="breadcrumb-item text-sm " aria-current="page">Edit User</li>
                </ol>
            </nav>
        </div>
    </nav>
    {{-- your actual html start from here here --}}


    <div class="container-fluid py-4">
        @foreach ($users as $user )
            
    
        <form action="{{route('admin.user.update',$user->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="name">Title *</label>
                    <input type="text" placeholder="Enter Name" value="{{$user->title}}" class="form-control" name="title" autocomplete="off">
                    @error('title')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="name">Email *</label>
                    <input type="text" placeholder="Email" value="{{$user->email}}" class="form-control" name="email" autocomplete="off">
                    @error('email')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 mt-3">
                    <label for="phone">Phone *</label>
                    <input type="text" placeholder="Phone" value="{{$user->phone}}" class="form-control" name="phone" autocomplete="off">
                    @error('phone')
                        <span class="text-danger ">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 mt-3">
                    <label for="address">Address *</label>
                    <input type="text" placeholder="Address" value="{{$user->address}}" class="form-control " name="address" autocomplete="off">
                    @error('address')
                        <span class="text-danger" >
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 mt-3">
                    <label for="postalcode">Postal Code *</label>
                    <input type="text" placeholder="Title" value="{{$user->postalcode}}" class="form-control" name="postalcode" autocomplete="off">
                    @error('postalcode')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 mt-3">
                    <label for="password">Password *</label>
                    <input type="hidden" name="old_password" value="{{$user->password}}">
                    <input disabled type="password" placeholder="Password" value="{{$user->password}}" class="form-control" name="password" autocomplete="off">
                    @error('password')
                        <span class=" text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="form-group row mt-4">
                    <div class="col-md-12">
                        <button type="submit" class="form-control btn btn-primary">Update User</button>
                    </div>

                </div>

            </div>

        </form>
        @endforeach
    </div>
@endsection

@section('js')
@endsection
