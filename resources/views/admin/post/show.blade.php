@extends('admin.layouts.main')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('admin.post.index')}}"><span>Заклади харчування</span></a>
    </li>
    <li class="breadcrumb-item">
        <span>{{$post->title}}</span>
    </li>
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <tbody>
                                <tr>
                                    <td>ID</td>
                                    <td>{{$post->id}}</td>
                                </tr>
                                <tr>
                                    <td>Назва</td>
                                    <td>{{$post->title}}</td>
                                </tr>
                                <tr>
                                <td>Розташування</td>
                                <td>{{$post->location}}</td>
                                </tr>
                                <tr>
                                <td>Відстань</td>
                                <td>{{$post->distance}}</td>
                                </tr>

                                <tr>
                                    <td>Категорія</td>
                                    <td>{{$post->category->title}}</td>
                                </tr>
                                <tr>
                                    <td>Cтворено</td>
                                    <td>{{$post->created_at}}</td>
                                </tr>
                                @if($post->updated_at!=null)
                                    <tr>
                                        <td>Редаговано</td>
                                        <td>{{$post->updated_at}}</td>
                                    </tr>
                                @endif
                                <tr>
                                    <td>Прев'ю</td>
                                    <td>
                                        <img src="{{asset('storage/' . $post->preview_image)}}" alt="preview_image"
                                             style="width: 100px; height: 100px;"
                                    </td>
                                </tr>
                                <tr>
                                    <td>Головне зображення</td>
                                    <td>
                                        <img src="{{asset('storage/' . $post->main_image)}}" alt="preview_image"
                                             style="width: 100px; height: 100px;">
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
    </div>
@endsection
