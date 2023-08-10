@extends('components.main')

@section('content')
    <!-- Detail Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="mb-5">
                        <h1 class="section-title mb-3">{{ $post->name ?? null }}</h1>
                        <div class="d-flex mb-2">
                            <a class="text-secondary text-uppercase font-weight-medium" href="{{ route('posts.addFavourite', $post->id) }}"><i @if($post->findFavourite($post)) style="color: red" @endif class="fa fa-heart"></i></a>
                            <span class="text-primary px-2">|</span>
                            <a class="text-secondary text-uppercase font-weight-medium" href=""><i class="fa fa-eye">{{ $post->views }}</i></a>
                        </div>
                        <div class="d-flex mb-2">
                            @forelse($post->tags as $tag)
                                <a href="{{ route('tag.index', $tag->slug) }}" class="btn btn-outline-secondary m-1">{{ $tag->name }}</a>
                            @empty

                            @endforelse
                        </div>

                    </div>

                    <div class="mb-5">
                        <p>{{ $post->description }}</p>
                    </div>

                    <div class="mb-5">
                        <h3 class="mb-4 section-title">{{ isset($post->comments) ? $post->comments->count() : 0 }} Comments</h3>
                        @forelse($post->comments as $comment)
                            <div class="media mb-4">
                                <div class="media-body">
                                    <h6>{{ $comment->user->name }} <small><i>{{ $comment->created_at->format('Y-m-d H:i:s') }}</i></small></h6>
                                    <p>{{ $comment->content }}</p>
                                </div>
                            </div>
                        @empty
                            <p>No comment</p>
                        @endforelse
                    </div>
                    @if(\Illuminate\Support\Facades\Auth::user())
                    <div class="bg-light rounded p-5">
                        <h3 class="mb-4 section-title">Leave a comment</h3>
                        <form action="{{ route('comment.create') }}" method="POST">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <div class="form-group">
                                <label for="name">Title</label>
                                <input type="text" name="title" class="form-control" id="name">
                                <p style="color: red">{{ $errors->first('title') }}</p>
                            </div>
                            <div class="form-group">
                                <label for="message">Message *</label>
                                <textarea id="message" cols="30" rows="5" name="content" class="form-control"></textarea>
                                <p style="color: red">{{ $errors->first('content') }}</p>
                            </div>
                            <div class="form-group mb-0">
                                <input type="submit" value="Send Comment" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Detail End -->
    @endsection

