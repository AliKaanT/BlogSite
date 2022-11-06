@extends('site.layouts.app')

@section('banner')
    @include('site.includes.default_banner', ['title1' => 'kategoriler', 'title2' => $category->name])
@endsection


@section('content')
    <section class="blog-posts grid-system">
        <div class="container">
            <div class="row">

                <div class="col-lg-8">
                    <div class="all-blog-posts">
                        <div class="row">

                            @foreach ($posts as $post)
                                <div class="col-lg-6">
                                    <x-highlighted_posts :item="$post"> </x-highlighted_posts>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    @include ('site.includes.sidebar')
                </div>
            </div>
    </section>
@endsection
