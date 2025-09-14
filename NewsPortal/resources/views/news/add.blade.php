@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4 text-primary fw-bold">Add News</h2>

    @if ($errors->any())
        <div class="alert alert-danger shadow-sm">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action=" route('news.store') }}" method="POST" enctype="multipart/form-data" class="shadow-sm p-4 bg-white rounded">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label fw-bold">Title</label>
            <input type="text" name="title" id="title" class="form-control shadow-sm" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label fw-bold">Content</label>
            <textarea name="content" id="content" rows="5" class="form-control shadow-sm" required></textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label fw-bold">Upload Image</label>
            <input type="file" name="image" id="image" class="form-control shadow-sm">
        </div>

        <button type="submit" class="btn btn-primary rounded-pill shadow-sm px-4">Add News</button>
    </form>
</div>
@endsection
