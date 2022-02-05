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
