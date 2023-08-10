@extends('components.main')
@section('content')




<div class="container-fluid py-5">
  <div class="container">
      <div class="row align-items-end mb-4">
          <div class="col-lg-6">

          </div>
          <div class="col-lg-6">

          </div>
      </div>
      <div class="row">
          @foreach( $posts as $post)
          <div class="col-lg-3 border px-2 mx-2 col-md-6  mb-5 justify-content-center">
              <div class="position-relative mb-4 mr-1">
                  <img class="img-fluid rounded w-100" src="/images/11.jpg" alt="">
                  <div class="blog-date">
                      <small class="text-white text-uppercase">{{$post->created_at->format('M')}}</small>
                  </div>
              </div>
              <a class="btn btn-sm  py-2" href="{{ route('posts.show', $post->slug)}}">
              <h5 class="font-weight-medium mb-2">{{ \Str::limit($post->name,10) }}</h5>
              <p class="mb-4">{{ \Str::limit($post->description, 100) }}</p>
              </a>
              <div class="d-flex justify-content-between mb-2">
                  <h5 class="text-secondary text-uppercase font-weight-medium" href=""><i class="fa fa-message">{{$post->comments->count()}}</i></h5>
                  <span class="text-primary px-1">|</span>
                  <a class="text-secondary text-uppercase font-weight-medium" href="{{ route('posts.addFavourite', $post->id) }}"><i @if($post->findFavourite($post)) style="color: red" @endif class="fa fa-heart"></i></a>
                  <span class="text-primary px-1">|</span> 
                  <h5 class="text-secondary text-uppercase font-weight-medium" href=""><i class="fa fa-eye">{{$post->views}}</i></h5>
              </div>
          </div>
          @endforeach
          <div class="col-12">
              <nav aria-label="Page navigation">
                  <ul class="pagination pagination-lg justify-content-center mb-0">
                     {{$posts->links()}}
                  </ul>
              </nav>
          </div>
      </div>
  </div>
</div>



@endsection
