@extends('panel.layouts.app')

@section('extra_footer_tags')
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

        <form action="{{ route('panel.page_update') }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="{{ $page->id }}">
            <div class="border p-1 m-2">
                <div>Name</div>
                <input name="name" type="text" class="form-control m-2" value="{{ $page->name }}">
            </div>
            {{-- <div class="border p-1 m-2"></div> --}}
            <div class="border p-1 m-2">

                <div class="mb-2"> Content </div>
                <textarea name="content" id="summernote">     
                    {{ $page->content }}
                </textarea>
            </div>

            <button class="btn btn-success m-2">Kaydet</button>
        </form>
        <div class="p-1 m-2">
            <form action="{{ route('panel.page_delete') }}" method="POST">
                <input type="hidden" name="id" value="{{ $page->id }}">
                <button class="btn btn-danger ">Sayfayı sil X</button>
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

    </html>
@endsection
