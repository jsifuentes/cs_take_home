@extends('layouts.app')

@section('content')
    <h1 class="text-center text-xl font-medium">Products</h1>

    <table class="table-auto w-full text-left">
        <thead>
            <tr class="border-b">
                <th>Name</th>
                <th>Style</th>
                <th>Brand</th>
                <th>SKUs</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($products as $product)
                <tr class="border-b">
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->style }}</td>
                    <td>{{ $product->brand }}</td>
                    <td>{{ $product->inventory_group_concat_sku }}</td>
                    <td><a href="{{ route('inventory', ['product' => $product->id]) }}" class="underline">Inventory</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">{{ $products->links() }}</div>
@endsection