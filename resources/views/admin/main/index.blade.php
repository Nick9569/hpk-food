@extends('admin.layouts.main')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row" style="display: flex; justify-content: center">
                <div class="col-lg-3 col-3">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$data['usersCount']}}</h3>
                            <p>Користувачі</p>
                        </div>

                        <a href="{{route('admin.user.index')}}" class="small-box-footer">Детальніше <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                    <!-- ./col -->
                    <div class="col-lg-3 col-3">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{$data['postsCount']}}<sup style="font-size: 20px"></sup></h3>

                                <p>Заклади харчування</p>
                            </div>

                            <a href="{{route('admin.post.index')}}" class="small-box-footer">Детальніше <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>


                    <!-- ./col -->
                    <div class="col-lg-3 col-3">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{$data['categoriesCount']}}</h3>

                                <p>Категорії</p>
                            </div>

                            <a href="{{route('admin.category.index')}}" class="small-box-footer">Детальніше <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>


            </div>
            <div class="row wow fadeIn">
                <div class="col-md-9 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="myChart">

                            </canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <script>
        var lbls = ['кавярня','кафе','ресторан','забігайлівка'];
        var numbers = [4];
        numbers[0]={{$arr_numbers['0']}};
        numbers[1]={{$arr_numbers['1']}};
        numbers[2]={{$arr_numbers['2']}};
        numbers[3]={{$arr_numbers['3']}};
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data:{
                labels: lbls,
                datasets: [{
                    label: 'Кількість постів для категорії',
                    data: numbers,
                    backgroundColor: [
                        'black',
                        'green',
                        'blue',
                        'yellow',
                    ],
                    borderColor: [
                        'black',
                        'black',
                        'black',
                        'black',
                    ],
                    borderWidth: 2
                }]
            },
            options:{
                scales:{
                    yAxes: [{
                        ticks:{
                            beginAtZero: true
                        }
                    }]
                }
            }
        } )
    </script>
@endsection


