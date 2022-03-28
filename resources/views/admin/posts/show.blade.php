@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="header-content mb-5 d-flex justify-content-between align-items-center">
            <h1>Dettagli del post</h1>
            <a class="btn btn-primary" href="{{ route('admin.posts.index') }}">Torna ai posts</a>
        </div>
        <div class="border border-secondary clearfix">
            <div class="float-left">
                <img src="{{ $post->image }}" width="250px" alt="{{ $post->slug }}">
            </div>
            <div class="body-text float-left m-3">
                <h2>{{ $post->title }}</h2>
                <hr>
                <p>{{ $post->content }}</p>
                <span>{{ $post->created_at }}</span>
            </div>
        </div>
        <form class="m-2" action="{{ route('admin.posts.destroy', $post->id) }}"
            method="POST" id="delete-form" id="delete-form">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger " type="submit">Cancella</button>
        </form>
    </div>

@endsection

@section('script')
<script>
    const deleteForm = document.getElementById('delete-form');
    deleteForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const confirmation = confirm('Sei sicuro di eliminare il post?');
        if(confirmation) e.target.submit();
    });
</script>
@endsection