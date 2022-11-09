@extends('admin.layouts.main')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('admin.user.index')}}"><span>Користувачі</span></a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{route('admin.user.show', $user->id)}}"><span>{{$user->name}}</span></a>
    </li>
    <li class="breadcrumb-item">
        <span>Редагувати</span>
    </li>
@endsection
@section('content')
    <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <form action="{{route('admin.user.update', $user->id)}}" method="POST" class="w-25">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Ім'я користувача"
                                value="{{$user->name}}">
                                @error('title')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="Email"
                                value="{{$user->email}}">
                                @error('email')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <input type="hidden" name="user_id" value="{{$user->id}}">
                            </div>
                            <div class="form-group">
                                <label>Виберіть роль</label>
                                <select name="role" class="form-control w-50">
                                    @foreach($roles as $id => $role)
                                        <option value="{{$id}}"
                                            {{$id == $user->role ? ' selected' : ''}}
                                        >{{$role}}</option>

                                    @endforeach
                                </select>
                                @error('role')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <input type="submit" class="btn btn-primary" value="Оновити">
                        </form>
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection
