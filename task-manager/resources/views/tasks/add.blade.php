@extends('layouts.app')

@section('content')
    <style>
        /* Card Styles */
        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        /* Gradient Header */
        .bg-gradient {
            background: linear-gradient(135deg, #4ade80, #22d3ee);
            padding: 20px 25px;
            font-weight: bold;
        }

        /* Validation Alerts */
        .alert-danger {
            background-color: #f8d7da;
            color: #842029;
            border-radius: 10px;
            padding: 15px;
            font-size: 0.95rem;
        }

        /* Input Fields */
        .form-control {
            border-radius: 50px;
            padding: 12px 20px;
            transition: all 0.3s ease;
            border: 1px solid #ced4da;
        }

        .form-control:focus {
            box-shadow: 0 4px 15px rgba(34, 211, 238, 0.3);
            border-color: #22d3ee;
        }

        /* Textarea */
        textarea.form-control {
            border-radius: 10px;
        }

        /* Dropdown */
        select.form-select {
            border-radius: 50px;
            padding: 12px 20px;
            transition: all 0.3s ease;
            border: 1px solid #ced4da;
        }

        select.form-select:focus {
            box-shadow: 0 4px 15px rgba(34, 211, 238, 0.3);
            border-color: #22d3ee;
        }

        /* Buttons */
        .btn-success,
        .btn-secondary {
            border-radius: 50px;
            padding: 10px 25px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .btn-success:hover {
            background-color: #16a34a;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(22, 163, 74, 0.3);
        }

        .btn-secondary:hover {
            background-color: #6c757d;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(108, 117, 125, 0.3);
        }

        /* Labels */
        .form-label {
            font-weight: 600;
            color: #343a40;
        }

        /* Card Body */
        .card-body {
            background-color: #f8f9fa;
            padding: 30px;
        }

        /* Container spacing */
        .container {
            max-width: 700px;
        }
    </style>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-header bg-gradient text-white rounded-top-4">
                        <h3 class="mb-0">Add New Task</h3>
                    </div>
                    <div class="card-body p-4">

                        {{-- Validation Errors --}}
                        @if ($errors->any())
                            <div class="alert alert-danger rounded-3">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(isset($task))

                        {{-- Task Form --}}
                            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                        @else
                            <form action="{{ route('tasks.store') }}" method="POST">
                            @csrf
                        @endif
                            <div class="mb-4">
                                <label for="title" class="form-label fw-bold">Task Title</label>
                                <input type="text" class="form-control rounded-pill shadow-sm" id="title" name="title" value="{{ old('title', $task->title ?? '') }}"
                                    placeholder="Enter task title" required>
                            </div>

                            <div class="mb-4">
                                <label for="description" class="form-label fw-bold">Task Description</label>
                                <textarea class="form-control rounded-3 shadow-sm" id="description" name="description" rows="5" placeholder="Enter task description">{{ old('description', $task->description ?? '') }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label for="status" class="form-label fw-bold">Status</label>
                                <select class="form-select shadow-sm" id="status" name="status">
                                    <option value="pending" {{ old('status', $task->status ?? '') == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="completed" {{ old('status', $task->status ?? '') == 'completed' ? 'selected' : '' }}>Completed</option>
                                </select>
                            </div>


                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-success btn-lg shadow-sm">
                                    <i class="bi bi-plus-circle me-2"></i> @if (isset($task)) Update Task @else Add Task @endif
                                </button>
                                <a href="{{ route('home') }}" class="btn btn-secondary btn-lg shadow-sm">
                                    <i class="bi bi-arrow-left me-2"></i> Back to Home
                                </a>
                            </div>
                        </form>

                    </div>
                </div>
                    {{-- Success Message --}}
                @if(session('success'))
                    <div class="alert alert-success shadow-sm rounded-pill px-4 py-2">
                        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection