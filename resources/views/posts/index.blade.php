@extends('blog::layouts.master')

@section('title', 'Blog | Index')

@section('content')
    <div class="container">
            @if(isset($posts) && $posts->count() > 0)
                <div class="row">
                    @foreach($posts as $post)
                        <x-blog-post-block :post="$post" />
                    @endforeach
                    <div class="mr-auto">
                        {{ $posts->links() }}
                    </div>
                </div>
            @endif
    </div>
@endsection