@extends('layouts.guest');
@section('main')
    <div class="flex items-center justify-center h-5/6">
        <div class="bg-white rounded-lg shadow-lg p-8 max-w-md w-full space-y-6">
            <h2 class="text-2xl font-bold text-gray-900 text-center">Login</h2>
            <form action="" class="space-y-4" method="POST">
                <div>
                    <label class="block mb-2 font-semibold text-gray-800" for="email">Email</label>
                    <input autofocus
                            class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('email') is-invalid @enderror"
                            value="{{ old('email') }}" id="email" name="email" required type="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div>
                    <label class="block mb-2 font-semibold text-gray-800" for="password">Password</label>
                    <input class="w-full px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 @error('password') is-invalid @enderror"
                            id="password" name="password" required type="password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="grid justify-items-end">
                    <button class="w-1/4 bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:bg-blue-600 transition-colors"
                            type="submit">Login
                    </button>
                </div>
            </form>
        </div>
    </div>
@stop()