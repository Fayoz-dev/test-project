  
  @extends('components.main')

  @section('content')

    <!-- Detail Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mt-5 mt-lg-0">
                    <div class="mb-5">
                        <h3 class="mb-4 section-title">Tag Cloud</h3>
                        <div class="d-flex flex-wrap m-n1">
                            @forelse($tags as $tag)
                                <a href="{{ route('tag.index', $tag->slug) }}" class="btn btn-outline-secondary m-1">{{ $tag->name }}</a>
                            @empty

                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    @foreach( $posts as $post)
                        <div class="mb-5  border">
                            <img class="img-fluid rounded w-100 mb-4" src="/images/11.jpg" alt="Image">
                            <div class="p-4">
                                <a class="text-decoration-none text-dark" href="{{ route('posts.show', $post->slug)}}">
                                    <h3 >{{$post->name}}</h3>
                                    <p>{{$post->description}}</p>
                                </a>
                                <div class="d-flex justify-content-between mb-2">
                                    <h5 class="text-secondary text-uppercase font-weight-medium"><i class="fa fa-eye">{{ '  '.$post->views }}</i></h5>
                                    <span class="text-primary px-2">|</span>
                                    <h5 class="text-secondary text-uppercase font-weight-medium" href=""><i class="fa fa-message">{{$post->comments->count()}}</i></h5>
                  
                                    <span class="text-primary px-2">|</span>
                                    <a class="text-secondary text-uppercase font-weight-medium" href="{{ route('posts.addFavourite', $post->id) }}"><i @if($post->findFavourite($post)) style="color: red" @endif class="fa fa-heart"></i></a>
                                    </div>
                            </div>

                        </div>
                    @endforeach
                </div>
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
    <!-- Detail End -->
    @endsection
