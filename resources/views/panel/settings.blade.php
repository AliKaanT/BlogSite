<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes/meta_tags')

    <title>Site Ayarları</title>
</head>

<body>
    <div class="pt-5 container d-flex justify-content-center">
        <div class="w-50">

            <form action="/post/settings" method="POST">

                <input class="form-control mb-2" type='text' name='title' value='{{ $settings['title'] }}'>
                <input class="form-control mb-2" type='text' name='favicon_path' value='{{ $settings['favicon_path'] }}'>
                <input class="form-control mb-2" type='text' name='logo_img_path' value='{{ $settings['logo_img_path'] }}'>
                <textarea class="form-control mb-2" type='text' name='description' value=''>{{ $settings['description'] }}</textarea>
                <div class="border p-1" id="meta_tags">
                    @php
                        $meta_count = 0;
                    @endphp
                    <div class="my-2">Meta Tags <span class="alert alert-danger p-1">Meta taglarında syntax hatası yapmak sorunlara neden olabilir!!!</span> </div>
                    <div id="meta_inputs">

                        @foreach ($settings['meta_tags'] as $meta)
                            <div class="mb-2 d-flex">
                                <input class="form-control" type='text' name='meta_tag_{{ $meta_count }}' value='{{ $meta }}'>
                                <button class="btn btn-danger mx-1 remove" type="button">X</button>
                                @php
                                    $meta_count++;
                                @endphp
                            </div>
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-outline-success" onclick="new_meta_tag()">Ekle</button>
                </div>
                <div class="border p-1" id="social_media">
                    @php
                        $social_media_count = 0;
                    @endphp
                    <div id="social_media_inputs">

                        @foreach ($settings['social_media'] as $key => $value)
                            <div class="d-flex mb-2">
                                <input class="form-control w-25" type="text" name="social_media_key_{{ $social_media_count }}" value="{{ $key }}">
                                <input class="form-control w-75" type="text" name="social_media_value_{{ $social_media_count }}" value="{{ $value }}">
                                <button class="btn btn-danger mx-1 remove" type="button">X</button>
                            </div>
                            @php
                                $social_media_count++;
                            @endphp
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-outline-success" onclick="new_social_media()">Ekle</button>
                </div>
                <div>
                    <button class="btn btn-warning btn-lg" type="submit">GÖNDER</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        let meta_count = "{{ $meta_count }}";
        let social_media_count = "{{ $social_media_count }} ";

        function new_meta_tag() {
            let parent = document.getElementById("meta_inputs");
            let div = document.createElement("div");

            div.innerHTML = `
                                <input class='form-control' type='text' name='meta_tag_${meta_count}'>
                                <button class="btn btn-danger mx-1 remove" type="button">X</button>
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
                                <button class="btn btn-danger mx-1 remove" type="button">X</button>
                            `
            div.setAttribute("class", 'mb-2 d-flex');
            parent.appendChild(div);

            social_media_count++;
        }

        // document.getElementByClassName("remove")[0].addEventListener("onclick", () => {
        //     console.log('ahmet');
        // })

        let remove_buttons = [...document.getElementsByClassName('remove')];
        remove_buttons.map((item) => {
            item.addEventListener("click", () => {
                console.dir(item.parentNode.remove());
            })
        })
    </script>
</body>

</html>
