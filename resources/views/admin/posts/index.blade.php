@extends('layouts.app')

@section('content')
    <div class="container">
        <header>
            <h1>
                i miei post
            </h1>
        </header>
        <main>
            <table class="table border">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Creato il..</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                    <tr>
                      <th scope="row">{{ $post->id }}</th>
                      <td>{{ $post->title }}</td>
                      <td>{{ $post->slug }}</td>
                      <td>{{ $post->created_at }}</td>
                      <td><a class="btn btn-primary " href="{{ route('admin.posts.show', $post->id) }}">Vedi</a></td>
                    </tr>                      
                    @empty
                    <tr>
                        <td> <h2>non ci sono post</h2></td>
                    </tr>
                    @endforelse
                </tbody>
              </table>
        </main>
    </div>
@endsection