<x-dropdown>
    <x-slot name="trigger">
        <button class="pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex" style="width: 9rem;">
            {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}
            <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;" />
        </button>
    </x-slot>

    {{-- dropdown links --}}
    {{-- ?{{ http_build_query(request()->except('category', 'page')) }} --}}
    <x-dropdown-item href="/" 
        {{-- :active="request()->routeIs('home')" --}}
        :active="($_SERVER['REQUEST_URI'] === '/')"
        >All
        <?php 
        //if requesturl == "/" currentCategory == X
            //$myroute = Route::getCurrentRoute()->getPath();
            // $route = Route::current()->uri;
            // dd(request());
            //     {{-- :active="false" --}}    {{-- :active="request()->is('/')" --}}
        ?>
    </x-dropdown-item>

    @foreach ($categories as $category)
        <x-dropdown-item 
            
            href="/?category={{ $category->slug }}{{ http_build_query(request()->except('category', 'page')) }}" 
            :active="isset($currentCategory) && $currentCategory->is($category)"
            {{-- :active='request()->is("/?category={$category->slug}")' --}}
             {{-- :active="request()->is('/?category={$category->slug}')"  --}}
            {{-- :active='request()->is("/?category={$category->slug}")' --}}
            {{-- :active='request()->is("/?category={$category->slug}")'  --}}
            >{{ ucwords($category->name) }}
        </x-dropdown-item>
    @endforeach
</x-dropdown>