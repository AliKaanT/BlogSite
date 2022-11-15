@extends('site.layouts.app')

@section('banner')
    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
    </div>
@endsection

@section('content')
    <section class="blog-posts grid-system">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="all-blog-posts">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="blog-post">
                                    <div class="blog-thumb">
                                        <div class="main-banner header-text">
                                            <div class="container-fluid">
                                                <div class="owl-clients owl-carousel">
                                                    @foreach ($post->images as $image)
                                                        <img src="{{ asset($image) }}" alt="">
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="down-content">

                                        <h3>{{ $post->title }}</h3>

                                        <ul class="post-info">
                                            <li><a href="#">{{ $post->posted_at }}</a></li>
                                        </ul>
                                        <hr>
                                        <div>
                                            {!! $post->content !!}
                                        </div>
                                        <hr>
                                        <div class="post-options">
                                            <div class="row">
                                                <div class="col-6">
                                                    <ul class="post-tags">
                                                        @foreach ($post->categories as $category)
                                                            <li><a href="{{ route('single_category', ['slug' => $category->slug]) }}">{{ $category->name }}</a></li>,
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="col-6">
                                                    <ul class="post-share">
                                                        <li><i class="fa fa-share-alt"></i></li>
                                                        <li><a target="__blank" href="https://www.facebook.com/sharer/sharer.php?u={{ route('single_post', ['slug' => $post->slug]) }}">Facebook</a>,</li>
                                                        <li><a target="__blank" href="https://twitter.com/intent/tweet?text={{ route('single_post', ['slug' => $post->slug]) }}"> Twitter</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
