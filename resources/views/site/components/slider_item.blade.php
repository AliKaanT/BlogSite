<div class="item">
    <img src="{{ asset($item->img) }}" alt="" style="object-fit: cover">
    <div class="item-content">
        <div class="main-content">
            <a href="{{ route('single_post', $item->slug) }}">
                <h4>{{ $item->title }}</h4>
            </a>
            <ul class="post-info">
                @foreach ($item->categories as $value)
                    <li><a href="/category/{{ $value->id }}">{{ $value->name }}</a> </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
