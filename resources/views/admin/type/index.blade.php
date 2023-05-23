@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        @if (session('delete'))
            <div class="alert alert-danger" role="alert">
                {{ session('delete') }}
            </div>
        @endif
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <div class="card">
            <h5 class="card-header">{{ __('Types') }}</h5>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ __('Name') }}</th>
                            <th scope="col">{{ __('Slug') }}</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->slug }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('admin.type.show',$item->id) }}"
                                            class="btn btn-outline-primary btn-sm me-1">{{ __('Details') }}</a>
                                            <button type="button"
                                                class="btn btn-outline-danger btn-sm me-1 bottone-elimina" id="{{ $item->id }}">{{ __('Delete') }}</button>
                                    </div>
                                </td>
                            </tr>
                            <div class="popup d-none justify-content-center align-items-center" id="popup{{ $item->id }}">
                                <div class="message">
                                    <h5>Vuoi eliminare {{ $item->name }}?</h5>
                                    <div class="d-flex justify-content-around mt-3">
                                        <form action="{{ route('admin.type.destroy',$item->id) }}" method="POST" id="form">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="SI" class="btn btn-danger">
                                        </form>
                                        <input type="button" value="NO" class="btn btn-primary chiudi" id="chiudi{{ $item->id }}">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <a href="{{ route('admin.type.create') }}"
            class="btn btn-primary btn mt-2">{{ __('Add new type') }}</a>
    </div>
    @vite('resources/js/delete.js')
@endsection
