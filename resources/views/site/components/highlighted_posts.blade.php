<div class="blog-post">
    <div class="blog-thumb">
        @foreach ($item->images as $image)
            <img src={{ asset($image) }} alt="" style="max-height: 350px; object-fit : cover">
        @break
    @endforeach
</div>
<div class="down-content">
    <a href="{{route('single_post', ['slug' => $item->slug])}}">
        <h4>{{ $item->title }}</h4>
    </a>
    <ul class="post-info">
        <li><a>{{ $item->posted_at }}</a></li>
    </ul>
    <p>
        {{ $item->preview_content }}...
    </p>
    <div class="post-options">
        <div class="row">
            <div class="col-6">
                <ul class="post-tags">
                    <!--  Categories -->

                    <li><i class="fa fa-tags"></i></li>
                    @foreach ($item->categories as $key => $value)
                        <li>{{ $key == 0 ? '' : ',' }} <a href="{{ route('single_category', ['slug' => $value->slug]) }}">{{ $value->name }}</a></li>
                    @endforeach

                    <!--  Categories -->
                </ul>
            </div>
            <div class="col-6">
                <ul class="post-share">
                    <li><i class="fa fa-share-alt"></i></li>
                    <li><a href="#">Facebook</a>,</li>
                    <li><a href="#"> Twitter</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
