@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Главная страница</h1>
                    </div>
                </div>
            </div>
        </div>


        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $customersCount }}</h3>
                                <p>Клиентов</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
{{--                            <a href="#" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>--}}
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-cyan">
                            <div class="inner">
                                <h3>{{ $performersCount }}</h3>
                                <p>Психологов</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user-tie"></i>
                            </div>
{{--                            <a href="#" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>--}}
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-indigo">
                            <div class="inner">
                                <h3>{{ $subscriptionsCount }}</h3>
                                <p>Абонементов</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
{{--                            <a href="#" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>--}}
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $doneSessionsCount }}</h3>
                                <p>Посещённых сеансов</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
{{--                            <a href="#" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>--}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <section class="col-lg-7 connectedSortable">
                    </section>
                    <section class="col-lg-5 connectedSortable">
                    </section>
                </div>
            </div>
        </section>
    </div>
@endsection
