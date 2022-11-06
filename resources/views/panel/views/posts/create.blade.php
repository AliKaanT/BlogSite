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

        function remove_category(e, id) {
            document.getElementById('remove_or_add_categories').innerHTML += (`<input type="text" hidden name=remove_category_${Math.random()} value=${id}>`);
            e.parentNode.remove();
        }

        function add_cate(e) {
            let id = document.getElementById('selectcategories').value;

            let li = $(`option[value=${id}]`);

            console.log(li.text())

            console.log(id);
            document.getElementById('remove_or_add_categories').innerHTML += (`<input type="text" hidden name=add_category_${Math.random()} value=${id}>`);
            // e.parentNode.remove();
            document.getElementById('categories').innerHTML += `<li> ${li.text()} <button type="button" class="btn btn-danger btn-sm" onclick="remove_category(this,${id})">X</button> </li>`

            let parent = document.getElementById('categories')

        }
    </script>
@endsection

@section('content')
    <h1> </h1>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <div class="m-5">
        @if ($errors->first())
            <div class="alert alert-danger">
                <li>{{ $errors->first() }}</li>
            </div>
        @endif

        <form action="{{ route('panel.post_create') }}" method="POST" enctype="multipart/form-data">
            <div class="d-none" id="remove_images">
            </div>
            <div class="border p-1 m-2">
                <div class="px-3 row">İmages</div>

                <div class="px-3 my-1 row">

                </div>
                <div class="dropify-area">

                </div>

                <button type="button" class="btn btn-sm btn-outline-primary show-dropify">Ekle</button>
            </div>
            <div class="border p-1 m-2">
                <div>Title</div>
                <input name="title" type="text" class="form-control m-2">
            </div>
            {{-- <div class="border p-1 m-2"></div> --}}
            <div class="border p-1 m-2">

                <div class="mb-2"> Content </div>
                <textarea name="content" id="summernote">     

                </textarea>
            </div>
            <div class="m-2 p-1 border">
                <div>Preview</div>
                <textarea class="form-control m-2" name="preview_content" placeholder="Bu alanı boş bırakırsanız, otomatik olarak doldurulacaktır! Bu sorunlara sebep olabilir."></textarea>
            </div>
            <div class="border p-1 m-2">
                <div class="px-3 row">Categories</div>
                <div class="px-3 my-1 row">
                    <ul id="categories">

                    </ul>
                </div>
                <div id="remove_or_add_categories">

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
    </div>

    <script>
        $('#summernote').summernote({
            placeholder: 'Hello Bootstrap 4',
            tabsize: 2,
            height: 500
        });
    </script>


    </html>
@endsection
