@extends('layouts.main')

@section('content')
    <div class="container">
        <h1 class="oleez-page-title wow fadeInUp" style="text-align: center">Список закладів</h1>

        @foreach($posts as $post)
            <div class="row" style="display: flex; justify-content: center">
                <div class="col-md-8">
                    <div class="blog-post-card wow fadeInUp">
                        <div class="blog-post-thumbnail-wrapper" style="height: 300px">
                            <a href="{{route('post.show', $post->id)}}" class="blog-post-permalink">
                                <img src="{{'storage/' . $post->preview_image}}" alt="hpk food">
                            </a>
                        </div>
                        <p>{{$post->description}}</p>
                        <div class="row" style="display: flex; justify-content: space-between">
                        <h5 class="blog-post-title">{{$post->title}} - {{$post->distance}}м</h5>
                        <h5 class="blog-post-title">{{$post->category->title}}</h5>
                        </div>
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
                </div>
            </div>
        @endforeach
        <div class="row">
            <div class="col-12 pb-5 mb-5">
                <nav class="oleez-pagination d-flex align-items-center justify-content-center wow fadeInUp">
                    {{$posts->links()}}
                </nav>
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
                        <h5 class="blog-post-title">{{$post->title}} </h5>

                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
