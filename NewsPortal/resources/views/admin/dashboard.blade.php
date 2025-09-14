@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Admin Dashboard</h2>
    <a href=" route('admin.category.create') }}" class="btn btn-primary mb-3">+ Add News</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th width="200">Actions</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach($news as $item) --}}
            <tr>
                {{-- <td>{{ $item->title }}</td>
                <td>{{ $item->content }}</td> --}}
                <td>
                    <a href=" route('admin.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action=" route('admin.delete', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"
                            onclick="return confirm('Delete this news?')">Delete</button>
                    </form>
                </td>
            </tr>
            {{-- @endforeach --}}
        </tbody>
    </table>
</div>
@endsection