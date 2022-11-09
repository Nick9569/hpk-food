@extends('admin.layouts.main')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('admin.user.index')}}"><span>Користувачі</span></a>
    </li>
    <li class="breadcrumb-item">
        <span>{{$user->name}}</span>
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
                                        <td>{{$user->id}}</td>
                                    </tr>
                                    <tr>
                                        <td>Ім'я</td>
                                        <td>{{$user->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>{{$user->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Реєстрація</td>
                                        <td>{{$user->created_at}}</td>
                                    </tr>
                                    <tr>
                                        <td>Роль</td>
                                        <td>
                                            @if($user->role==1)
                                                Користувач
                                            @else
                                                Адмін
                                            @endif
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
    </div><!-- /.container-fluid -->
    <!-- /.content -->
@endsection
