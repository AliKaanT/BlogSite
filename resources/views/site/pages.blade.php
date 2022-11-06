@extends('site.layouts.app')

@section('banner')
    @include('site.includes.default_banner', ['title1' => 'sayfalar', 'title2' => $page->name])
@endsection

@section('content')
    <section class="blog-posts">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="all-blog-posts">
                        <div class="row">
                            {!! $page->content !!}
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
