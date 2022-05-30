@extends('layouts.app')

@section('title', 'Create')

@section('content')

    <h2 class="text-center">{{ __('Add') }} {{ __('Post') }}</h2>
    <div class="continer d-flex justify-content-center">

        <form action="{{ route('posts.store') }}" method="post" enctypr="multipart/form-data">
            @csrf
            <label for="title">{{ __('Title') }}:
                <input type="text" name="title" id="title" value="{{ old('title') }}" required>
            </label>
            @error('title')
                <br>
                <small>*{{ $message }}</small>
                <br>
            @enderror
            <br>
            <br>
            <label for="extract">{{ __('Extract') }}:
                <input type="text" name="extract" id="extract" value="{{ old('extract') }}" required>
            </label>
            @error('extract')
                <br>
                <small>*{{ $message }}</small>
                <br>
            @enderror
            <br>
            <br>
            <label for="content"> {{ __('Content') }}:
                <input type="text" name="content" id="content" value="{{ old('content') }}" required>
            </label>
            @error('content')
                <br>
                <small>*{{ $message }}</small>
                <br>
            @enderror
            <br>
            <br>
            <label for="expires">{{ __('Expires') }}:
                <input type="checkbox" name="expires" id="expires">
                <br>
            </label>
            <label for="comment">{{ __('Comment') }}:
                <input type="checkbox" name="comment" id="comment">
            </label>
            <br>

            <label>@lang('Access'):</label>

            <select id="access" name="access">
                <option value="public">Public</option>
                <option value="private">Private</option>
            </select>
            @error('access')
                <br>
                <small class="text-danger">*{{ $message }}</small>
                <br>
            @enderror
            <br>
            <input type="submit" value="Send">
        </form>
    </div>
@endsection
