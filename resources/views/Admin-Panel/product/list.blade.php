@extends('Admin-Panel.layouts.app')
@section('content')
    <!-- breadcrumb -->
    <nav class="navbar navbar-main navbar-expand-lg px-0  shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
                    <li class="breadcrumb-item text-sm " aria-current="page">Product list</li>
                </ol>
            </nav>
        </div>
    </nav>
    {{-- your actual html start from here here --}}

    <div class="row">
        <div class="text-center d-flex flex-row-reverse">
            <a href="{{ route('admin.product.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Add Banner</a>
        </div>
        <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered data-table">
                            <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Brand</th>
                                    <th>Catageory</th>
                                    <th>Condition</th>
                                    <th>Color</th>
                                    <th>Discount</th>
                                    <th>Stock</th>
                                    <th>Photo</th>
                                    <th>Price</th>
                                    <th class="text-right">Action</th>
                                </tr>

                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $(function() {

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.product.index') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },

                    {
                        data: 'brand_id',
                        name: 'brand_id'
                    },
                    {
                        data: 'category_id',
                        name: 'category_id'
                    },
                    {
                        data: 'condition',
                        name: 'condition'
                    },
                    {
                        data: 'colors',
                        name: 'colors'
                    },
                    {
                        data: 'discount',
                        name: 'discount'
                    },
                    {
                        data: 'quantity',
                        name: 'quantity'
                    },
                    {
                        data: 'image_url',
                        name: 'image_url'
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },

                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

        });
    </script>
@endsection
