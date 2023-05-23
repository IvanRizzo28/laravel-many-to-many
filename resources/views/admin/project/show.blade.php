@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-8">
                <div class="card">
                    <div class="card-body ">
                        @if ($data->image)
                            <div class="w-50 mb-2">
                                <img src="{{ asset('storage/' . $data->image) }}" alt="{{ $data->title }}" class="w-100"
                                    style="">
                            </div>
                        @endif


                        <h5 class="card-title">{{ $data->title }}</h5>
                        <p class="card-text">{{ $data->description }}</p>
                        <span class="d-block mb-1 fw-bold">{{ __('Languages') }}:</span>
                        <span class="d-block mb-4">{{ $data->language }}</span>
                        <span class="d-block mb-1 fw-bold">{{ __('Type') }}:</span>
                        @if ($data->type)
                            <span class="d-block mb-4">{{ $data->type->name }}</span>
                        @else
                            <span class="d-block mb-4">Nessun tipo</span>
                        @endif
                        @if (count($data->technologies)>0)
                            <span class="d-block mb-1 fw-bold">{{ __('Technologies') }}:</span>
                            @foreach ($data->technologies as $item)
                                <span class="d-block mb-1">{{ $item->name }}</span>
                            @endforeach
                        @endif

                        <a type="button" href="{{ route('admin.project.edit', $data->id) }}"
                            class="btn btn-warning w-100">{{ __('Edit') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
