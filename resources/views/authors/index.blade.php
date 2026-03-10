@extends('layouts.app')

@section('title', 'Authors')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Authors</h1>
        <a href="{{ route('authors.create') }}" class="btn btn-primary">Add Author</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Books Count</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($authors as $author)
                <tr>
                    <td>{{ $author->name }}</td>
                    <td>{{ $author->email }}</td>
                    <td>{{ $author->books->count() }}</td>
                    <td>
                        <a href="{{ route('authors.edit', $author) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('authors.destroy', $author) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align: center;">No authors found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
