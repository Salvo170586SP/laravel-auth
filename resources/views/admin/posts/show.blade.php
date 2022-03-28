@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="header-content mb-5 d-flex justify-content-between align-items-center">
            <h1>Dettagli del post</h1>
            <a class="btn btn-primary" href="{{ route('admin.posts.index') }}">Torna ai posts</a>
        </div>
        <div class="border border-secondary clearfix">
            <div class="float-left">
                <img src="{{ $post->image }}" width="350px" alt="{{ $post->slug }}">
            </div>
            <div class="body-text float-left m-3">
                <h2>{{ $post->title }}</h2>
                <hr>
                <p>{{ $post->content }}</p>
                <span>{{ $post->created_at }}</span>
            </div>
        </div>
    </div>
@endsection