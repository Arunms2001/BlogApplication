@extends('posts.layout')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4 text-primary">Create Post</h1>
    <div class="d-flex justify-content-between mb-4">
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to Dashboard</a>
    </div>

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="p-4 border rounded shadow-sm bg-light">
        @csrf
        
        <div class="mb-3">
            <label for="name" class="form-label fw-bold">Post Name</label>
            <input type="text" name="name" id="name" class="form-control" required placeholder="Enter post name" maxlength="225">
        </div>
        
        <div class="mb-3">
            <label for="date" class="form-label fw-bold">Date</label>
            <input type="date" name="date" id="date" class="form-control" required>
        </div>
        
        <div class="mb-3">
            <label for="author" class="form-label fw-bold">Author</label>
            <input type="text" name="author" id="author" class="form-control" required placeholder="Enter author name" maxlength="225">
        </div>
        
        <div class="mb-3">
            <label for="content" class="form-label fw-bold">Content</label>
            <textarea name="content" id="content" class="form-control" rows="5" placeholder="Write your content here..."></textarea>
        </div>
        
        <div class="mb-3">
            <label for="image" class="form-label fw-bold">Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-primary px-4">Create Post</button>
        </div>
    </form>
</div>


    <!-- CKEditor Script -->
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#content'))
            .catch(error => {
                console.error(error);
            });
    </script> -->
@endsection