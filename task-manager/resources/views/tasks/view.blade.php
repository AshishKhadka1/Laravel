@extends('layouts.app')

@section('content')
<style>
    /* Container */
    .task-container {
        width: 100%;
        background: #fff;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.05);
        transition: all 0.3s ease-in-out;
    }

    .task-container:hover {
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    }

    /* Table */
    .task-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 14px;
    }

    thead {
        background: linear-gradient(90deg, #0d6efd, #6610f2);
        color: #fff;
    }

    thead th {
        font-weight: 600;
        font-size: 14px;
        padding: 15px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        border: none;
    }

    tbody tr {
        transition: all 0.2s ease-in-out;
        cursor: pointer;
    }

    tbody tr:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(0,0,0,0.05);
        border-radius: 10px;
        background-color: #f8f9fa33;
    }

    /* Buttons */
    .btn-sm {
        padding: 6px 14px;
        font-size: 13px;
        border-radius: 25px;
        transition: all 0.2s ease-in-out;
    }

    .btn-sm:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .btn-add {
        background: #0d6efd;
        color: #fff;
        font-weight: 500;
        border: none;
        transition: all 0.2s ease-in-out;
    }

    .btn-add:hover {
        background: #6610f2;
        color: #fff;
        transform: translateY(-2px);
    }

    /* Badges */
    .badge {
        font-size: 0.85rem;
        padding: 6px 12px;
        border-radius: 12px;
        font-weight: 500;
    }

    .badge.pending {
        background-color: #ffc107;
        color: #212529;
    }

    .badge.completed {
        background-color: #28a745;
        color: #fff;
    }

    /* Alerts */
    .alert-success {
        font-weight: 500;
        background: #e6ffed;
        color: #0f5132;
        border-radius: 30px;
        border: 1px solid #b6e7c9;
        padding: 12px 20px;
        margin-top: 15px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .task-table thead {
            display: none;
        }
        .task-table, .task-table tbody, .task-table tr, .task-table td {
            display: block;
            width: 100%;
        }
        .task-table tr {
            margin-bottom: 15px;
            border-radius: 12px;
            padding: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            background: #fff;
        }
        .task-table td {
            text-align: right;
            padding: 8px 0;
            position: relative;
        }
        .task-table td::before {
            content: attr(data-label);
            position: absolute;
            left: 0;
            font-weight: 600;
            text-transform: capitalize;
            color: #495057;
        }
    }
</style>

<div class="container-fluid">
    <div class="task-container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-primary">📋 My Tasks</h3>
            <a href="{{ route('tasks.create') }}" class="btn btn-add btn-sm shadow-sm">+ Add New Task</a>
        </div>

        {{-- Task Table --}}
        @if($tasks->count())
            <div class="table-responsive">
                <table class="table task-table">
                    <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td data-label="S.N.">{{ $loop->iteration }}</td>
                                <td data-label="Title">{{ $task->title }}</td>
                                <td data-label="Description">{{ $task->description ?: 'No description' }}</td>
                                <td data-label="Status">
                                    @if($task->status == 'pending')
                                        <span class="badge pending">⏳ Pending</span>
                                    @else
                                        <span class="badge completed">✅ Completed</span>
                                    @endif
                                </td>
                                <td data-label="Created At">{{ $task->created_at->format('d M Y') }}</td>
                                <td data-label="Actions" class="text-center">
                                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-outline-primary me-2">✏️ Edit</a>
                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">🗑 Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Success Message --}}
            @if(session('success'))
                <div class="alert alert-success">
                    ✅ {{ session('success') }}
                </div>
            @endif

        @else
            <div class="alert alert-light border text-center py-4">
                <p class="mb-2 fs-5">No tasks found 🎉</p>
                <a href="{{ route('tasks.create') }}" class="btn btn-success btn-sm">+ Add a new task</a>
            </div>
        @endif
    </div>
</div>
@endsection
