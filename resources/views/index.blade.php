<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>My DEV Blog</title>
    <meta name="description" content="My DEV Blog">
    <meta name="author" content="Sourcegraph">

    <meta property="og:title" content="A headless blog in Laravel">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://github.com/sourcegraph-community/laravel-dev-blog">
    <meta property="og:description" content="A demo Laravel blog">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-to-r from-blue-600 via-pink-500 to-purple-900">



    <div class="container text-white mx-auto mt-6">
        <div class="grid grid-cols-3 gap-4">
            <div>
                <h1 class="text-3xl">Blog</h1>
            </div>
            <div class="col-span-2 text-right">
                @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-white dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-white dark:text-gray-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-white-700 dark:text-gray-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            </div>
        </div>
    </div>

    <div class="container mx-auto px-6 py-10 bg-gray-100 my-10 text-gray-600 rounded-md shadow-md">
        <div class="grid grid-cols-4 gap-4">
            <div class="col-span-3">

                <div class="mb-10">
                    <img src="https://picsum.photos/1000/420" alt="Post header image" class="rounded-lg my-4"/>
                    <h1 class="text-3xl">This is the title of my first post</h1>

                    <p>This is the description bnablab alba lbal ablabla blab al.</p>
                </div>

                <div class="my-10">
                    <img src="https://picsum.photos/1000/420?sjdj" alt="Post header image" class="rounded-lg my-4"/>
                    <h1 class="text-3xl">This is the title of my second post</h1>

                    <p>This is the description bnablab alba lbal ablabla blab al.</p>
                </div>

            </div>

            <div>
                <h2 class="text-gray-400 text-xl">Categories</h2>

                <ul>
                    <li><a href="#">Linux</a></li>
                    <li><a href="#">PHP</a></li>
                    <li><a href="#">Development</a></li>
                    <li><a href="#">Devops</a></li>
                    <li><a href="#">Career</a></li>
                </ul>
            </div>
        </div>
    </div>

</body>
</html>
