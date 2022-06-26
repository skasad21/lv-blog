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
    <meta property="og:url" content="#">
    <meta property="og:description" content="A demo Laravel blog">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-to-r from-blue-600 via-pink-500 to-purple-900">



    <div class="container text-white mx-auto mt-6">
        <div class="grid grid-cols-3 gap-4">
            <div>
                <a href="{{ url('/') }}"><h1 class="text-4xl">Blog</h1></a>
             </div>
            <div class="col-span-2 text-right">
                @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="text-sm text-white dark:text-gray-500 underline">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-white dark:text-gray-500">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="ml-4 text-sm text-white-700 dark:text-gray-500">Register</a>
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
                        <img src="/uploads/{{ $post->image }}" alt="Post header image" class="rounded-lg my-4" />
                        <h1>{{ $post->title }}</h1>
                        <p class="text-justify">
                            {{$post->body}}
                        </p>
                    </div>






                {{-- <div class="mb-10">
                    <img src="https://picsum.photos/1000/420" alt="Post header image" class="rounded-lg my-4" />
                    <h1 class="text-3xl">This is the title of my first post</h1>

                    <p>This is the description bnablab alba lbal ablabla blab al.</p>
                </div>

                <div class="my-10">
                    <img src="https://picsum.photos/1000/420?sjdj" alt="Post header image" class="rounded-lg my-4" />
                    <h1 class="text-3xl">This is the title of my second post</h1>

                    <p>This is the description bnablab alba lbal ablabla blab al.</p>
                </div> --}}

            </div>

            <div>

                <img src="https://picsum.photos/100" class="rounded-full mx-auto p-4" alt="avatar" />
                <p class="text-gray-700 text-xl mb-10">Hi, I'm a demo Laravel Blog application built with Tailwind CSS</p>


                <h2 class="text-gray-400 text-xl">Latest Post</h2>

                <ul>
                    @foreach ($last_posts as $last_post)
                        <li class="py-2"><a class="px-1 py-2 bg-purple-300"
                                href="#">{{ $last_post->title }}</a></li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>

</body>

</html>
