@extends('admin.layouts.main')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('admin.post.index')}}"><span>Пости</span></a>
    </li>
    <li class="breadcrumb-item">
        <span>Додати</span>
    </li>
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <form action="{{route('admin.post.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control w-25" name="title" placeholder="Назва посту"
                                   value="{{old('title')}}">
                            @error('title')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control w-25" name="location" placeholder="Розташування"
                                   value="{{old('location')}}">
                            @error('location')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control w-25" name="distance" placeholder="Відстань"
                                   value="{{old('distance')}}">
                            @error('distance')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                                <textarea id="summernote" name="description">
                                    {{old('description')}}
                                </textarea>
                            @error('description')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group w-50">
                            <label for="exampleInputFile">Додати прев'ю</label>
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
                                        {{$category->id==old('category_id') ? ' selected' : ''}}
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
                            <input type="submit" class="btn btn-primary" value="Додати">
                        </div>
                    </form>
                </div>
                <!-- /.row -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
