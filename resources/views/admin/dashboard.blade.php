@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif

        @if (session('delete'))
            <div class="alert alert-danger" role="alert">
                {{ session('delete') }}
            </div>
        @endif

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="row">
            <div class="col-12 col-md-4 mb-2">
                <div class="card">
                    <h5 class="card-header">{{ __('Recent Project') }}</h5>
                    @if (count($data) < 0)
                        <div class="card-body">
                            <h5 class="card-title">Ancora nessun progetto</h5>
                        </div>
                    @else
                        <div class="card-body">
                            <h5 class="card-title">{{ $data[0]->title }}</h5>
                            <h6 class="card-title">{{ $data[0]->slug }}</h5>
                                <p class="card-text">{{ $data[0]->description }}</p>
                                <span class="d-block mb-1 fw-bold">{{ __('Languages') }}:</span>
                                <span class="d-block mb-4">{{ $data[0]->language }}</span>
                                <a type="button" href="{{ route('admin.project.edit',$data[0]->id) }}" class="btn btn-warning w-100">{{ __('Edit') }}</a>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="card">
                    <h5 class="card-header">{{ __('Projects') }}</h5>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{ __('Title') }}</th>
                                    <th scope="col">{{ __('Date') }}</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('admin.project.show', $item->slug) }}"
                                                    class="btn btn-outline-primary btn-sm me-1">{{ __('Details') }}</a>
                                                    <button type="button"
                                                        class="btn btn-outline-danger btn-sm me-1 bottone-elimina" id="{{ $item->id }}">{{ __('Delete') }}</button>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="popup d-none justify-content-center align-items-center" id="popup{{ $item->id }}">
                                        <div class="message">
                                            <h5>Vuoi eliminare questo Project?</h5>
                                            <div class="d-flex justify-content-around mt-3">
                                                <form action="{{ route('admin.project.destroy', $item->id) }}" method="POST" id="form">
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
            </div>
        </div>


    </div>
    @vite('resources/js/delete.js')
@endsection
