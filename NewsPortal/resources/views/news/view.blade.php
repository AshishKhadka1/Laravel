@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4 text-primary fw-bold">All News</h2>

    @if(session('success'))
        <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
    @endif

    <a href="{{ route('news.create') }}" class="btn btn-success mb-3 rounded-pill shadow-sm">
        <i class="bi bi-plus-circle"></i> Add News
    </a>

    @if($news->count())
        <div class="row">
            @foreach($news as $item)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        @if($item->image)
                            <img src="{{ asset('storage/'.$item->image) }}" class="card-img-top" alt="News Image">
                        @else
                            <img src="https://via.placeholder.com/400x200" class="card-img-top" alt="Placeholder">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($item->content, 100) }}</p>
                        </div>
                        <div class="card-footer bg-white">
                            <small class="text-muted">Published: {{ $item->created_at->format('d M Y') }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-3">
            {{ $news->links() }}
        </div>
    @else
        <div class="alert alert-light border text-center rounded shadow-sm py-4">
            <p class="mb-0 fs-5">No news found 🚀</p>
        </div>
    @endif
</div>
@endsection
