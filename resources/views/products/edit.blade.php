@extends('admin.main')

@section('head')
    <link rel="stylesheet" href="{{ asset('dist/plugin/select2/select2.min.css') }}">

    <style>
        .imgRemove {
            position: relative;
            top: 15px;
            left: -5px;
            background-color: #fff;
            border: 1px solid #111;
            border-radius: 30%;
            font-weight: bold;
            outline: none;
        }

        .imgRemove:hover {
            background-color: tomato;
        }

        .imgRemove::after {
            /* content: '\21BA'; */
            content: '\2716';
            color: #111;
            font-size: 10px;
            cursor: pointer;
        }

        .img-thumbs {
            background: #eee;
            border: 1px solid #ccc;
            border-radius: 0.25rem;
            margin: 1.5rem 0;
            padding: 0.75rem;
        }

        .img-thumbs-hidden {
            display: none;
        }
    </style>
@endsection

@section('main-container')
    <div class="body d-flex pb-3">
        <div class="container-fluid">

            <div class="row g-3">
                <div class="border-0 mb-2">
                    <div
                        class="card-header py-2 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                        <h3 class="fw-bold mb-0">Add Products</h3>
                        <a href="{{ route('products.index') }}" class="btn btn-sm btn-secondary btn-set-task w-sm-100">
                            <i class="icofont-arrow-left me-2 fs-6"></i>Back
                        </a>
                    </div>
                </div> <!-- Row end  -->

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Products</li>
                    </ol>
                </nav>

                @include('admin.messages')

                <form id="AddProductsForm" class="form form-horizontal" action="{{ route('products.update', $product->id) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row border-0">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="card border-0 p-0 m-0 bg-transparent">
                                <div class="card-body p-0 m-0 bg-transparent">

                                    <div class="row g-3">
                                        <!-- Manage Products Information -->
                                        <div class="col-lg-8">
                                            <div class="card mb-3">
                                                <div
                                                    class="card-header py-xl-1= py-2 d-flex align-items-center justify-content-between border-bottom flex-wrap">
                                                    <h5 class="m-0 fw-bold">Products Information</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row g-3">

                                                        {{-- Products Name --}}
                                                        <div class="col-md-6">
                                                            <label for="name" class="form-label">
                                                                Product Name <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" id="name" name="name"
                                                                maxlength="150"
                                                                class="form-control @error('name') is-invalid @enderror"
                                                                placeholder="Enter Name" value="{{ $product->name }}"
                                                                required>
                                                            @error('name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>

                                                        {{-- Products SKU --}}
                                                        <div class="col-md-6">
                                                            <label for="name" class="form-label">
                                                                Product SKU <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" id="name" name="name"
                                                                maxlength="150"
                                                                class="form-control @error('name') is-invalid @enderror"
                                                                placeholder="Enter SKU" value="{{ $product->sku }}"
                                                                readonly>
                                                            @error('name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        
                                                        {{-- Product Stock --}}
                                                        <div class="col-md-6">
                                                            <label class="col-form-label pt-0" for="sku">Product
                                                                Stock <span class="text-danger">&#42;</span></label>
                                                            <input type="text" name="stock"
                                                                value="{{ $product->stock }}"
                                                                class="form-control @error('stock') is-invalid @enderror"
                                                                id="stock" placeholder="Product Stock">
                                                            @error('stock')
                                                                <div class="text-danger"><strong>{{ $message }}</strong>
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        {{-- Product Price --}}
                                                        <div class="col-md-6">
                                                            <label class="col-form-label pt-0" for="sku">Product
                                                                Price <span class="text-danger">&#42;</span></label>
                                                            <input type="number" name="price"
                                                                value="{{ $product->price }}" onkeyup="calculate()"
                                                                class="form-control @error('price') is-invalid @enderror"
                                                                id="price" placeholder="Product Price">
                                                            @error('price')
                                                                <div class="text-danger"><strong>{{ $message }}</strong>
                                                                </div>
                                                            @enderror
                                                        </div>





                                                        {{-- Status --}}
                                                        <div class="col-md-4">
                                                            <label for="status_y" class="form-label">Status</label>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-check">
                                                                        <input name="status" id="status_y"
                                                                            class="form-check-input" type="radio" value="1" checked >
                                                                        Active
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-check">
                                                                        <input name="status" id="status_n"
                                                                            class="form-check-input" type="radio" value="0">
                                                                        In-active
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="card-footer">
                                            <input type="submit" class="btn btn-sm btn-primary" value="Update">
                                            <input type="reset" class="btn btn-sm btn-secondary text-white"
                                                value="Reset">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- Row end  -->
    </div>
@endsection

@section('js')

    <script src="{{ asset('dist/plugin/select2/select2.full.min.js') }}"></script>
    <script>
        $("#product_name").keyup(function() {
            var Text = $(this).val();
            Text = slugify(Text);
            $("#product_slug").val(Text);
        });
    </script>
    <script>
        $(function() {
            $('#AddProductsForm').parsley();
        });
    </script>
@endsection
