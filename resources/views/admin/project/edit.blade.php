@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        @if ($errors->any())
            <div class="alert alert-danger mb-4 mt-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.project.update',$data->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">{{ __('Title') }}</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title',$data->title) }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">{{ __('Description') }}</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ old('description',$data->description) }}</textarea>
            </div>
            <div class="mb-3">
                <label for="language" class="form-label">{{ __('Language') }}</label>
                <input type="text" class="form-control" id="language" name="language" value="{{ old('language',$data->language) }}">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input class="form-control" type="file" id="image" name="image">
            </div>

            <button type="submit" class="btn btn-primary">{{ __('Add') }}</button>
        </form>
    </div>
@endsection
