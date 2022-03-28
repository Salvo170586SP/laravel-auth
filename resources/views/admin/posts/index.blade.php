@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="header-posts mb-5 d-flex justify-content-between align-items-center">
            <h1>I miei post</h1>
            <a class="btn btn-secondary" href="{{ route('admin.posts.create') }}">Aggiungi un post</a>
        </div>

        {{-- messaggi di avviso --}}
        @if (session('message'))
            <div class="alert alert-primary">
                {{ session('message') }}
            </div>
        @endif

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
                            <td class="d-flex">
                                <a class="btn btn-sm btn-primary"
                                    href="{{ route('admin.posts.show', $post->id) }}">Vedi</a>
                                <form class="mx-2" action="{{ route('admin.posts.destroy', $post->id) }}"
                                    method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-sm btn-danger " type="submit">Cancella</button>
                                </form>
                                <a class="btn btn-sm btn-secondary"
                                    href="{{ route('admin.posts.edit', $post->id) }}">Modifica</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>
                                <h2>non ci sono post</h2>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- numeri pagine --}}
            @if ($posts->hasPages())
                {{ $posts->links() }}
            @endif
        </main>
    </div>
@endsection
