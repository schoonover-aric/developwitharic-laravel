<!doctype html>

<title>Develop With Aric  &nbsp;&nbsp; < /></title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<style>
    html {
        scroll-behavior: smooth;
    }
    .clamp {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .clamp.one-line {
        -webkit-line-clamp: 1;
    }
</style>
<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/" class="bg-gray-100 transition-colors duration-300 hover:bg-gray-300 text-xl font-bold flex px-5 py-3 rounded-full">
                    Develop With Aric
                    <!-- <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16"> -->
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center">
                @auth
                    <x-dropdown>
                        <x-slot name="trigger">
                            <button class="text-xl transition-colors duration-300 font-bold flex hover:bg-gray-200 px-5 py-3 rounded-full">
                                Welcome, {{ auth()->user()->name }}!&nbsp;<svg class="transform -rotate-90 pointer-events-none" style="right: 12px;" width="22" height="22" viewBox="4 0 22 22">
                                    <g fill="none" fill-rule="evenodd">
                                        <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z"></path>
                                        <path fill="#222" d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                                    </g>
                                </svg>
                            </button>
                        </x-slot>
                        @admin
                            <x-dropdown-item href="/admin/posts" :active="request()->is('admin/posts')" class="ml-3 text-xs font-semibold py-3 px-5">
                                Dashboard
                            </x-dropdown-item>
                            <x-dropdown-item href="/admin/posts/create" :active="request()->routeIs('admin')" class="ml-3 text-xs font-semibold py-3 px-5">
                                Create Post
                            </x-dropdown-item>
                        @endadmin
                        <x-dropdown-item href="#" x-data="{}" @click.prevent="document.querySelector('#logout-form').submit()" class="ml-3 text-xs font-semibold py-3 px-5">
                            Log Out
                        </x-dropdown-item>

                        <form id="logout-form" method="POST" action="/logout" class="text-lg font-semibold text-blue-500 ml-6 hidden">
                            @csrf
                            <!-- <button type="submit">Log Out</button> -->
                        </form>
                    </x-dropdown>

                    <!-- <span class="text-lg font-bold uppercase">Welcome, {{ auth()->user()->name }}!</span>

                    @if (Route::currentRouteName() != 'admin')
                        <a href="/admin/posts/create" class="bg-green-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">Create Post</a>
                    @endif -->

                    
                @else
                    <a href="/register" class="bg-yellow-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">Register</a>
                    <a href="/login" class="bg-green-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">Log In</a>
                @endauth
                {{-- only show if not subscribed... --}}
                <a href="#newsletter" class="text-xl transition-colors duration-300 text-blue-500 flex hover:bg-gray-200 px-5 py-3 rounded-full">
                    Subscribe &#129063;
                </a>
            </div>
        </nav>

        @yield('content')

        <footer id="newsletter" class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Receive the latest news & info from <a href="#" class="font-bold text-slate-800">Develop With Aric</a></h5>
            <p class="text-sm mt-6">Enter a valid email address to subscribe!</p>

            <div class="mt-6">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form method="POST" action="/newsletter" class="lg:flex text-sm">
                        @csrf

                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <div>
                                <input id="email" name="email" type="text" placeholder="Your email address"
                                    class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                                
                                @error('email')
                                    <span class="text-sm text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit"
                                class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                        >
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </footer>
    </section>

    <x-flash />
    
</body>