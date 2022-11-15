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
                                @if ($item->is_active)
                                    <input checked class="custom-control-input" data-item="{{ $item->id }}" type="checkbox" id="customSwitches{{ $key }}" onchange="change_activity(this)">
                                @else
                                    <input class="custom-control-input" data-item="{{ $item->id }}" type="checkbox" id="customSwitches{{ $key }}" onchange="change_activity(this)">
                                @endif
                                <label class="custom-control-label" for="customSwitches{{ $key }}">{{ $item->is_active }}</label>
                            </div>
                        </td>
                        <td> <a href="{{ route('panel.edit_category', $item->id) }}"><button class="btn btn-sm btn-warning">Edit</button></a> </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        <div>
            <form action="{{ route('panel.category_create') }}" class="d-flex" method="post">
                @csrf
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
        @push('custom_js')
            <script>
                function change_activity(e) {
                    value = e.checked;
                    id = e.dataset.item
                    console.dir(value);
                    e.nextElementSibling.innerHTML = +value
                    fetch(`{{ route('panel.category_activity_update') }}?id=${id}&value=${+value}`, {
                        method: "GET"
                    })
                }
            </script>
        @endpush
    </div>
@endsection
