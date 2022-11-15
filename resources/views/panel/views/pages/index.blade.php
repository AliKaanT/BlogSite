@extends('panel.layouts.app')

@section('content')
    <div class="container">
        <table class="table" id="ahmet">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Content</th>
                    <th scope="col">Is Active?</th>
                    <th scope="col">Buttons</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pages as $key => $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td><b class="fw-bold">{{ $item->name }}</b></td>
                        <td>{{ substr($item->content, 0, 50) }}</td>
                        <td>
                            <div class="custom-control custom-switch">
                                @if ($item->is_active)
                                    <input checked type="checkbox" data-item="{{ $item->id }}" class="custom-control-input" id="customSwitches{{ $key }}" onchange="change_activity(this)">
                                @else
                                    <input type="checkbox" data-item="{{ $item->id }}" class="custom-control-input" id="customSwitches{{ $key }}" onchange="change_activity(this)">
                                @endif
                                <label class="custom-control-label" for="customSwitches{{ $key }}">{{ $item->is_active }}</label>
                            </div>
                        </td>
                        <td> <a href="{{ route('panel.edit_page', $item->id) }}"><button class="btn btn-sm btn-warning">Edit</button></a> </td>

                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>
    @push('custom_js')
    <script>
        function change_activity(e) {
            value = e.checked;
            id = e.dataset.item
            console.dir(value);
            e.nextElementSibling.innerHTML = +value
            fetch(`{{ route('panel.page_activity_update') }}?id=${id}&value=${+value}`, {
                method: "GET"
            })
        }
    </script>
    @endpush    
@endsection
