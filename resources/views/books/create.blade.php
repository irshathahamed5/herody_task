@extends('layouts.app')

@section('title', 'Add Book')

@section('content')
<div class="card" style="max-width: 600px; margin: 0 auto;">
    <div class="card-header">
        <h1>Add Book</h1>
        <a href="{{ route('books.index') }}" class="btn btn-sm btn-primary">Back</a>
    </div>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label class="form-label" for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
            @error('title') <span style="color:red; font-size:0.8rem;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="author_id">Author</label>
            <select name="author_id" id="author_id" class="form-control @error('author_id') is-invalid @enderror" required>
                <option value="">Select Author</option>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                @endforeach
            </select>
            @error('author_id') <span style="color:red; font-size:0.8rem;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="published_at">Published Date</label>
            <input type="date" name="published_at" id="published_at" class="form-control @error('published_at') is-invalid @enderror" value="{{ old('published_at') }}">
            @error('published_at') <span style="color:red; font-size:0.8rem;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="description">Description</label>
            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ old('description') }}</textarea>
            @error('description') <span style="color:red; font-size:0.8rem;">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary" style="width: 100%;">Create Book</button>
    </form>
</div>
@endsection
