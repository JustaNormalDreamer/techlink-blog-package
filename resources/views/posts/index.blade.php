@extends('blog::layouts.master')

@section('title', 'Post Index')

@section('content')
    <div class="container">
            @if(isset($posts) && $posts->count() > 0)
                <div class="flex flex-wrap">
                    @forelse($posts as $post)
                        <x-blog-post-block :post="$post" />
                    @empty
                        <h3 class="">No posts found!</h3>
                    @endforelse
                </div>
                <div class="mx-auto">
                    {{ $posts->links() }}
                </div>
            @endif
    </div>
@endsection