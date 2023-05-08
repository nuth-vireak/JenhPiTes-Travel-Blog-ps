@extends('layouts.app')

@section('title', "$post->meta_title")
@section('meta_description', "$post->meta_description")
@section('meta_keywords', "$post->meta_keywords")

@section('content')

    <div class="container-fluid">
        <div class="py-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">

                        <div class="category-heading">
                            <h4 class="mb-0"> {!! $post->name !!}</h4>
                        </div>

                        <div class="card mt-4">
                            <div class="card-body">
                                {!! $post->description !!}
                            </div>
                        </div>

                        <div class="comment-area mt-4">

                            @if (session('message'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>{{ session('message') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                </div>
                            @endif

                            <div class="card card-body">
                                <h6 class="card-title">Leave a comment</h6>
                                <form action="{{ url('comments') }}" method="POST">
                                    @csrf
                                    <input type="text" value="{{ $post->slug }}" name="post_slug" hidden>
                                    <textarea name="comment_body" class="form-control" rows="3" required></textarea>
                                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                                </form>
                            </div>

                            @forelse($post->comments as $comment)
                                <div class="card card-body shadow-sm mt-3">
                                    <div class="detail-area">
                                        <h6 class="user-name mb-1">
                                            @if ($comment->user)
                                                {{ $comment->user->name }}
                                            @endif
                                            <small class="ms-3 text-primary">{!! $comment->created_at->diffForHumans() !!}</small>
                                        </h6>
                                        <p class="user-comment mb-1">
                                            {!!  $comment->comment_body !!}
                                        </p>
                                    </div>

                                    @if(auth()->check() && auth()->user()->id == $comment->user_id)
                                        <div>
                                            <a href="" class="btn btn-sm btn-primary me-2">Edit</a>
                                            <a href="" class="btn btn-sm btn-danger">Delete</a>
                                        </div>
                                    @endif

                                </div>
                        </div>

                        @empty
                            <h6>No comments found!</h6>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
