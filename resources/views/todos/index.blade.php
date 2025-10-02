@extends('layouts.app')

@section('content')
    <h1>Your Todos</h1>
    <a href="{{ route('todos.create') }}">Create New Todo</a>

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Done</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($todos as $todo)
            <tr>
                <td>{{ $todo->title }}</td>
                <td>{{ $todo->description }}</td>
                <td>{{ $todo->is_done ? 'Yes' : 'No' }}</td>
                <td>
                    <a href="{{ route('todos.edit', $todo->id) }}">Edit</a>
                    <form method="POST" action="{{ route('todos.destroy', $todo->id) }}" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
