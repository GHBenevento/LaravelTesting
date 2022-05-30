@extends('layouts.app')

@section('title', 'Create')

@section('content')

    <h2 class="text-center">{{ __('Add') }} {{ __('Post') }}</h2>
    <div class="continer d-flex justify-content-center">

        <form action="{{ route('posts.store') }}" method="post" enctypr="multipart/form-data" class="row col-8 g-4">
            @csrf
            <div class="col-7">
                <label class="form-label" for="title">{{ __('Title') }}:
                    <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" required>
                </label>
            </div>
            @error('title')
                <br>
                <small>*{{ $message }}</small>
                <br>
            @enderror
            <br>
            <br>
            <div class="col-7">
                <label class="form-label" for="extract">{{ __('Extract') }}:
                    <input type="text" class="form-control" name="extract" id="extract" value="{{ old('extract') }}"
                        required>
                </label>
            </div>
            @error('extract')
                <br>
                <small>*{{ $message }}</small>
                <br>
            @enderror
            <br>
            <br>
            <div class="col-7">
                <label class="form-label" for="content"> {{ __('Content') }}:
                    <input type="text" class="form-control" name="content" id="content" value="{{ old('content') }}"
                        required>
                </label>

            </div>
            @error('content')
                <br>
                <small>*{{ $message }}</small>
                <br>
            @enderror
            <br>
            <br>

            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="expires" id="expires">
                    <label class="form-check-label" for="expires">{{ __('Expires') }}
                    </label>
                </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="comment" id="comment">
                <label class="form-check-label" for="comment">{{ __('Comment') }}
                </label>
            </div>
        </div>


            <div class="col-md-2">
                <label class="form-label">@lang('Access'):</label>

                <select class="form-select" id="access" name="access">
                    <option value="public">Public</option>
                    <option value="private">Private</option>
                </select>
            </div>
            @error('access')
                <br>
                <small class="text-danger">*{{ $message }}</small>
                <br>
            @enderror
            <br>
            <input type="submit" value="Send" class="btn btn-primary">
        </form>

    </div>


    
@endsection
