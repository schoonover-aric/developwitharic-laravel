@extends('components/layout')

@section('content')
    @include('posts._header')

    <main class="max-w-7xl mx-auto lg:mt-10 px-4">
        @if ($posts->count())
            <x-posts-grid :posts="$posts" />
        {{-- //show pagination --}}
        {{ $posts->links() }}

        @else
            <p class="text-center">Ain't got any posts yet, foo</p>
        @endif
    </main>
@endsection