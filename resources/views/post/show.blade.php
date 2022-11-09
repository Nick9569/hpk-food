@extends('layouts.main')

@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up" style="display: flex; justify-content: center"> {{$post->title}}</h1>
            <p class="edica-blog-post-meta" style="display: flex; justify-content: center" data-aos="fade-up" data-aos-delay="200">
                • {{$date->translatedFormat('F')}} {{$date->day}}, {{$date->year}}, {{$date->format('H:i')}} •
                Коментарі: {{$post->comments->count()}}</p>
            <section class="blog-post-featured-img" data-aos="fade-up" style="display: flex; justify-content: center; margin-bottom: 20px"  data-aos-delay="300">
                <img src="{{asset('storage/' . $post->main_image)}}" alt="featured image"  style="height:400px; width: 600px;">

            </section>
            <section class="post-content">
                <div class="post-content wow fadeInUp">
                    <p>{!! $post->description !!}</p>
                    <p>
                        Адреса: {{$post->location}}
                    </p>
                    <p>
                        Відстань: {{$post->distance}} м.
                    </p>
                </div>
            </section>
            @auth()
                <section class="comment-section">
                    <h2 class="section-title mb-5" data-aos="fade-up">Залишити коментар</h2>
                    <form action="{{route('post.comment.store', $post->id)}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group col-12" data-aos="fade-up">
                                <label for="comment" class="sr-only">Comment</label>
                                <textarea name="message" id="comment" class="form-control"
                                          placeholder="Напишіть коментар" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12" data-aos="fade-up">
                                <input type="submit" value="Додати коментар" class="btn btn-warning">
                            </div>
                        </div>
                    </form>
                </section>
            @endauth
            <section class="comment-list"data-aos="fade-up">
                <h2 class="section-title mb-5" data-aos="fade-up">Коментарі({{$post->comments->count()}})</h2>
                @foreach($post->comments as $comment)
                    <div class="comment-text mb-3" >
                            <span class="username">
                                <div>
                                    {{$comment->user->name}}
                                </div>
                                <span class="text-muted float-right">{{$comment->DateAsCarbon->diffForHumans()}}</span>
                            </span><!-- /.username -->
                        {{$comment->message}}
                    </div>
                @endforeach
            </section>
        </div>
    </main>
@endsection
