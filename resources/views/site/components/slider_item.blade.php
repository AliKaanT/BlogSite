<div class="item">
    <img src="{{ asset($item->img) }}" alt="" style="object-fit: cover">
    <div class="item-content">
        <div class="main-content">
            <a href="post-details.html">
                <h4>{{ $item->title }}</h4>
            </a>
            <ul class="post-info">
                @foreach ($item->categories as $value)
                    <li><a href="">{{ $value }}</a> </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>