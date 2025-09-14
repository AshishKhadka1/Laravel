@extends('layouts.app')

@section('content')
<div class="container news-container">
    {{-- Page Heading --}}
    <h2 class="mb-4 fw-bold text-primary d-flex align-items-center">
        <i class="bi bi-newspaper me-2"></i> Latest News
    </h2>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success shadow-sm d-flex align-items-center">
            <i class="bi bi-check-circle-fill me-2 fs-5"></i> 
            <span>{{ session('success') }}</span>
        </div>
    @endif

    {{-- News List --}}
    @if($news->count())
        <div class="row g-4">
            @foreach($news as $article)
                <div class="col-md-6 col-lg-4">
                    <div class="card news-card h-100 shadow-sm border-0 rounded-3">
                        {{-- News Image --}}
                        @if($article->image)
                            <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top news-img" alt="News Image">
                        @else
                            <img src="https://via.placeholder.com/600x300?text=News+Image" class="card-img-top news-img" alt="Default Image">
                        @endif

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-dark mb-2">
                                {{ Str::limit($article->title, 60) }}
                            </h5>
                            <p class="card-text text-muted flex-grow-1">
                                {{ Str::limit($article->content, 120) }}
                            </p>
                            <div class="mt-auto">
                                <a href=" route('news.show', $article->id) }}" class="btn btn-sm btn-primary rounded-pill shadow-sm">
                                    Read More <i class="bi bi-arrow-right-circle ms-1"></i>
                                </a>
                            </div>
                        </div>

                        <div class="card-footer bg-light small text-muted d-flex justify-content-between align-items-center">
                            <span><i class="bi bi-person-circle"></i> {{ $article->author->name ?? 'Unknown' }}</span>
                            <span><i class="bi bi-calendar"></i> {{ $article->created_at->format('d M Y') }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-4 d-flex justify-content-center">
            {{ $news->links() }}
        </div>
    @else
        <div class="alert alert-light border text-center rounded-3 shadow-sm py-5">
            <p class="mb-3 fs-5 fw-semibold">No news articles available </p>
            @auth
                <a href=" route('news.create') }}" class="btn btn-primary rounded-pill shadow-sm">
                    <i class="bi bi-plus-circle"></i> Add News
                </a>
            @endauth
        </div>
    @endif
</div>
@endsection
