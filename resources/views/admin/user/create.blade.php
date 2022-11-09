@extends('admin.layouts.main')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('admin.user.index')}}"><span>Користувачі</span></a>
    </li>
    <li class="breadcrumb-item">
        <span>Додати</span>
    </li>
@endsection
@section('content')
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <form action="{{route('admin.user.store')}}" method="POST" class="w-25">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Ім'я користувача">
                                @error('name')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="Email">
                                @error('email')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Виберіть роль</label>
                                <select name="role" class="form-control w-50">
                                    @foreach($roles as $id => $role)
                                        <option value="{{$id}}"
                                            {{$id==old('role') ? ' selected' : ''}}
                                        >{{$role}}</option>

                                    @endforeach
                                </select>
                                @error('role')
                                <div class="text-danger">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <input type="submit" class="btn btn-primary" value="Додати">
                        </form>
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>

@endsection
