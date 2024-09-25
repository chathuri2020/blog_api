@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>


                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>Posts</h2>

                                <!-- Display all posts with pagination -->
                                <div class="row">

                                    <div class="container py-5 h-100">
                                        <div class="row d-flex align-items-center h-100">
                                            @foreach ($posts as $post)
                                                <div class="col col-lg-6">
                                                    <figure class="bg-white p-3 rounded"
                                                        style="border-left: .25rem solid #f68e9d;">
                                                        <h6 class=" pb-2">{{ $post->title }}</h3>
                                                            <blockquote class="blockquote pb-2">
                                                                <p>
                                                                    {{ Str::limit($post->body, 150) }}
                                                                </p>
                                                            </blockquote>
                                                            <figcaption class="blockquote-footer mb-0 font-italic">
                                                                {{ $post->user->name }}
                                                            </figcaption>

                                                            <!-- Comment Form -->
                                                            <form action="{{ route('comments.store', $post->id) }}"
                                                                method="POST" class="d-flex align-items-center">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <textarea name="body" class="form-control" required></textarea>

                                                                </div>
                                                                <button type="submit"
                                                                class="btn btn-primary btn-sm mt-2 pr-1">comment</button>
                                                            </form>

                                                            <!-- Display Comments -->
                                                            <h5>Comments:</h5>
                                                            @foreach ($post->comments as $comment)
                                                                <div class="comment bg-light p-2 mb-2 rounded">
                                                                    <strong class="small">{{ $comment->user_id }}</strong>
                                                                    <p class="small">{{ $comment->body }}</p>
                                                                </div>
                                                            @endforeach

                                                    </figure>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>

                                </div>

                                <!-- Pagination links -->
                                <div class="d-flex justify-content-center mt-4">
                                    {{ $posts->links() }}
                                </div>
                            </div>

                            <!-- Sidebar for post actions can go here -->

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
