@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <h1>Create Post</h1>
                    <form action="{{ route('posts.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="body">Body</label>
                            <textarea name="body" id="body" class="form-control" required></textarea>
                        </div>
                        <div class="form-group mb-2">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="published">Published</option>
                                <option value="draft">Draft</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">Create Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
