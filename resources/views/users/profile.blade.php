@extends('layouts.app')

@section('title')
{{ $user->name }}さんのプロフィール | PaiRef
@endsection

@include('layouts.partial.header')
<!-- profile page header -->
<nav class="pl-4 w-5/6 mx-auto" style="background-color: #75AB3C;">
    <div class="flex items-center justify-between">

        <div class="flex items-center text-white">
            <div>
                <a href="{{ route('users.showAll', ['user' => $user->name]) }}" class="border-r px-2 hover:bg-yellow-500 hover:text-white">ポートフォリオ</a>
                <a href="{{ route('photos.showSearch') }}" class="border-r px-2 hover:bg-yellow-500 hover:text-white">お気に入り</a>
                <a href="#" class="border-r px-2 hover:bg-yellow-500 hover:text-white">ファン</a>
                <a href="{{ route('users.showProfile', ['user' => $user->name]) }}" class="border-r px-2 hover:bg-yellow-500 hover:text-white">プロフィール</a>
            </div>
        </div>
    </div>
</nav>

@section('content')
@if (session('flash'))
<p class="bg-green-500 text-center text-white p-2">{{ session('flash') }}</p>
@endif

<div class="flex flex-wrap justify-center items-start">
    <!-- back to top button -->
    <span id="back-btn" class="material-icons fixed right-32 bottom-5 bg-gray-700 text-white p-2 rounded-full cursor-pointer hidden">
        arrow_circle_up
    </span>

    <!-- left side -->
    <div class="item w-2/3 h-auto">
        <!-- user profile -->
        <div class="bg-white p-2" style="height: 500px;">
            <h2 class="bg-blue-200 text-xl font-bold w-full p-2">
                {{ $user->name }}さんのプロフィール
            </h2>
            <table class="border-separate border border-slate-400 w-full mt-5">
                <thead>
                    <tr>
                        <th class="border border-slate-300 ...">プロフィール情報</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="border border-slate-300 ...">名前</th>
                        <td class="border border-slate-300 ...">{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th class="border border-slate-300 ...">メールアドレス</th>
                        <td class="border border-slate-300 ...">{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th class="border border-slate-300 ...">プロフィール画像</th>
                        <td class="border border-slate-300 ...">
                            @if ($user->profile_image != 'user.jpg')
                            <img src="{{ asset('storage/images/'.$user->profile_image) }}" alt="{{ $user->name }}" width="100" height="100"></td>
                        @else
                        <img src="{{ asset('profiles/user.jpg') }}" alt="{{ $user->name }}" width="100" height="100"></td>
                        @endif
                    </tr>
                </tbody>
            </table>
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
