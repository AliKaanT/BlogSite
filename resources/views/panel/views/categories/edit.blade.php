@extends('panel.layouts.app')

@section('extra_footer_tags')
@endsection

@section('content')
    <div class="m-5">
        @if ($errors->first())
            <div class="alert alert-danger">
                <li>{{ $errors->first() }}</li>
            </div>
        @endif

        <form action="{{ route('panel.category_update') }}" method="POST">
            <input type="hidden" name="id" value="{{ $category->id }}">
            <div class="border p-1 m-2">
                <div>Name</div>
                <input name="name" type="text" class="form-control m-2" value="{{ $category->name }}">
            </div>
            {{-- <div class="border p-1 m-2"></div> --}}
            <button class="btn btn-success m-2">Kaydet</button>
        </form>
        <div class="p-1 m-2">
            <form action="{{ route('panel.category_delete') }}" method="POST">
                <input type="hidden" name="id" value="{{ $category->id }}">
                <button class="btn btn-danger ">Kategoriyi sil X</button>
            </form>
        </div>
    </div>
@endsection
