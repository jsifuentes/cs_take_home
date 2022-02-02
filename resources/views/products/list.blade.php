@extends('layouts.app')

@section('content')
    <h1 class="text-center text-xl font-medium">Products</h1>

    <form method="GET" class="filters mb-2">
        <input type="hidden" name="id" value="{{ $filters['id'] }}">

        @if($filters['id'] > 0)
        <span>Only showing product: ID {{ $filters['id'] }}</span>
        @endif

        @if($filters['id'] > 0)
        <a href="{{ route('products') }}" class="underline">Remove all filters</a>
        @endif
    </form>

    <x-products.grid :filters="$filters" />
@endsection
