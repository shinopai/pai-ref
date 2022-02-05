@extends('layouts.app')

@section('title')
写真一覧 | PaiRef
@endsection

@include('layouts.partial.header')

@section('content')
<div class="flex flex-wrap justify-center items-start">
    <!-- back to top button -->
    <span id="back-btn" class="material-icons fixed right-32 bottom-5 bg-gray-700 text-white p-2 rounded-full cursor-pointer hidden">
        arrow_circle_up
    </span>

    <!-- left side -->
    <div class="item w-2/3 h-auto">
        <!-- all photos -->
        <div class="bg-gray-200">
            <div class="container mx-auto flex justify-center items-start p-2 md:p-0">
                <div class="border border-gray-300 p-6 grid grid-cols-1 gap-6 bg-white w-full">
                    <form action="{{ route('photos.getSearchResult') }}" method="GET">
                        <div class="flex flex-col md:flex-row">
                            <div class="">
                                <label for="category">カテゴリー</label>
                                <select class="border p-2" id="category" name="category_id">
                                    <option value="null">選択</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="pt-6 md:pt-0 md:pl-6">
                                <label for="location">撮影地</label>
                                <select class="border p-2" id="location" name="location_id">
                                    <option value="null">選択</option>
                                    @foreach ($locations as $location)
                                    <option value="{{ $location->id }}">{{ $location->location }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div>
                            <div class="p-2 pl-0">
                                <div class="flex items-center p-2 pl-0 gap-2">
                                    <label for="keyword">キーワード</label><br>
                                    <input type="text" name="keyword" placeholder="タイトルor説明文" class="border p-2 w-2/3 focus:outline-none text-gray-700" id="keyword" />
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-center"><button class="p-2 border w-1/4 rounded-md bg-gray-800 text-white hover:underline">検索</button></div>
                    </form>
                </div>
            </div>
        </div>

        <!-- category search -->
        <div class="container mx-auto mt-5 bg-white py-5 px-2">
            <h2 class="bg-gray-200 text-xl font-bold w-full p-2">カテゴリーで探す</h2>
            <div class="flex flex-wrap justify-start items-center p-2">
                @foreach ($categories as $category)
                <div class="item w-1/3 h-auto p-1"><span class="material-icons" style="vertical-align: -5px;">
                        arrow_right
                    </span><a href="{{ route('photos.getPhotosEachCategory', ['category' => $category->id]) }}" class="hover:text-blue-500">{{ $category->name }}({{ $category->photos->count() }})</a></div>
                @endforeach
            </div>
        </div>

        <!-- all photos -->
        <div class="container mx-auto mt-5 bg-white py-5 px-2">
            <h2 class="bg-gray-200 text-xl font-bold w-full p-2">全写真</h2>
            <p class="mt-3">全{{ $photos->total() }}件中
                {{  ($photos->currentPage() -1) * $photos->perPage() + 1}} -
                {{ (($photos->currentPage() -1) * $photos->perPage() + 1) + (count($photos) -1)  }}件のデータが表示されています。</p>
            {{ $photos->links('vendor.pagination.default') }}
            <div class="grid-cols-3 p-10 space-y-2 bg-white lg:space-y-0 lg:grid lg:gap-3 lg:grid-rows-3">
                @foreach ($photos as $photo)
                <div class="w-full rounded">
                    <img src="{{ url('static/post_images/'.$photo->image_path) }}" alt="{{ $photo->title }}">
                </div>
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
