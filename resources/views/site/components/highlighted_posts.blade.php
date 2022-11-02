{{-- @php
    $item = [
        'img' => 'admin/site/img/favicon.ico',
        'title' => 'merhaba bı bri bpıst',
        'categories' => ['1', '2', '3'],
        'preview-content' => 'lorem ipsum dolor sit amet, consectetur adipiscing, sed do eiusmod tempor incididunt ut labore et',
    ];
@endphp --}}

<div class="col-lg-12">
    <div class="blog-post">
        <div class="blog-thumb">
            <img src={{ asset($item['img']) }} alt="" style="max-height: 350px; object-fit : cover">
        </div>
        <div class="down-content">
            <a href="post-details.html">
                <h4>{{ $item['title'] }}i</h4>
            </a>
            <ul class="post-info">
                <li><a href="#">May 31, 2020</a></li>
            </ul>
            <p>
                {{ $item['preview-content'] }}
            </p>
            <div class="post-options">
                <div class="row">
                    <div class="col-6">
                        <ul class="post-tags">
                            <!--  Categories -->

                            <li><i class="fa fa-tags"></i></li>
                            @foreach ($item['categories'] as $index)
                                <li><a href="#">{{ $index }}</a></li>
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
</div>
