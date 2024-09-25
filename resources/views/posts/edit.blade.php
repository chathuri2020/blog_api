@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Post</h1>

        <!-- Display success message if exists -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Edit post form -->
        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Post Title</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $post->title) }}" required>
            </div>

            <div class="form-group mb-2">
                <label for="body">Post Content</label>
                <textarea name="body" class="form-control" rows="5" required>{{ old('body', $post->body) }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Update Post</button>
        </form>

    </div>
@endsection
