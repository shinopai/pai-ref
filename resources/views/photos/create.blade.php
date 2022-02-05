@extends('layouts.app')

@section('title')
新規写真投稿 | PaiRef
@endsection

@include('layouts.partial.header')

@section('content')
<section class="flex justify-center items-center bg-gray-200 mt-5">
    <div class="w-2/3 bg-white rounded p-6 space-y-4">
        <form method="POST" action="{{ route('users.photos.store', ['user' => $user->name]) }}" enctype="multipart/form-data" novalidate>
            @csrf
            <div>
                <label for="image_path">写真選択</label>
                <input type="file" name="image_path" class="w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600" id="image_path">
                @error('image_path')
                <span class="invalid-feedback" role="alert">
                    <strong class="text-red-500">{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mt-5">
                <input type="text" name="title" class="w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600" placeholder="画像タイトル(30字以内)">
                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong class="text-red-500">{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="mt-5">
                <textarea name="caption" class="w-full p-4 text-sm bg-gray-50 focus:outline-none border border-gray-200 rounded text-gray-600 resize-none" placeholder="説明文(100字以内)"></textarea>
                @error('caption')
                <span class="invalid-feedback" role="alert">
                    <strong class="text-red-500">{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="flex flex-wrap justify-center items-center mt-5">
                <div class="item w-1/2 h-auto">
                    <label for="category">カテゴリー</label><br>
                    <select name="category_id" id="category" class="border w-1/2 p-1">
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="item w-1/2 h-auto">
                    <label for="location">撮影地</label><br>
                    <select name="location_id" id="location" class="border w-1/2 p-1">
                        @foreach ($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->location }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div>
                <button class="w-full py-4 bg-blue-600 hover:bg-blue-700 rounded text-sm font-bold text-gray-50 transition duration-200 mt-5">投稿</button>
            </div>
        </form>
    </div>
</section>
@endsection
