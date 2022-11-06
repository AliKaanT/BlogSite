@extends('panel.layouts.app')

@section('content')
    <div class="container">
        <table class="table" id="ahmet">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Post Count</th>
                    <th scope="col">Is Active?</th>
                    <th scope="col">Buttons</th>

                </tr>


            </thead>
            <tbody>
                @foreach ($categories as $key => $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td><b class="fw-bold">{{ $item->name }}</b></td>
                        <td>{{ $item->posts_count }}</td>
                        <td>
                            <div class="custom-control custom-switch">
                                <form action="{{ route('panel.category_activity_update') }}" method="POST">
                                    <input type="text" name="id" value="{{ $item->id }}" hidden>
                                    @if ($item->is_active)
                                        <input type="text" name="value" value="0" hidden>
                                        <input checked type="checkbox" class="custom-control-input" id="customSwitches{{ $key }}" onchange="(()=>{this.nextElementSibling.click()})()">
                                    @else
                                        <input name="value" value="1" hidden>
                                        <input type="checkbox" class="custom-control-input" id="customSwitches{{ $key }}" onchange="(()=>{this.nextElementSibling.click()})()">
                                    @endif
                                    <button type="submit" style="display: none"></button>
                                    <label class="custom-control-label" for="customSwitches{{ $key }}">{{ $item->is_active }}</label>
                                </form>
                            </div>
                        </td>
                        <td> <a href="{{route('panel.edit_category',$item->id)}}"><button class="btn btn-sm btn-warning">Edit</button></a> </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        <div>
            <form action="{{ route('panel.category_create') }}" class="d-flex" method="post">
                <input type="text" name="name" class="form-control m-2 w-auto" required>
                <button class="btn btn-success m-2" onclick="summonForm(this)">Ekle +</button>
            </form>
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </div>
            @endif
            <!-- Default switch -->

        </div>
    </div>
@endsection
