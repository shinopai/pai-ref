@extends('layouts.app')

@section('title')
写真投稿 & 写真共有サイト | PaiRef
@endsection

@section('content')
<div class="flex flex-wrap justify-center items-center">
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
                        <li class="p-4 hover:bg-gray-50 cursor-pointer"><span class="material-icons" style="vertical-align: -6px;">
                                image
                            </span>新着写真を見る</li>
                        <li class="p-4 hover:bg-gray-50 cursor-pointer"><span class="material-icons" style="vertical-align: -6px;">
                                image
                            </span>人気写真を見る</li>
                        <li class="p-4 hover:bg-gray-50 cursor-pointer"><span class="material-icons" style="vertical-align: -6px;">
                                edit
                            </span>撮影記を見る</li>
                        <li class="p-4 hover:bg-gray-50 cursor-pointer"><span class="material-icons" style="vertical-align: -6px;">
                                search
                            </span>撮影スポットを探す</li>
                        <li class="p-4 hover:bg-gray-50 cursor-pointer"><span class="material-icons" style="vertical-align: -6px;">
                                search
                            </span>季節の"花"を探す</li>
                        <li class="p-4 hover:bg-gray-50 cursor-pointer"><span class="material-icons" style="vertical-align: -6px;">
                                search
                            </span>植物園を探す</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- shooting notes -->
        <div class="bg-white p-2 mt-5" style="height: 400px;">
            <h2 class="bg-blue-200 text-xl font-bold w-full p-2"><small class="text-blue-500 text-xl">可愛すぎ</small>の撮影記<small class="ml-2 text-sm font-normal">2022/2/2 更新</small></h2>
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

    <!-- right side -->
    <div class="item w-1/3 h-auto">2</div>
</div>
@endsection
