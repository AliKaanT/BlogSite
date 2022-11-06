@extends('site.layouts.app')

@section('banner')
    @include('site.includes.default_banner', ['title1' => 'Kategoriler', 'title2' => 'Tüm kategoriler'])
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <table class="table mt-5" id="ahmet">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Post Sayısı</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $key => $category)
                            <tr>
                                <th>{{ $key + 1 }}</th>
                                <td><a href="/category/{{ $category->id }}">{{ $category->name }}</a></td>
                                <td>{{ $category->posts_count }}</td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

            <div class="col-lg-4">
                @include('site.includes.sidebar')
            </div>
        </div>
    </div>
@endsection
