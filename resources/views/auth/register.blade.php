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
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" novalidate>
            @csrf
            <div>
                <input type="text" name="name" class="w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600" placeholder="名前">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong class="text-red-500">{{ $message }}</strong>
                </span>
                @enderror
            </div>
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
                <input type="password" name="password_confirmation" class="w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600" placeholder="パスワード(確認)">
            </div>
            <div class="mt-5">
                <label for="profile_image">プロフィール画像</label>
                <input type="file" name="profile_image" class="w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600" id="profile_image">
            </div>
            <div>
                <button class="w-full py-4 bg-blue-600 hover:bg-blue-700 rounded text-sm font-bold text-gray-50 transition duration-200 mt-5">登録</button>
            </div>
        </form>
    </div>
</section>
@endsection
