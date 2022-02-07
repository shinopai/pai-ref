@extends('layouts.app')

@section('title')
{{ $user->name }}さんの写真一覧 | PaiRef
@endsection

@include('layouts.partial.header')
<!-- profile page header -->
<nav class="pl-4 w-5/6 mx-auto" style="background-color: #75AB3C;">
    <div class="flex items-center justify-between">

        <div class="flex items-center text-white">
            <div>
                <a href="{{ route('users.showAll', ['user' => $user->name]) }}" class="border-r px-2 hover:bg-yellow-500 hover:text-white">ポートフォリオ</a>
                <a href="{{ route('users.showAllPhotosLikes', ['user' => $user->name]) }}" class="border-r px-2 hover:bg-yellow-500 hover:text-white">お気に入り</a>
                <a href="#" class="border-r px-2 hover:bg-yellow-500 hover:text-white">ファン</a>
                <a href="{{ route('users.showProfile', ['user' => $user->name]) }}" class="border-r px-2 hover:bg-yellow-500 hover:text-white">プロフィール</a>
            </div>
        </div>
    </div>
</nav>

@section('content')
<div class="flex flex-wrap justify-center items-start">
    <!-- back to top button -->
    <span id="back-btn" class="material-icons fixed right-32 bottom-5 bg-gray-700 text-white p-2 rounded-full cursor-pointer hidden">
        arrow_circle_up
    </span>

    <!-- left side -->
    <div class="item w-2/3 h-auto">

        <!-- all photos -->
        <div class="container mx-auto bg-white py-5 px-2">
            <h2 class="bg-gray-200 text-xl font-bold w-full p-2">{{ $user->name }}さんの全写真</h2>
            <p class="mt-3">全{{ $photos->total() }}件中
                {{  ($photos->currentPage() -1) * $photos->perPage() + 1}} -
                {{ (($photos->currentPage() -1) * $photos->perPage() + 1) + (count($photos) -1)  }}件のデータが表示されています。</p>
            {{ $photos->links('vendor.pagination.default') }}
            <div class="grid-cols-3 p-10 space-y-2 bg-white lg:space-y-0 lg:grid lg:gap-3 lg:grid-rows-3">
                @foreach ($photos as $photo)
                <a href="{{ route('users.showDetail', ['user' => $user->name, 'photo' => $photo->id]) }}">
                    <div class="w-full rounded hover:opacity-70">
                        @if (\Storage::exists('post_images/'.$photo->image_path))
                        <img src="{{ asset('storage/post_images/'.$photo->image_path) }}" alt="{{ $photo->title }}">
                        @else
                        <img src="{{ url('static/post_images/'.$photo->image_path) }}" alt="{{ $photo->title }}">
                        @endif
                        {{ $photo->title }}
                    </div>
                </a>
                @endforeach
            </div>
            {{ $photos->links('vendor.pagination.default') }}
        </div>
    </div>

    <!-- right side -->
    <div class="item w-1/3 h-auto">
        <div class="bg-white p-2 ml-2">
            @guest
            <p>PaiRefにメンバー登録して、写真好きのメンバーとの交流や、フォトコンテストへチャレンジしよう！</p>
            <a href="{{ route('register') }}" class="bg-indigo-500 text-white p-2 rounded font-bold inline-block mt-3 w-full text-center hover:underline">利用登録する</a>
            @else
            <p>自分のお気に入りの一枚を投稿して、他のユーザーと共有しよう！！</p>
            <a href="{{ route('users.photos.create', ['user' => Auth::user()->name]) }}" class="bg-indigo-500 text-white p-2 rounded font-bold inline-block mt-3 w-full text-center hover:underline">投稿する</a>
            @endguest
        </div>
        <div class="mt-5 p-2 bg-white ml-2">
            <h3 class="bg-gray-200 text-lg font-bold w-full p-2">サイト内検索</h3>
            <div class="gcse-search"></div>
        </div>
    </div>
</div>

<script async src="https://cse.google.com/cse.js?cx=bfc6fae1ddca596aa"></script>
<script src="{{ asset('modules/index.js') }}"></script>
@endsection
