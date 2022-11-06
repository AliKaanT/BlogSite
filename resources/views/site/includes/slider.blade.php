<!-- Banner Starts Here -->
<div class="main-banner header-text">
    <div class="container-fluid">
        <div class="owl-banner owl-carousel">
            @foreach ($hl_posts as $key => $post)
                @if ($key == 5)
                    {{-- Max 5 adet slide olacak --}}
                @break
            @endif

            <x-slider_item :item="json_encode([
                'img' => $post->images[0],
                'title' => $post->title,
                'slug' => $post->slug,
                'categories' => $post->categories,
            ])"></x-slider_item>
        @endforeach

    </div>
</div>
</div>
<!-- Banner Ends Here -->
