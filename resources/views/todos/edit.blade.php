@extends('layouts.app')

@section('content')
    <h1>Edit Todo</h1>
    <form method="POST" action="{{ route('todos.update', $todo->id) }}">
        @csrf
        @method('PUT')

        <div>
            <label>Title:</label>
            <input type="text" name="title" value="{{ old('title', $todo->title) }}">
            @error('title') <div>{{ $message }}</div> @enderror
        </div>

        <div>
            <label>Description:</label>
            <textarea name="description">{{ old('description', $todo->description) }}</textarea>
            @error('description') <div>{{ $message }}</div> @enderror
        </div>

        <div>
            <label>Done:</label>
            <input type="checkbox" name="is_done" value="1" {{ $todo->is_done ? 'checked' : '' }}>
        </div>

        <button type="submit">Update</button>
    </form>
@endsection
