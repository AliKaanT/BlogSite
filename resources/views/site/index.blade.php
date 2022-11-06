@extends('site.layouts.app')

@section('banner')
    @include('site.includes.slider')
@endsection

@section('content')
    <section class="blog-posts">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="all-blog-posts">
                        <div class="row">

                            @foreach ($hl_posts as $post)
                                <div class="col-lg-12">
                                    <x-highlighted_posts :item="$post"></x-highlighted_posts>
                                </div>
                            @endforeach

                            <div class="col-lg-12">
                                <div class="main-button">
                                    <a href="{{route('posts')}}">View All Posts</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    @include('site.includes.sidebar')

                </div>
            </div>
        </div>
    </section>
@endsection
