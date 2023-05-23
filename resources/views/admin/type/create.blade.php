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
        <form action="{{ route('admin.type.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">{{ __('Name') }}</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            </div>
            <button type="submit" class="btn btn-primary">{{ __('Add') }}</button>
        </form>
    </div>
@endsection
