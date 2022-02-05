@extends('layouts.app')

@section('title')
写真投稿 & 写真共有サイト | PaiRef
@endsection

@include('layouts.partial.header')

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
        <!-- today's photo & quick menu -->
        <div class="flex flex-wrap justify-center items-start">
            <div class="item w-2/3">
                <div class="bg-white p-2" style="height: 400px;">
                    <h2 class="bg-gray-200 text-xl font-bold w-full p-2">今日の一枚<small class="ml-2 text-sm font-normal">2022/2/2 更新</small></h2>
                    <p class="mt-3">枝の1本1本に積もった雪の描写が見事です。雪の量感に圧倒される一枚（編集部）</p>
                    <div class="flex items-center p-4">
                        <img alt="mountain" class="w-45 rounded-md border-2 border-gray-300" src="https://picsum.photos/seed/picsum/200" />
                        <div id="body" class="flex flex-col ml-5 mb-20">
                            <h4 id="name" class="text-xl font-semibold mb-2">国民的美少女</h4>
                            <div class="flex mt-5">
                                <span>作者: 彩ちゃん</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item w-1/3">
                <div class="bg-white p-2 ml-2" style="height: 400px;">
                    <h2 class="bg-gray-200 text-xl font-bold w-full p-2">クイックメニュー</h2>
                    <ul class="divide-y divide-gray-300">
                        <li class="p-4 pl-0 hover:bg-gray-50 cursor-pointer"><span class="material-icons" style="vertical-align: -6px;">
                                image
                            </span><a href="{{ route('photos.showSearch') }}">新着写真を見る</a></li>
                        <li class="p-4 pl-0 hover:bg-gray-50 cursor-pointer"><span class="material-icons" style="vertical-align: -6px;">
                                image
                            </span>人気写真を見る</li>
                        <li class="p-4 pl-0 hover:bg-gray-50 cursor-pointer"><span class="material-icons" style="vertical-align: -6px;">
                                edit
                            </span>撮影記を見る</li>
                        <li class="p-4 pl-0 hover:bg-gray-50 cursor-pointer"><span class="material-icons" style="vertical-align: -6px;">
                                search
                            </span>撮影スポットを探す</li>
                        <li class="p-4 pl-0 hover:bg-gray-50 cursor-pointer"><span class="material-icons" style="vertical-align: -6px;">
                                search
                            </span>季節の"花"を探す</li>
                        <li class="p-4 pl-0 hover:bg-gray-50 cursor-pointer"><span class="material-icons" style="vertical-align: -6px;">
                                search
                            </span>植物園を探す</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- shooting notes -->
        <div class="bg-white p-2 mt-5" style="height: 500px;">
            <h2 class="bg-blue-200 text-xl font-bold w-full p-2"><small class="text-blue-500 text-xl">可愛すぎ</small>の撮影記<small class="ml-2 text-sm font-normal">2022/2/2 更新</small></h2>
            <p class="mt-3">とにかく可愛い。そんな国民的美少女の撮影記をピックアップします</p>
            <div class="grid grid-cols-2 grid-rows-4 mt-3">
                <div class="box">
                    <div class="flex items-start p-2">
                        <img alt="mountain" class="w-20 rounded-md border-2 border-gray-300" src="https://picsum.photos/seed/picsum/200" />
                        <div id="body" class="flex flex-col ml-5">
                            <h4 id="name" class="text-lg mb-2">国民的美少女</h4>
                            <div class="flex">
                                <span>by&nbsp;彩ちゃん</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="flex items-start p-2">
                        <img alt="mountain" class="w-20 rounded-md border-2 border-gray-300" src="https://picsum.photos/seed/picsum/200" />
                        <div id="body" class="flex flex-col ml-5">
                            <h4 id="name" class="text-lg mb-2">国民的美少女</h4>
                            <div class="flex">
                                <span>by&nbsp;彩ちゃん</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="flex items-start p-2">
                        <img alt="mountain" class="w-20 rounded-md border-2 border-gray-300" src="https://picsum.photos/seed/picsum/200" />
                        <div id="body" class="flex flex-col ml-5">
                            <h4 id="name" class="text-lg mb-2">国民的美少女</h4>
                            <div class="flex">
                                <span>by&nbsp;彩ちゃん</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="flex items-start p-2">
                        <img alt="mountain" class="w-20 rounded-md border-2 border-gray-300" src="https://picsum.photos/seed/picsum/200" />
                        <div id="body" class="flex flex-col ml-5">
                            <h4 id="name" class="text-lg mb-2">国民的美少女</h4>
                            <div class="flex">
                                <span>by&nbsp;彩ちゃん</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="flex items-start p-2">
                        <img alt="mountain" class="w-20 rounded-md border-2 border-gray-300" src="https://picsum.photos/seed/picsum/200" />
                        <div id="body" class="flex flex-col ml-5">
                            <h4 id="name" class="text-lg mb-2">国民的美少女</h4>
                            <div class="flex">
                                <span>by&nbsp;彩ちゃん</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="flex items-start p-2">
                        <img alt="mountain" class="w-20 rounded-md border-2 border-gray-300" src="https://picsum.photos/seed/picsum/200" />
                        <div id="body" class="flex flex-col ml-5">
                            <h4 id="name" class="text-lg mb-2">国民的美少女</h4>
                            <div class="flex">
                                <span>by&nbsp;彩ちゃん</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="flex items-start p-2">
                        <img alt="mountain" class="w-20 rounded-md border-2 border-gray-300" src="https://picsum.photos/seed/picsum/200" />
                        <div id="body" class="flex flex-col ml-5">
                            <h4 id="name" class="text-lg mb-2">国民的美少女</h4>
                            <div class="flex">
                                <span>by&nbsp;彩ちゃん</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="flex items-start p-2">
                        <img alt="mountain" class="w-20 rounded-md border-2 border-gray-300" src="https://picsum.photos/seed/picsum/200" />
                        <div id="body" class="flex flex-col ml-5">
                            <h4 id="name" class="text-lg mb-2">国民的美少女</h4>
                            <div class="flex">
                                <span>by&nbsp;彩ちゃん</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- latest shooting notes -->
        <div class="bg-white p-2 mt-5" style="height: 610px;">
            <h2 class="bg-gray-200 text-xl font-bold w-full p-2">最新撮影記<small class="ml-2 text-sm font-normal">2022/2/2 更新</small></h2>
            <div class="grid grid-cols-2 grid-rows-5 mt-3">
                <div class="box">
                    <div class="flex items-start p-2">
                        <img alt="mountain" class="w-20 rounded-md border-2 border-gray-300" src="https://picsum.photos/seed/picsum/200" />
                        <div id="body" class="flex flex-col ml-5">
                            <h4 id="name" class="text-lg mb-2">国民的美少女</h4>
                            <div class="flex">
                                <span>by&nbsp;彩ちゃん</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="flex items-start p-2">
                        <img alt="mountain" class="w-20 rounded-md border-2 border-gray-300" src="https://picsum.photos/seed/picsum/200" />
                        <div id="body" class="flex flex-col ml-5">
                            <h4 id="name" class="text-lg mb-2">国民的美少女</h4>
                            <div class="flex">
                                <span>by&nbsp;彩ちゃん</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="flex items-start p-2">
                        <img alt="mountain" class="w-20 rounded-md border-2 border-gray-300" src="https://picsum.photos/seed/picsum/200" />
                        <div id="body" class="flex flex-col ml-5">
                            <h4 id="name" class="text-lg mb-2">国民的美少女</h4>
                            <div class="flex">
                                <span>by&nbsp;彩ちゃん</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="flex items-start p-2">
                        <img alt="mountain" class="w-20 rounded-md border-2 border-gray-300" src="https://picsum.photos/seed/picsum/200" />
                        <div id="body" class="flex flex-col ml-5">
                            <h4 id="name" class="text-lg mb-2">国民的美少女</h4>
                            <div class="flex">
                                <span>by&nbsp;彩ちゃん</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="flex items-start p-2">
                        <img alt="mountain" class="w-20 rounded-md border-2 border-gray-300" src="https://picsum.photos/seed/picsum/200" />
                        <div id="body" class="flex flex-col ml-5">
                            <h4 id="name" class="text-lg mb-2">国民的美少女</h4>
                            <div class="flex">
                                <span>by&nbsp;彩ちゃん</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="flex items-start p-2">
                        <img alt="mountain" class="w-20 rounded-md border-2 border-gray-300" src="https://picsum.photos/seed/picsum/200" />
                        <div id="body" class="flex flex-col ml-5">
                            <h4 id="name" class="text-lg mb-2">国民的美少女</h4>
                            <div class="flex">
                                <span>by&nbsp;彩ちゃん</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="flex items-start p-2">
                        <img alt="mountain" class="w-20 rounded-md border-2 border-gray-300" src="https://picsum.photos/seed/picsum/200" />
                        <div id="body" class="flex flex-col ml-5">
                            <h4 id="name" class="text-lg mb-2">国民的美少女</h4>
                            <div class="flex">
                                <span>by&nbsp;彩ちゃん</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="flex items-start p-2">
                        <img alt="mountain" class="w-20 rounded-md border-2 border-gray-300" src="https://picsum.photos/seed/picsum/200" />
                        <div id="body" class="flex flex-col ml-5">
                            <h4 id="name" class="text-lg mb-2">国民的美少女</h4>
                            <div class="flex">
                                <span>by&nbsp;彩ちゃん</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="flex items-start p-2">
                        <img alt="mountain" class="w-20 rounded-md border-2 border-gray-300" src="https://picsum.photos/seed/picsum/200" />
                        <div id="body" class="flex flex-col ml-5">
                            <h4 id="name" class="text-lg mb-2">国民的美少女</h4>
                            <div class="flex">
                                <span>by&nbsp;彩ちゃん</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="flex items-start p-2">
                        <img alt="mountain" class="w-20 rounded-md border-2 border-gray-300" src="https://picsum.photos/seed/picsum/200" />
                        <div id="body" class="flex flex-col ml-5">
                            <h4 id="name" class="text-lg mb-2">国民的美少女</h4>
                            <div class="flex">
                                <span>by&nbsp;彩ちゃん</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="text-blue-500 block w-full mt-3 py-1 rounded text-center border hover:bg-blue-100 hover:border-blue-400">もっと見る<span class="material-icons" style="vertical-align: -6px;">
                    chevron_right
                </span></button>
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
