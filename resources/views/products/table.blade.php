<table class="table table-bordered" id="ProductTable">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>SKU</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Status</th>
            <th width="220">Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->sku }}</td>
                <td>₹{{ number_format($product->price, 2) }}</td>
                <td>{{ $product->stock }}</td>
                <td>
                    @if($product->is_active)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-danger">Inactive</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}"
                       class="btn btn-sm btn-warning">
                        <i class="fa fa-edit"></i>
                    </a>

                    <form action="{{ route('products.destroy', $product->id) }}"
                          method="POST"
                          class="d-inline"
                          onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                    </form>


                     <form action="{{ route('products.toggle', $product->id) }}"
                          method="POST"
                          class="d-inline">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-sm btn-secondary">
                            Change Status
                        </button>
                    </form>

                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">No products found</td>
            </tr>
        @endforelse
    </tbody>
</table>

<div class="mt-3">
    {{ $products->links() }}
</div>
