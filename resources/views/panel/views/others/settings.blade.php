@extends('panel.layouts.app')

@section('extra_footer_tags')
    <script src="{{ asset('admin/vendor/dropify/dropify.js') }}"></script>
    <script>
        $('.show-dropify').on('click', (e) => {

            let parent = e.target.parentNode.parentNode;
            let div = document.createElement("div");
            div.innerHTML = `       
                        <input name="${e.target.dataset.name}" class="form-control mb-2 dropify" data-height="100" type='file'>
                        <button type="button" class="btn btn-sm btn-outline-danger" onclick="remove_parent(this)" >İptal X</button>
                        `
            div.setAttribute("class", 'col');
            parent.appendChild(div);
            $('.dropify').dropify();
        })
    </script>
@endsection

@section('content')
    <div class="pt-5 container d-flex justify-content-center my-5">
        <div class="w-75">

            <form enctype="multipart/form-data" action="{{ route('panel.settings_update') }}" method="POST">
                @csrf
                <input class="form-control mb-2 dropify" type='file'>


                <div class="border p-1 m-2" id="favicon">
                    <div class="px-3 row">Favicon</div>
                    <div class="px-3 row">
                        <div class="col-3">
                            <img src="{{ asset($settings['favicon_path']) }}" alt="favicon" height="100px">
                            <button type="button" class="btn btn-sm btn-outline-primary show-dropify" data-name="favicon">Değiştir</button>
                        </div>
                    </div>
                </div>
                <div class="border p-1 m-2" id="logo">
                    <div class="px-3 row">Logo</div>
                    <div class="px-3 row">
                        <div class="col-3">
                            <img src="{{ asset($settings['logo_path']) }}" alt="logo" height="100px">
                            <button type="button" class="btn btn-sm btn-outline-primary show-dropify" data-name="logo">Değiştir</button>
                        </div>
                    </div>
                </div>
                <div class="border p-1 m-2">
                    <div>Title</div>
                    <input class="form-control mb-2" type='text' name='title' value='{{ $settings['title'] }}'>
                </div>
                <div class="border p-1 m-2">
                    <div>Description</div>
                    <textarea class="form-control mb-2" type='text' name='description' value=''>{{ $settings['description'] }}</textarea>
                </div>
                <div class="border p-1 m-2" id="meta_tags">
                    @php
                        $meta_count = 0;
                    @endphp
                    <div class="my-2">Meta Tagları </div>
                    <div id="meta_inputs">

                        @foreach ($settings['meta_tags'] as $meta)
                            <div class="mb-2 d-flex">
                                <input class="form-control" type='text' name='meta_tag_{{ $meta_count }}' value='{{ $meta }}'>
                                <button class="btn btn-danger mx-1 remove" type="button" onclick="remove_parent(this)">X</button>
                                @php
                                    $meta_count++;
                                @endphp
                            </div>
                        @endforeach
                    </div>
                    <div class="alert alert-danger p-1">Meta taglarında syntax hatası yapmak sorunlara neden olabilir!!!</div>
                    <button type="button" class="btn btn-outline-success" onclick="new_meta_tag()">Ekle</button>
                </div>
                <div class="border p-1 m-2" id="social_media">
                    @php
                        $social_media_count = 0;
                    @endphp
                    <div class="my-2">Sosyal Medya</div>

                    <div id="social_media_inputs">

                        @foreach ($settings['social_medias'] as $key => $value)
                            <div class="d-flex mb-2">
                                <input class="form-control w-25" type="text" name="social_media_key_{{ $social_media_count }}" value="{{ $key }}"> :
                                <input class="form-control w-75" type="text" name="social_media_value_{{ $social_media_count }}" value="{{ $value }}">
                                <button class="btn btn-danger mx-1 remove" type="button" onclick="remove_parent(this)">X</button>
                            </div>
                            @php
                                $social_media_count++;
                            @endphp
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-outline-success" onclick="new_social_media()">Ekle</button>
                </div>
                <div>
                    <button class="btn btn-success m-2" type="submit">Kaydet</button>
                </div>
            </form>
        </div>

    </div>
    <script>
        // For social_media and met_tags
        let meta_count = Number("{{ $meta_count }}");
        let social_media_count = Number("{{ $social_media_count }}");

        function new_meta_tag() {
            let parent = document.getElementById("meta_inputs");
            let div = document.createElement("div");

            div.innerHTML = `
            <input class='form-control' type='text' name='meta_tag_${meta_count}'>
            <button class="btn btn-danger mx-1 remove" type="button" onclick="remove_parent(this)">X</button>
            `
            div.setAttribute("class", 'mb-2 d-flex');
            parent.appendChild(div);

            meta_count++;
        }

        function new_social_media() {
            let parent = document.getElementById("social_media_inputs");
            let div = document.createElement("div");

            div.innerHTML = `
            <input required class="form-control w-25" type="text" name="social_media_key_${ social_media_count }">
            <input required class="form-control w-75" type="text" name="social_media_value_${ social_media_count }">
            <button class="btn btn-danger mx-1 remove" type="button" onclick="remove_parent(this)">X</button>
            `
            div.setAttribute("class", 'mb-2 d-flex');
            parent.appendChild(div);

            social_media_count++;
        }

        function remove_parent(e) {
            e.parentNode.remove();
        }
    </script>
@endsection
