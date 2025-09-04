@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-4">Welcome, {{ Auth::user()->name ?? 'Guest' }} 👋</h1>
            <p>This is your dashboard home page.</p>

            @auth
                <a href=" route('tasks.index') }}" class="btn btn-primary">View My Tasks</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-success">Login</a>
            @endauth
        </div>
    </div>
@endsection
