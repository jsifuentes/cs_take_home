@extends('layouts.app')

@section('content')
    <h1 class="text-center text-xl font-medium">Welcome Back</h1>

    <div class="wrapper mx-auto w-1/4">
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                @foreach ($errors->all() as $error)
                    <div class="block sm:inline">{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <label for="email" class="block">Email</label>
            <input type="email" name="email" id="email" class="form-input w-full" value="{{ old('email', 'larhonda.hovis@foo.com') }}" />

            <label for="email" class="block mt-2">Password</label>
            <input type="password" name="password" id="password" class="form-input w-full" value="cghmpbKXXK" />

            <input type="submit" value="Login" class="block mt-2 hover:cursor-pointer font-medium w-full border-2 text-center">
        </form>
    </div>
@endsection
