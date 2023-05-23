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
        <form action="{{ route('admin.project.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">{{ __('Title') }}</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">{{ __('Description') }}</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="language" class="form-label">{{ __('Language') }}</label>
                <input type="text" class="form-control" id="language" name="language" value="{{ old('language') }}">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input class="form-control" type="file" id="image" name="image">
            </div>

            <div class="mb-3">
                <label for="type_id" class="form-label">{{ __('Type') }}</label>
                <select class="form-select" name="type_id" id="type_id">
                    <option value="">{{ __('Select type') }}</option>
                    @foreach ($type as $item)
                        <option value="{{ $item->id }}" {{ old('type_id') == $item->id ? 'selected' : '' }}>
                            {{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                @foreach ($technologies as $tech)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="technologies{{ $tech->id }}" value="{{ $tech->id }}"
                            name="technologies[]" {{ in_array($tech->id, old('technologies', [])) ? 'checked' : '' }}>
                        <label class="form-check-label" for="technologies{{ $tech->id }}">{{ $tech->name }}</label>
                    </div>
                @endforeach
            </div>

            <button type="submit" class="btn btn-primary">{{ __('Add') }}</button>
        </form>
    </div>
@endsection
