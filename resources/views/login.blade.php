@extends('layouts.app')

@section('content')
    <div class="container mt-4 w-96 p-3 mx-auto border-2 rounded border-dotted border-indigo-500">
        <h1 class="text-center text-xl font-medium">Welcome Back</h1>

        <form action="{{ route('login') }}" method="POST" class="mx-auto w-3/4">
            @csrf

            <label for="email" class="block">Email</label>
            <input type="email" name="email" id="email" class="form-input w-full" value="{{ old('email', 'larhonda.hovis@foo.com') }}" />

            <label for="email" class="block mt-2">Password</label>
            <input type="password" name="password" id="password" class="form-input w-full" value="cghmpbKXXK" />

            <input type="submit" value="Login" class="block mt-2 hover:cursor-pointer font-medium w-full border-2 text-center">
        </form>
    </div>
@endsection
