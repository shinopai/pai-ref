<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-200">
    <div id="app" class="w-full lg:w-5/6 lg:mx-auto">
        <nav class=" flex px-5 py-4 bg-gray-500 justify-between">

            <!-- left side -->
            <div class="flex items-center space-x-3 text-xl text-white font-bold">
                <span class="material-icons">
                    photo_camera
                </span>
                <h1>{{ config('app.name', 'Laravel') }}</h1>
            </div>

            <!-- right side -->
            <div class="flex items-center text-sm text-gray-300">
                <span>こんにちは、
                    @guest
                    ゲストさん
                    @else
                    ユーザーさん
                    @endguest
                </span>&nbsp;|&nbsp;
                <a href="#" class="block">ヘルプ</a>
            </div>
        </nav>

        <nav class="bg-gray-700 pl-4">
            <div class="flex items-center justify-between">

                <div class="flex items-center text-gray-300">
                    <div>
                        <a href="#" class="border-r px-2 hover:bg-gray-500 hover:text-white">ホーム</a>
                        <a href="#" class="border-r px-2 hover:bg-gray-500 hover:text-white">写真</a>
                        <a href="#" class="border-r px-2 hover:bg-gray-500 hover:text-white">投稿記事</a>
                        <a href="#" class="border-r px-2 hover:bg-gray-500 hover:text-white">コンテスト</a>
                        <a href="#" class="border-r px-2 hover:bg-gray-500 hover:text-white">ギャラリー</a>
                        <a href="#" class="px-2 hover:bg-gray-500 hover:text-white">メンバー</a>
                    </div>
                </div>
                <div class="flex items-center">
                    <a href="#" class="bg-yellow-500 p-2 hover:bg-yellow-300">プレミアム</a>
                    <a href="{{ route('login') }}" class="bg-blue-500 text-white p-2 hover:bg-blue-300">ログイン</a>
                </div>

            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <div class="bg-gray-500">
            <footer class="flex flex-wrap items-center justify-between p-3 m-auto">
                <div class="container mx-auto flex flex-col flex-wrap items-center justify-between text-gray-300">
                    <p><span class="material-icons" style="vertical-align: -5px;">
                            error
                        </span>
                        PaiRefメンバーによって投稿されたコンテンツは、メンバー個々の視点、主観に基づいたものであり、PaiRefがその内容を保証するものではありません。</p>
                    <ul class="flex text-white justify-center bg-gray-700 w-full my-3">
                        <li class="p-2 cursor-pointer hover:underline">運営会社</li>
                        <li class="p-2 cursor-pointer hover:underline">利用規約</li>
                        <li class="p-2 cursor-pointer hover:underline">プライバシーについて</li>
                        <li class="p-2 cursor-pointer hover:underline">特定商取引法に基づく表示</li>
                        <li class="p-2 cursor-pointer hover:underline">広告記載について</li>
                        <li class="p-2 cursor-pointer hover:underline">ヘルプ</li>
                        <li class="p-2 cursor-pointer hover:underline">お問い合わせ</li>
                    </ul>
                    <div class="flex mx-auto text-white text-center">
                        Copyright Shinopai © 2022
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>

</html>
