@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center align-items-center gy-2">
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-body ">
                        <h5 class="card-title">Name: {{ $data->name }}</h5>
                        <p class="card-text">Slug: {{ $data->slug }}</p>
                        <a type="button" href="{{ route('admin.type.edit', $data->id) }}"
                            class="btn btn-warning w-100">{{ __('Edit') }}</a>
                    </div>
                </div>
            </div>
            @if (count($data->projects) > 0)
                <div class="col-12 col-md-8">
                    <div class="card">
                        <div class="card-body ">

                            <h5 class="card-title">Progetti correlati</h5>
                            <ul>
                                @foreach ($data->projects as $item)
                                    <li><a href="{{ route('admin.project.show', $item->slug) }}">{{ $item->title }}</a></li>
                                @endforeach
                            </ul>

                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
