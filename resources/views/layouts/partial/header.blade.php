<nav class=" flex px-5 py-4 bg-gray-500 justify-between w-5/6 mx-auto">

    <!-- left side -->
    <div class="flex items-center space-x-3 text-xl text-white font-bold">
        <span class="material-icons">
            photo_camera
        </span>
        <h1><a href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a></h1>
    </div>

    <!-- right side -->
    <div class="flex items-center text-sm text-gray-300">
        <span>こんにちは、
            @guest
            ゲストさん
            @else
            {{ Auth::user()->name }}さん
            @endguest
        </span>&nbsp;|&nbsp;
        <a href="#" class="block">ヘルプ</a>
    </div>
</nav>

<nav class="bg-gray-700 pl-4 w-5/6 mx-auto">
    <div class="flex items-center justify-between">

        <div class="flex items-center text-gray-300">
            <div>
                <a href="{{ url('/') }}" class="border-r px-2 hover:bg-gray-500 hover:text-white">ホーム</a>
                <a href="{{ route('photos.showSearch') }}" class="border-r px-2 hover:bg-gray-500 hover:text-white">写真</a>
                <a href="#" class="border-r px-2 hover:bg-gray-500 hover:text-white">投稿記事</a>
                <a href="#" class="border-r px-2 hover:bg-gray-500 hover:text-white">コンテスト</a>
                <a href="#" class="border-r px-2 hover:bg-gray-500 hover:text-white">ギャラリー</a>
                <a href="#" class="px-2 hover:bg-gray-500 hover:text-white">メンバー</a>
            </div>
        </div>
        <div class="flex items-center">
            <a href="#" class="bg-yellow-500 p-2 hover:bg-yellow-300">プレミアム</a>
            @guest
            <a href="{{ route('login') }}" class="bg-blue-500 text-white p-2 hover:bg-blue-300">ログイン</a>
            @else
            <a href="#" class="bg-green-500 text-white p-2 hover:bg-green-300">マイページ</a>
            <form action="{{ route('logout') }}" method="POST" id="logout-form">
                @csrf
            </form>
            <a href="#" class="bg-blue-500 text-white p-2 hover:bg-blue-300" onclick="event.preventDefault(); document.getElementById('logout-form')">ログアウト</a>
            @endguest
        </div>

    </div>
</nav>
