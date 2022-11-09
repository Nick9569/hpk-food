@extends('admin.layouts.main')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('admin.post.index')}}"><span>Заклади харчування</span></a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{route('admin.post.show', $post->id)}}"><span>{{$post->title}}</span></a>
    </li>
    <li class="breadcrumb-item">
        <span>Редагувати</span>
    </li>
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <form action="{{route('admin.post.update', $post->id)}}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <input type="text" class="form-control w-25" name="title" placeholder="Назва закладу"
                                   value="{{$post->title}}">
                            @error('title')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control w-25" name="location" placeholder="Розташування"
                                   value="{{$post->location}}">
                            @error('location')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control w-25" name="distance" placeholder="Відстань"
                                   value="{{$post->distance}}">
                            @error('distance')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                                <textarea style="width: 500px; height: 200px" name="description">
                                    {{$post->description}}
                                </textarea>
                            @error('description')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group w-50">
                            <label for="exampleInputFile">Додати прев'ю</label>
                            <div class="w-50 mb-3">
                                <img src="{{asset('storage/' . $post->preview_image)}}" alt="preview_image"
                                     class="w-50">
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="preview_image">
                                    <label class="custom-file-label">Виберіть зображення</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Завантаження</span>
                                </div>
                            </div>
                            @error('preview_image')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group w-50">
                            <label for="exampleInputFile">Додати зображення</label>
                            <div class="w-50 mb-3">
                                <img src="{{asset('storage/' . $post->main_image)}}" alt="main_image" class="w-50">
                            </div>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="main_image">
                                    <label class="custom-file-label">Виберіть зображення</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Завантаження</span>
                                </div>
                            </div>
                            @error('main_image')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Виберіть категорію</label>
                            <select name="category_id" class="form-control w-50">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}"
                                        {{$category->id==$post->category_id ? ' selected' : ''}}
                                    >{{$category->title}}</option>

                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="редагувати">
                        </div>

                    </form>
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

@endsection
