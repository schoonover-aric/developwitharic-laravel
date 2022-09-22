@extends('components/layout')

@section('content')
    @include('posts._header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($posts->count())
            <x-posts-grid :posts="$posts" />
        {{-- //show pagination --}}
        {{ $posts->links() }}

        @else
            <p class="text-center">Ain't got any posts yet, foo</p>
        @endif
    </main>
@endsection