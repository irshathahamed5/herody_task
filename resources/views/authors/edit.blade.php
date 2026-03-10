@extends('layouts.app')

@section('title', 'Edit Author')

@section('content')
<div class="card" style="max-width: 600px; margin: 0 auto;">
    <div class="card-header">
        <h1>Edit Author</h1>
        <a href="{{ route('authors.index') }}" class="btn btn-sm btn-primary">Back</a>
    </div>

    <form action="{{ route('authors.update', $author) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label class="form-label" for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $author->name) }}" required>
            @error('name') <span style="color:red; font-size:0.8rem;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $author->email) }}" required>
            @error('email') <span style="color:red; font-size:0.8rem;">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="bio">Bio</label>
            <textarea name="bio" id="bio" class="form-control @error('bio') is-invalid @enderror" rows="4">{{ old('bio', $author->bio) }}</textarea>
            @error('bio') <span style="color:red; font-size:0.8rem;">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary" style="width: 100%;">Update Author</button>
    </form>
</div>
@endsection
