@extends('layouts.app')

@section('title')
{{ $photo->title }} | {{ $photo->category->name }} | PaiRef
@endsection

@include('layouts.partial.header')
@if($user->id == Auth::id())
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
@endif

@section('content')
<div class="flex flex-wrap justify-center items-start">
    <!-- back to top button -->
    <span id="back-btn" class="material-icons fixed right-32 bottom-5 bg-gray-700 text-white p-2 rounded-full cursor-pointer hidden">
        arrow_circle_up
    </span>

    <!-- left side -->
    <div class="item w-2/3 h-auto">

        <!-- photo detail -->
        <div class="container mx-auto bg-white py-5 px-2">
            <h2 class="bg-gray-200 text-xl font-bold w-full p-2">{{ $photo->title }}</h2>

            <div class="flex justify-center items-center mt-3">
                <div class="overflow-hidden shadow-lg w-full">
                    <img class="w-full h-96 object-cover" src="{{ url('static/post_images/'.$photo->image_path) }}" alt="Sunset in the mountains">
                    <div class="px-6 py-4">
                        <p class="text-gray-700 text-base">
                            {{ $photo->caption }}
                        </p>
                    </div>
                    <div class="px-6 py-4">
                        <div id="pai-app"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- comment area -->
        <div class="container mx-auto bg-white py-5 px-2">
            <h2 class="bg-gray-200 text-xl font-bold w-full p-2">コメント(500字以内)</h2>
            @guest
            <a href="{{ route('login') }}" class="bg-indigo-500 text-white p-2 rounded font-bold block mt-3 w-1/2 mx-auto text-center hover:underline">コメントをするにはログインしてください</a>
            @else
            <form action="{{ route('users.photos.comments.store', ['user' => Auth::user()->name, 'photo' => $photo->id]) }}" method="POST">
                @csrf
                <textarea name="body" class="
      w-full
      h-32
      px-4
      mt-3
      py-3
      border-2 border-gray-300
      rounded-sm
      outline-none
      focus:border-blue-400
      resize-none
    "></textarea>
                @error('body')
                <p class="text-red-500">{{ $message }}</p>
                @enderror
                <button type="submit" class="bg-indigo-500 text-white p-2 rounded font-bold block mt-3 w-1/2 mx-auto text-center hover:underline">コメントを投稿する</button>
            </form>
            @endguest

            @if (session('flash'))
            <p class="bg-green-500 text-white p-2 text-center" id="flash">{{ session('flash') }}</p>
            @endif

            <!-- comment list -->
            <div class="antialiased mx-auto max-w-screen-sm">
                <h3 class="mb-4 text-lg font-semibold text-gray-900">コメント({{ $comments->count() }})</h3>
                @if($comments->isEmpty())
                <p>コメントはありません</p>
                @else
                @foreach($comments as $comment)
                <div class="space-y-4 my-1">
                    <div class="flex">
                        <div class="flex-shrink-0 mr-3">
                            @if ($comment->user->profile_image != 'user.jpg')
                            <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" src="{{ asset('storage/images/'.$comment->user->profile_image) }}" alt="{{ $comment->user->name }}">
                            @else
                            <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" src="{{ asset('profiles/user.jpg') }}" alt="{{ $comment->user->name }}">
                            @endif
                        </div>
                        <div class="flex-1 border rounded-lg px-4 py-2 sm:px-6 sm:py-4 leading-relaxed">
                            <strong>{{ $comment->user->name }}</strong>
                            <p class="text-sm">
                                {{ $comment->body }}
                            </p>
                            <div class="mt-4 flex items-center justify-between">
                                <div class="text-sm text-gray-500 font-semibold">
                                    {{ $comment->created_at }}
                                </div>
                                @auth
                                @if ($comment->user->id == Auth::id())
                                <form action="{{ route('users.photos.comments.destroy', ['user' => $comment->user->name, 'photo' => $photo->id, 'comment' => $comment->id]) }}" method="post" id="delete-comment">
                                    @csrf
                                    @method('delete')
                                </form>
                                <span class="material-icons cursor-pointer" onclick="deleteComment();">
                                    delete
                                </span>
                                @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>

        <!-- this user's another photos -->
        <div class="container mx-auto mt-5 bg-white py-5 px-2">
            <h2 class="bg-gray-200 text-xl font-bold w-full p-2">{{ $user->name }}さんの他の写真</h2>
            <div class="grid-cols-3 p-10 space-y-2 bg-white lg:space-y-0 lg:grid lg:gap-3 lg:grid-rows-3">
                @foreach ($user->photos as $photo)
                <a href="{{ route('users.showDetail', ['user' => $user->name, 'photo' => $photo->id]) }}">
                    <div class="w-full rounded">
                        <img src="{{ url('static/post_images/'.$photo->image_path) }}" alt="{{ $photo->title }}" class="object-cover">
                    </div>
                </a>
                @endforeach
            </div>
        </div>

    </div>

    <!-- right side -->
    <div class="item w-1/3 h-auto">
        <div class="bg-white p-2 ml-2">
            @guest
            <p>PaiRefにメンバー登録して、写真好きのメンバーとの交流や、フォトコンテストへチャレンジしよう!</p>
            <a href="{{ route('register') }}" class="bg-indigo-500 text-white p-2 rounded font-bold inline-block mt-3 w-full text-center hover:underline">利用登録する</a>
            @else
            <p>自分のお気に入りの一枚を投稿して、他のユーザーと共有しよう!!</p>
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
<script src="{{ asset('vue/vue.js') }}"></script>

<script>
    'use strict';

    function deleteComment() {
        if (confirm('コメントを削除してよろしいですか？')) {
            document.getElementById('delete-comment').submit();
        }
    }

</script>
@endsection
