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
                                <form action="{{ route('panel.post_activity_update') }}" method="POST">
                                    <input type="text" name="id" value="{{ $post->id }}" hidden>
                                    @if ($post->is_active)
                                        <input type="text" name="value" value="0" hidden>
                                        <input checked type="checkbox" class="custom-control-input" id="customSwitches{{ $key }}" onchange="(()=>{this.nextElementSibling.click()})()">
                                    @else
                                        <input name="value" value="1" hidden>
                                        <input type="checkbox" class="custom-control-input" id="customSwitches{{ $key }}" onchange="(()=>{this.nextElementSibling.click()})()">
                                    @endif
                                    <button type="submit" style="display: none"></button>
                                    <label class="custom-control-label" for="customSwitches{{ $key }}">{{ $post->is_active }}</label>
                                </form>
                            </div>
                        </td>
                        <td>
                            <div class="custom-control custom-switch">
                                <form action="{{ route('panel.post_highlight_update') }}" method="POST">
                                    <input type="text" name="id" value="{{ $post->id }}" hidden>
                                    @if ($post->highlight)
                                        <input type="text" name="value" value="0" hidden>
                                        <input checked type="checkbox" class="custom-control-input" id="custom2Switches{{ $key }}" onchange="(()=>{this.nextElementSibling.click()})()">
                                    @else
                                        <input name="value" value="1" hidden>
                                        <input type="checkbox"  class="custom-control-input" id="custom2Switches{{ $key }}" onchange="(()=>{this.nextElementSibling.click()})()">
                                    @endif
                                    
                                    <button type="submit" style="display: none"></button>
                                    <label class="custom-control-label" for="custom2Switches{{ $key }}">{{ $post->highlight }}</label>
                                </form>
                            </div>
                        </td>
                        <td> <a href="{{ route('panel.edit_post', $post->id) }}"><button class="btn btn-sm btn-warning">Edit</button></a> </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
@endsection
