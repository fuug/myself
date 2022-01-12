@extends('admin.layouts.main')

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Категории</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row pt-4">
                    <div class="col-lg-12 col-12">

                        <button type="button" class="btn btn-primary form-control" data-toggle="modal"
                                data-target="#modal-create-cat">
                            Создать категорию
                        </button>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Категории</h3>
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
                                        <th>Имя</th>
                                        <th>Email</th>
                                        <th class="col-2">Количество специалистов</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr class="text-center">
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>1</td>
                                            <td>
                                                <a href="{{ route('admin.user.show', $user->id) }}"><i class="fas fa-eye"></i></a>
                                                <a class="blue ml-2 pointer show-modal" data-category_id="{{ $user->id }}" data-toggle="modal" data-target="#modal-rename-cat"><i class="fas fa-pencil-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @error('title')
    @include('admin.includes.alert')
    @enderror

    <div class="modal fade" id="modal-create-cat" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Создать категорию</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.category.store') }}" method="POST" class="card-body">
                        @csrf
                        <label for="cat-name">Название категории</label>
                        <input id="cat-name" name="title" class="form-control form-control-lg" type="text"
                               placeholder="Название категории" required>
                        <div class="pt-4 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Создать</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-rename-cat" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Переименовать категорию</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.category.rename') }}" method="POST" class="card-body">
                        @csrf
                        @method('PATCH')
                        <input id="cat_id" name="cat_id" type="hidden" value="">
                        <label for="title">Новое название категории</label>
                        <input id="title" required name="title" class="form-control form-control-lg" type="text" placeholder="Новое название категории">
                        <div class="pt-4 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Переименовать</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/custom.css') }}">
@endsection

@section('scripts')
    <script src="{{ asset('dist/js/custom.js') }}"></script>
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection
