@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="header-posts mb-5 d-flex justify-content-between align-items-center">
            <h1>Crea post</h1>
        </div>

        {{-- controllo --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.posts.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control" id="title" placeholder="Inserisci titolo" name="title">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Immagine</label>
                <input type="url" class="form-control" id="image" placeholder="Inserisci titolo" name="image">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Aggiungi descrizione</label>
                <textarea class="form-control" id="content" rows="5" name="content"></textarea>
            </div>
            <button type="submit" class="btn btn-secondary">Aggiungi</button>
        </form>
    </div>
@endsection
