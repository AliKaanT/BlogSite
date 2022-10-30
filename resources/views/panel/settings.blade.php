@extends('panel.layouts.app')

@section('content')
    <div class="pt-5 container d-flex justify-content-center my-5">
        <div class="w-75">

            <form action="{{ route('panel.settings_post') }}" method="POST">

                <input class="form-control mb-2" type='text' name='title' value='{{ $settings['title'] }}'>
                <input class="form-control mb-2" type='text' name='favicon_path' value='{{ $settings['favicon_path'] }}'>
                <input class="form-control mb-2" type='text' name='logo_img_path' value='{{ $settings['logo_img_path'] }}'>
                <textarea class="form-control mb-2" type='text' name='description' value=''>{{ $settings['description'] }}</textarea>
                <div class="border p-1" id="meta_tags">
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
                <div class="border p-1" id="social_media">
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
                    <button class="btn btn-warning mt-2" type="submit">Kaydet</button>
                </div>
            </form>
        </div>
    </div>
    <script>
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
