@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                    <h1>Posts</h1>
                    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-2">Create New Post</a>
                    <br>
                    @if (session('success'))
                        <div class="alert alert-success" id="success-message">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger" id="error-message">
                            {{ session('error') }}
                        </div>
                    @endif

                    <script>
                        $(document).ready(function() {
                            // Hide success message after 5 seconds
                            setTimeout(function() {
                                $('#success-message').fadeOut('slow');
                            }, 1000);

                            // Hide error message after 5 seconds
                            setTimeout(function() {
                                $('#error-message').fadeOut('slow');
                            }, 1000);
                        });
                    </script>

                    <table class="table table-striped mt-4">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Status</th>
                                <th>Comments</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->user->name }}</td>
                                    <td>{{ $post->status }}</td>
                                    <td>{{ $post->comments->count() }}</td>
                                    <td>
                                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
