<header class="max-w-4xl mx-auto mt-28 text-center">
    <h1 class="text-2xl font-semibold mb-6">
        Search the latest news | <span class="text-blue-500"><a href="/admin/posts/create">Create a post</a></span> | Leave a comment!
    </h1>
    {{-- <h1 class="text-4xl mb-6">
        Latest <span class="text-blue-500">Develop With Aric</span> News
    </h1> --}}
    {{-- <p>
        <a href="#newsletter" class="bg-gray-200 hover:bg-gray-300 text-xl font-bold px-5 py-3 border border-black rounded-full">
            Subscribe for Updates
        </a>
    </p> --}}

    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-6">
        <!--  Category / Dropdown Links -->
        <div class="relative lg:inline-flex bg-gray-100 hover:bg-gray-300 rounded-xl py-2">
            <x-category-dropdown />
        </div>

        <!-- Other Filters -->
        {{-- <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
            <select class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold">
                <option value="category" disabled selected>Other Filters
                </option>
                <option value="foo">Foo
                </option>
                <option value="bar">Bar
                </option>
            </select>

            <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22"
                 height="22" viewBox="0 0 22 22">
                <g fill="none" fill-rule="evenodd">
                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                    </path>
                    <path fill="#222"
                          d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                </g>
            </svg>
        </div> --}}

        <!-- Search -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 hover:bg-gray-300 rounded-xl px-3 py-2">
            <form method="GET" action="/">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                <input 
                    type="text" 
                    name="search" 
                    placeholder="Search.."
                    class="bg-transparent placeholder-black font-semibold text-sm"
                    value="{{ request('search') }}";
                >
            </form>
        </div>
    </div>
</header>