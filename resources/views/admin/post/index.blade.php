@extends('admin.layouts.main')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <span>Заклади харчування</span>
    </li>
@endsection
@section('content')
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-1 mb-3">
                        <a href="{{route('admin.post.create')}}" class="btn btn-block btn-primary btn-sm">Додати</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Назва</th>
                                        <th colspan="3" class="text-center">Дія</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($posts as $post)
                                        <tr>
                                            <td>{{$post->id}}</td>
                                            <td>{{$post->title}}</td>
                                            <td class="text-center"><a href="{{route('admin.post.show', $post->id)}}"><i
                                                        class="far fa-eye"></i> </a></td>
                                            <td class="text-center"><a href="{{route('admin.post.edit', $post->id)}}"
                                                   class="text-success"><i class="fas fa-pencil-alt"></i> </a></td>
                                            <td class="text-center">
                                                <form action="{{route('admin.post.delete', $post->id)}}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="border-0 bg-transparent">
                                                        <i class="fas fa-trash text-danger" role="button" ></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!-- /.container-fluid -->
        </section>
    </div>
@endsection
