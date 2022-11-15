@extends('panel.layouts.app')

@section('content')
    <div class="m-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Preview Content</th>
                    <th scope="col">Categories</th>
                    <th scope="col">Is Active?</th>
                    <th scope="col">Highlighted ?</th>
                    <th scope="col">Edit</th>
                </tr>


            </thead>
            <tbody>
                @foreach ($posts as $key => $post)
                    <tr>
                        <th>{{ $post->id }} </th>
                        <td>{{ $post->title }} </td>
                        <th>{{ $post->preview_content }} </th>
                        {{-- <th>{{ $post->categries }} </th> --}}
                        <td>
                            @foreach ($post->categories as $category)
                                {{ $category->name }} |
                            @endforeach
                        </td>
                        <td>
                            <div class="custom-control custom-switch">

                                @if ($post->is_active)
                                    <input checked type="checkbox" data-item={{ $post->id }} class="custom-control-input" id="customSwitches{{ $key }}" onchange="change_activity(this)">
                                @else
                                    <input type="checkbox" data-item={{ $post->id }} class="custom-control-input" id="customSwitches{{ $key }}" onchange="change_activity(this)">
                                @endif
                                <label class="custom-control-label" for="customSwitches{{ $key }}">{{ $post->is_active }}</label>

                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-switch">
                                @if ($post->highlight)
                                    <input checked type="checkbox" data-item={{ $post->id }} class="custom-control-input" id="custom2Switches{{ $key }}" onchange="change_highliht(this)">
                                @else
                                    <input type="checkbox" data-item={{ $post->id }} class="custom-control-input" id="custom2Switches{{ $key }}" onchange="change_highliht(this)">
                                @endif
                                <label class="custom-control-label" for="custom2Switches{{ $key }}">{{ $post->highlight }}</label>
                            </div>
                        </td>
                        <td> <a href="{{ route('panel.edit_post', $post->id) }}"><button class="btn btn-sm btn-warning">Edit</button></a> </td>
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
                fetch(`{{ route('panel.post_activity_update') }}?id=${id}&value=${+value}`, {
                    method: "GET"
                })
            }

            function change_highliht(e) {
                value = e.checked;
                id = e.dataset.item
                console.dir(value);
                e.nextElementSibling.innerHTML = +value
                fetch(`{{ route('panel.post_highlight_update') }}?id=${id}&value=${+value}`, {
                    method: "GET"
                })
            }
        </script>
    @endpush
@endsection
