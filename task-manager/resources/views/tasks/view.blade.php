@extends('layouts.app')

@section('content')
<style>
    .task-table {
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        background-color: #fff;
    }
    thead {
        background: linear-gradient(90deg, #0d6efd, #0dcaf0);
        color: #fff;
        font-size: 15px;
        letter-spacing: 0.5px;
    }
    tbody tr {
        transition: all 0.25s ease-in-out;
    }
    tbody tr:hover {
        background-color: #f1f9ff !important;
        transform: scale(1.01);
    }
    .btn-sm {
        padding: 5px 12px;
        font-size: 13px;
    }
    .badge {
        font-size: 0.85rem;
        padding: 6px 10px;
        border-radius: 8px;
    }
</style>

<div class="container">
    <h2 class="mb-4 fw-bold text-primary">
        <i class="bi bi-list-check"></i> My Tasks
    </h2>

    {{-- Add Task Button --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('tasks.create') }}" class="btn btn-primary px-4 rounded-pill shadow-sm">
            <i class="bi bi-plus-circle me-1"></i> Add New Task
        </a>
    </div>

    {{-- Task Table --}}
    @if($tasks->count())
        <div class="table-responsive">
            <table class="table table-hover align-middle task-table">
                <thead>
                    <tr>
                        <th> S.N.</th>
                        <th>📌 Title</th>
                        <th>📝 Description</th>
                        <th>⏳ Status</th>
                        <th>📅 Created At</th>
                        <th class="text-center">⚙️ Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="fw-semibold text-dark">{{ $task->title }}</td>
                            <td class="text-muted">{{ $task->description ?: 'No description' }}</td>
                            <td>
                                @if($task->status == 'pending')
                                    <span class="badge bg-warning text-dark">
                                        <i class="bi bi-hourglass-split me-1"></i> Pending
                                    </span>
                                @else
                                    <span class="badge bg-success">
                                        <i class="bi bi-check2-circle me-1"></i> Completed
                                    </span>
                                @endif
                            </td>
                            <td>{{ $task->created_at->format('d M Y') }}</td>
                            <td class="text-center">
                                <a href="{{route('tasks.edit', $task->id) }}" 
                                   class="btn btn-sm btn-outline-info rounded-pill me-2 shadow-sm">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('tasks.destroy', $task->id) }}" 
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                        class="btn btn-sm btn-outline-danger rounded-pill shadow-sm"
                                        onclick="return confirm('Are you sure you want to delete this task?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
                                {{-- Success Message --}}
                @if(session('success'))
                    <div class="alert alert-success shadow-sm rounded-pill px-4 py-2">
                        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                    </div>
                @endif
        </div>
    @else
        <div class="alert alert-light border text-center rounded-3 shadow-sm py-4">
            <p class="mb-2 fs-5">No tasks found 🚀</p>
            <a href="{{ route('tasks.create') }}" class="btn btn-primary rounded-pill shadow-sm">
                <i class="bi bi-plus-lg"></i> Add a new task
            </a>
        </div>
    @endif
</div>
@endsection
