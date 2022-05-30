@extends('layouts.app')
@section('title','Edit')

@section('content')
<h2 class="text-center">{{__('Edit')}} {{__('Post')}}</h2>
<div class="continer d-flex justify-content-center">
    <form class="form border border-secondary text-start bg-light m-2 w-75"
        action="{{route('posts.update', ['post' => $post ?? ''])}}" method="post"
        enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div>
            @foreach ($errors->all() as $error)
            <ul>
                <li class="text-danger">
                    {{ $error }}
                </li>
            </ul>
            <br />
            @endforeach
            <div>

                <div class="form-group m-2">
                    <label>@lang('Title')<br> <input class="form-control" type="text" name="title"
                            value="{{ old('title'), $post ?? ''->title}}" required></label>
                    @error('title')
                    <br>
                    <small class="text-danger">*{{$message}}</small>
                    <br>
                    @enderror
                </div>

                <div class="form-group m-2">
                    <label>@lang('Extract')<br> <input class="form-control" type="text" name="extract"
                            value="{{ old('extract'), $post ?? ''->extract}}" required></label>
                    @error('extract')
                    <br>
                    <small class="text-danger">*{{$message}}</small>
                    <br>
                    @enderror
                </div>

                <div class="form-group m-2">
                    <label>@lang('Content')<br> <input class="form-control" type="text" name="content"
                            value="{{ old('content'), $post ?? ''->content}}" required></label>
                    @error('content')
                    <br>
                    <small class="text-danger">*{{$message}}</small>
                    <br>
                    @enderror
                </div>


                <div class="form-group m-2">
                    <label>@lang('Expires'):</label>

                    <input type="checkbox" name="expires" {{ old('expires')==='true' ? 'checked=' .'"checked"' : ''
                        }}>

                    @error('expires')
                    <br>
                    <small class="text-danger">*{{$message}}</small>
                    <br>
                    @enderror
                </div>

                <div class="form-group m-2">
                    <label>@lang('Comment'):</label>

                    <input type="checkbox" name="comment" {{ old('comment')==='true' ? 'checked=' .'"checked"'
                        : '' }}>

                    @error('comment')
                    <br>
                    <small class="text-danger">*{{$message}}</small>
                    <br>
                    @enderror
                </div>

                <div class="form-group m-2">
                    <label>@lang('Access'):</label>

                    <select id="access" name="access">
                        <option value="public">Public</option>
                        <option value="private">Private</option>
                    </select>

                    @error('access')
                    <br>
                    <small class="text-danger">*{{$message}}</small>
                    <br>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success p-1 m-2">@lang('Edit')</button>
                <button class="btn btn-danger p-1 mb-2"><a class="text-white" href="{{route('posts.show', ['locale' => app()->getLocale(), 'post' => $post ?? ''->id])}}">Delete post</a></button>
    </form>
</div>
@endsection