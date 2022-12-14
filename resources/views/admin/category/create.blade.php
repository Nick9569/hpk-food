@extends('admin.layouts.main')
@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{route('admin.category.index')}}"><span>Категорії</span></a>
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
                        <form action="{{route('admin.category.store')}}" method="POST" class="w-25">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="title" placeholder="Назва категорії">
                                @error('title')
                                <div class="text-danger">
                                    Це поле необхідно заповнити
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
