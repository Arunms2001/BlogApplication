@extends('posts.layout')

@section('content')
    <div class="container mt-5">
    <h1 class="text-center mb-4 text-primary">Edit Post</h1>

    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data" class="p-4 border rounded shadow-sm bg-light">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="name" class="form-label fw-bold">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $post->name }}" required>
        </div>
        
        <div class="mb-3">
            <label for="author" class="form-label fw-bold">Author</label>
            <input type="text" name="author" id="author" class="form-control" value="{{ $post->author }}" required>
        </div>
        
        <div class="mb-3">
            <label for="content" class="form-label fw-bold">Content</label>
            <textarea name="content" id="content" class="form-control" rows="5" required>{{ $post->content }}</textarea>
        </div>
        
        <div class="mb-3">
            <label for="image" class="form-label fw-bold">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            @if ($post->image)
                <div class="mt-3">
                    <label class="d-block text-muted">Current Image:</label>
                    <img src="{{ asset('images/' . $post->image) }}" alt="Image" class="img-fluid rounded shadow" style="height: 200px; object-fit: cover;">
                </div>
            @endif
        </div>
        
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-primary px-4">Update Post</button>
        </div>
    </form>
</div>
@endsection
