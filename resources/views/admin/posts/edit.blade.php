@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="header-posts mb-5 d-flex justify-content-between align-items-center">
            <h1>Crea post</h1>
            <div class="d-flex">
                <a class="btn btn-primary mx-2" href="{{ route('admin.posts.show', $post->id) }}">Torna al post</a>
                <a class="btn btn-secondary" href="{{ route('admin.posts.index') }}">Torna alla lista</a>
            </div>
        </div>

        {{-- controllo --}}
        @if($errors->any()) 
        <div class="alert alert-danger">   
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach 
            </ul>
        </div>
        @endif

        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" value="{{ $post->title }}" class="form-control" id="title" placeholder="Inserisci titolo" name="title">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Immagine</label>
                <input type="url" value="{{ $post->image }}" class="form-control" id="image" placeholder="Inserisci titolo" name="image">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Aggiungi descrizione</label>
                <textarea class="form-control" id="content" rows="5" name="content">{{ $post->content }}</textarea>
            </div>
            <button type="submit" class="btn btn-secondary">Modifica</button>
        </form>
    </div>
@endsection