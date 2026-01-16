@extends('admin.main')

@section('main-container')
    <div class="container">

        <h2 class="mb-4">Products</h2>

        {{-- Success Message --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Search + Add Button --}}
        <div class="row mb-3">
            <div class="col-md-6">
                <input type="text" id="search" class="form-control" placeholder="Search by name or SKU">
            </div>
            <div class="col-md-6 text-end">
                <a href="{{ route('products.create') }}" class="btn btn-primary">
                    + Add Product
                </a>
            </div>
        </div>

        {{-- Products Table --}}
        <div id="products-table">
            @include('products.table')
        </div>

    </div>
@endsection

@section('js')

    <script>
        let timer;

        document.getElementById('search').addEventListener('keyup', function() {
            clearTimeout(timer);

            timer = setTimeout(() => {
                fetchProducts(this.value);
            }, 300);
        });

        function fetchProducts(query = '') {
            fetch(`{{ route('products.index') }}?search=${query}`, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(res => res.text())
                .then(html => {
                    document.getElementById('products-table').innerHTML = html;
                });
        }
    </script>
@endsection
