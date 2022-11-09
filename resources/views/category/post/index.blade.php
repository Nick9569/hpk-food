@extends('layouts.main')

@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" style="display: flex; justify-content: center" data-aos="fade-up">{{$name}}</h1>
            <section class="featured-posts-section">
                @foreach($posts as $post)
                    <div class="row" style="display: flex; justify-content: center;">
                        <div class="col-md-8"  data-aos="fade-up">
                            <div class="blog-post-card wow fadeInUp">
                            <div class="blog-post-thumbnail-wrapper" style="height: 300px">
                                <a href="{{route('post.show', $post->id)}}" class="blog-post-permalink">
                                    <img src="{{asset('storage/' . $post->preview_image)}}" alt="blog post">
                                </a>
                            </div>
                            <div class="d-flex justify-content-between">
                                @auth()
                                    <form action="{{route('post.like.store', $post->id)}}" method="post">
                                        @csrf
                                        <span>{{$post->liked_users_count}}</span>
                                        <button type="submit" class="border-0 bg-transparent">

                                            @if(auth()->user()->likedPosts->contains($post->id))
                                                <i class="fas fa-thumbs-up"></i>
                                            @else
                                                <i class="far fa-thumbs-up"></i>
                                            @endif

                                        </button>
                                    </form>
                                @endauth
                                @guest()
                                    <div>
                                        <span>{{$post->liked_users_count}}</span>
                                        <i class="far fa-thumbs-up"></i>
                                    </div>
                                @endguest
                            </div>
                            <h6 class="blog-post-title">{{$post->title}} - {{$post->distance}}м</h6>
                        </div>
                        </div>

                    </div>@endforeach
                <div class="row">
                    <div class="mx-auto" style="margin-top: -100px;">
                        {{$posts->links()}}
                    </div>
                </div>
                    <div class="row">
                        <h1>Найбільш популярні</h1>
                    </div>
                    <div class="row">

                        @foreach($likedPosts as $post)
                            <div class="col-md-3">
                                <div class="blog-post-card wow fadeInUp">
                                    <div class="blog-post-thumbnail-wrapper">
                                        <a href="{{route('post.show', $post->id)}}" class="blog-post-permalink">
                                            <img src="{{asset('storage/' . $post->main_image)}}" alt="blog">
                                        </a>
                                    </div>
                                    <h5 class="blog-post-title">{{$post->title}}</h5>

                                </div>
                            </div>
                        @endforeach

                    </div>
            </section>

        </div>

    </main>
@endsection
