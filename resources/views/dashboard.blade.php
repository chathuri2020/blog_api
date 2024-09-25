@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Blog Dashboard</h1>

    <div class="row">
        <div class="col-md-8">
            <h2>Posts</h2>
            <ul class="list-group">
                @foreach($posts as $post)
                <li class="list-group-item">
                    <h4>{{ $post->title }}</h4>
                    <p>{{ $post->body }}</p>
                    <small>Author: {{ $post->user->name }}</small>

                    <div>
                        <h5>Comments:</h5>
                        <ul>
                            @foreach($post->comments as $comment)
                            <li>{{ $comment->body }} - {{ $comment->user->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>

        <div class="col-md-4">
            <h2>Create Post</h2>
            <form action="{{ url('api/posts') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" required>
                </div>
                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea class="form-control" name="body" required></textarea>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="status">
                        <option value="published">Published</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Create Post</button>
            </form>
        </div>
    </div>
</div>
@endsection
