@props(['inventory'])

<table class="table-auto w-full text-left">
    <thead>
        <tr class="border-b">
            <th>Name</th>
            <th>SKU</th>
            <th>Quantity</th>
            <th>Color</th>
            <th>Size</th>
            <th>Price</th>
            <th>Cost</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($inventory as $row)
        <tr>
            <td><a href="{{ route('inventory', ['product' => $row->product_id]) }}" class="underline">{{ $row->product->name }}</a></td>
            <td>{{ $row->sku }}</td>
            <td>{{ $row->quantity }}</td>
            <td>{{ $row->color }}</td>
            <td>{{ $row->size }}</td>
            <td>{{ $row->price }}</td>
            <td>{{ $row->cost }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="mt-4">{{ $inventory->links() }}</div>