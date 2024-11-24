@extends('posts.layout')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-5  bg-primary text-white">All Blogs</h1>
    <div class="d-flex justify-content-between mb-4">
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Create New Blog</a>
    </div>

    <div class="row g-4">
        @foreach ($posts as $post)
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm h-100" style="border: 2px solid black;">
                    <img src="{{ asset('images/' . $post->image) }}" alt="Image" class="card-img-top" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->name }}</h5>
                        <p class="card-text text-muted">
                            <strong>Date:</strong> {{ $post->date }} <br>
                            <strong>Author:</strong> {{ $post->author }}<br>
                            <strong>Content:</strong>{{ $post->content }}
                        </p>
                        <!-- <p class="card-text">{{ Str::limit($post->content, 100, '...') }}</p> -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
