@extends('admin.layouts.main')

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $category->title }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Специалисты</h3>
                                {{--                                <div class="card-tools">--}}
                                {{--                                    <div class="input-group input-group-sm" style="width: 150px;">--}}
                                {{--                                        <input type="text" name="table_search" class="form-control float-right"--}}
                                {{--                                               placeholder="Search">--}}

                                {{--                                        <div class="input-group-append">--}}
                                {{--                                            <button type="submit" class="btn btn-default">--}}
                                {{--                                                <i class="fas fa-search"></i>--}}
                                {{--                                            </button>--}}
                                {{--                                        </div>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                    <tr class="text-center col-form-label-lg">
                                        <th class="col-1">ID</th>
                                        <th>Название</th>
                                        <th class="col-2">Количество специалистов</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
{{--                                    @foreach($categories as $category)--}}
{{--                                        <tr class="text-center">--}}
{{--                                            <td>{{ $category->id }}</td>--}}
{{--                                            <td>{{ $category->title }}</td>--}}
{{--                                            <td>1</td>--}}
{{--                                            <td>--}}
{{--                                                <a href=""><i class="fas fa-eye"></i></a>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                    @endforeach--}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
