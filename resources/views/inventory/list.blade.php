@extends('layouts.app')

@section('content')
    <h1 class="text-center text-xl font-medium">Inventory</h1>

    <form method="GET" class="filters mb-2">
        <input type="hidden" name="product" value="{{ $filters['product'] }}">


        SKU: <input type="text" name="sku" value="{{ $filters['sku'] }}" class="p-1" />
        Inventory: <select name="inventory_operand" class="p-1 pr-8">
            <option value=">=" @if($filters['inventory_operand'] === '>=') selected @endif>>=</option>
            <option value="<=" @if($filters['inventory_operand'] === '<=') selected @endif><=</option>
        </select> <input type="number" value="{{ $filters['inventory_value'] }}" name="inventory_value" class="p-1 w-16" />

        <input type="submit" value="Search" class="border-2 p-1">

        @if(strlen($filters['product']) > 0)
        <span>Only showing product: ID {{ $filters['product'] }}</span>
        @endif

        @if(strlen($filters['product']) > 0 || strlen($filters['sku']) > 0 || $filters['inventory_operand'] !== null)
        <a href="{{ route('inventory') }}" class="underline">Remove all filters</a>
        @endif
    </form>

    <x-inventory.grid :filters="$filters" />
@endsection
