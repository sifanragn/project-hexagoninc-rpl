@extends('layouts.app')

@section('content')
    <h1>Create Todo</h1>
    <form method="POST" action="{{ route('todos.store') }}">
        @csrf
        <div>
            <label>Title:</label>
            <input type="text" name="title" value="{{ old('title') }}">
            @error('title') <div>{{ $message }}</div> @enderror
        </div>
        <div>
            <label>Description:</label>
            <textarea name="description">{{ old('description') }}</textarea>
            @error('description') <div>{{ $message }}</div> @enderror
        </div>
        <button type="submit">Save</button>
    </form>
@endsection
