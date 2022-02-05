@extends('layouts.app')

<nav class=" flex px-5 py-4 bg-gray-500 justify-between w-5/6 mx-auto">
    <div class="flex items-center space-x-3 text-xl text-white font-bold">
        <span class="material-icons">
            photo_camera
        </span>
        <h1><a href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a></h1>
    </div>
</nav>

@section('content')
<section class="flex justify-center items-center bg-gray-200 mt-10">
    <div class="w-2/3 bg-white rounded p-6 space-y-4">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <input type="email" name="email" class="w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600" placeholder="メールアドレス">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong class="text-red-500">{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div>
                <input type="password" name="password" class="w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600" placeholder="パスワード">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong class="text-red-500">{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div>
                <button class="w-full py-4 bg-blue-600 hover:bg-blue-700 rounded text-sm font-bold text-gray-50 transition duration-200">ログイン</button>
            </div>
            <div class="flex items-center justify-between mt-5">
                <div class="flex flex-row items-center">
                    <input type="checkbox" name="remember" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded">
                    <label for="comments" class="ml-2 text-sm font-normal text-gray-600">ログイン状態を保持する</label>
                </div>
                <div>
                    <a class="text-sm text-blue-600 hover:underline" href="{{ route('password.request') }}">パスワードをお忘れですか?</a>
                </div>
            </div>
        </form>
    </div>
</section>
<section class="flex justify-center items-center bg-gray-200 my-5 text-center">
    <div class="w-2/3 bg-white rounded p-6 space-y-4">
        <a href="{{ route('register') }}" class="text-indigo-700 underline font-bold hover:text-indigo-500 hover:no-underline">メンバー登録をする</a>
        <h1 class="font-bold">初めて「PaiRef」を利用する方へ</h1>
        <p>「PaiRef」のすべての機能を利用するためには、メンバー登録（無料）していただく必要があります。</p>
    </div>
</section>
@endsection
