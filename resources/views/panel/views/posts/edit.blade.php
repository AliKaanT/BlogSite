@extends('panel.layouts.app')

@section('extra_footer_tags')
    <script src="{{ asset('admin/vendor/dropify/dropify.js') }}"></script>

    <script>
        var img_count = 0;

        $('.show-dropify').on('click', (e) => {
            let parent = (e.target.previousElementSibling)

            let dropify = document.createElement('div');
            dropify.innerHTML = `       
            <input name="img_${img_count}" class="form-control mb-2 dropify" data-height="100" type='file'>
            <button type="button" class="btn btn-sm btn-outline-danger" onclick="remove_parent(this)" >İptal X</button>
            `
            parent.appendChild(dropify);
            $('.dropify').dropify();
            img_count++;
        })

        function remove_parent(e) {
            e.parentNode.remove();
        }

        function remove_image(e) {
            let path = e.previousElementSibling.src;
            e.parentNode.remove();
            document.getElementById('remove_images').innerHTML += (`<input type="text" hidden name=remove_img_${Math.random()} value=${path}>`);
        }

        var category_counter = 0;

        function add_cate(e) {
            let id = document.getElementById('selectcategories').value;
            let name = $(`option[value=${id}]`).text();

            let parent = document.getElementById('categories');

            let child = document.createElement('li');

            child.innerHTML = `
            
            ${name} <button type="button" class="btn btn-danger btn-sm" onclick="remove_parent(this)">X</button>
            <input type="hidden" name="category_n_${category_counter}" value="${id}">
            
            `
            parent.appendChild(child);

            category_counter++;
        }
    </script>
@endsection

@section('content')
    <h1 class="m-5"> {{ $post->slug }} </h1>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <div class="m-5">
        @if ($errors->first())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif
        <form action="{{ route('panel.post_update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="id" value="{{ $post->id }}" hidden>
            <div class="d-none" id="remove_images">
            </div>
            <div class="border p-1 m-2">
                <div class="px-3 row">İmages</div>

                <div class="px-3 my-1 row">
                    @if ($post->images)
                        @foreach ($post->images as $image)
                            <div class="col-3 my-1">
                                <img src="{{ asset($image) }}" alt='img' height="100px">
                                <button type="button" class="btn btn-sm btn-danger" onclick="remove_image(this)">Kaldır</button>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="dropify-area">

                </div>

                <button type="button" class="btn btn-sm btn-outline-primary show-dropify">Ekle</button>
            </div>
            <div class="border p-1 m-2">
                <div>Title</div>
                <input name="title" type="text" class="form-control m-2" value="{{ $post->title }}">
            </div>
            <div class="border p-1 m-2">
                <div>Content</div>
                <textarea name="content" id="summernote">     
                    {!! $post->content !!} 
                </textarea>
            </div>
            <div class="border p-1 m-2">
                <div>Preview</div>
                <textarea name="preview_content" class="form-control">{{ $post->preview_content }}</textarea>
            </div>
            <div class="border p-1 m-2">
                <div class="px-3 row">Categories</div>
                <div class="px-3 my-1 row">
                    <ul id="categories">
                        @foreach ($post->categories as $key => $category)
                            <li>

                                {{ $category->name }} <button type="button" class="btn btn-danger btn-sm" onclick="remove_parent(this)">X</button>
                                <input type="hidden" name="category_{{ $key }}" value="{{ $category->id }}">

                            </li>
                        @endforeach
                    </ul>
                </div>

                <select id="selectcategories">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }} </option>
                    @endforeach
                </select>
                <button type="button" class="btn btn-sm btn-outline-primary show-dropify" onclick="add_cate(this)">Ekle</button>
            </div>


            <button class="btn btn-success m-2">Kaydet</button>
        </form>
        <div class="p-1 m-2">
            <form action="{{ route('panel.post_delete') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $post->id }}">
                <button class="btn btn-danger ">Gönderiyi sil X</button>
            </form>
        </div>
    </div>

    <script>
        $('#summernote').summernote({
            placeholder: 'Hello Bootstrap 4',
            tabsize: 2,
            height: 500
        });
    </script>

@endsection
