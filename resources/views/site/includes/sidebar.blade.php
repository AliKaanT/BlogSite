<div class="sidebar">
    <div class="row">
        <div class="col-lg-12">
            <div class="sidebar-item recent-posts">
                <div class="sidebar-heading">
                    <h2>En Son gönderiler</h2>
                </div>
                <div class="content">
                    <ul>
                        @foreach ($recent_posts as $post)
                            <li>
                                <a href="{{route('single_post', ['slug' => $post->slug])}}">
                                    <h5>{{ $post->title }}</h5>
                                    <span>{{ $post->posted_at }}</span>
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
                                <a href="{{route('single_category', ['slug' => $item->slug])}}">
                                    {{ ucfirst($item->name) }}
                                </a>
                            </li>
                        @endforeach
                        <li><a class="text-muted" href="{{route('categories')}}">View all</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
