@extends('layouts.app')

@section('content')
    <h1 class="text-center text-xl font-medium">Inventory</h1>

    <form method="GET" class="filters mb-2">
        SKU: <input type="text" name="sku" value="{{ $skuFilter }}" class="p-1" />
        Inventory: <select name="inventory_operand" class="p-1 pr-8">
            <option value=">">greater than</option>
            <option value="<">less than</option>
        </select>
        <input type="submit" value="Search" class="border-2 p-1">

        @if(strlen($productFilter) > 0 || strlen($skuFilter) > 0)
        <a href="{{ route('inventory') }}" class="underline">Remove all filters</a>
        @endif
    </form>
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
@endsection
