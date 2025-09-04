<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Posts</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Blog Posts</h1>
        <a href="{{ route('blog.create') }}" class="btn btn-primary">Create New Post</a>
        <div class="mt-4">
            @if($posts->isEmpty())
                <p>No blog posts available.</p>
            @else
                <ul class="list-group">
                    @foreach($posts as $post)
                        <li class="list-group-item">
                            <h2><a href="{{ route('blog.show', $post->id) }}">{{ $post->title }}</a></h2>
                            <p>{{ Str::limit($post->content, 100) }}</p>
                            <a href="{{ route('blog.edit', $post->id) }}" class="btn btn-secondary">Edit</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</body>
</html>