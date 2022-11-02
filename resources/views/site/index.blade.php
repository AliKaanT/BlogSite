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
                                <x-highlighted_posts :item="json_encode([
                                    'img' => 'admin/site/img/favicon.ico',
                                    'title' => $post->title,
                                    'categories' => $post->categories,
                                    'preview_content' => $post->preview_content,
                                    'posted_at' => $post->posted_at,
                                ])"></x-highlighted_posts>
                            @endforeach




                            <div class="col-lg-12">
                                <div class="main-button">
                                    <a href="blog.html">View All Posts</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sidebar-item recent-posts">
                                    <div class="sidebar-heading">
                                        <h2>En Son gönderiler</h2>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            @foreach ($recent_posts as $item)
                                                <li>
                                                    <a href="post-details.html">
                                                        <h5>{{ $item->title }}</h5>
                                                        <span>{{ $item->posted_at }}</span>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="sidebar-item categories">
                                    <div class="sidebar-heading">
                                        <h2>Kategoriler</h2>
                                    </div>
                                    <div class="content">
                                        <ul>
                                            @foreach ($categories as $item)
                                                <li>
                                                    <a href="#">
                                                        {{ ucfirst($item->name) }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
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
