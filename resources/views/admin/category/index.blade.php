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
                                        <th>Название</th>
                                        <th class="col-3">Количество специалистов</th>
                                        <th colspan="3">Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($categories) == 0)
                                        <tr class="text-center">
                                            <td colspan="6" class="text-center col-form-label-lg">Нет категорий</td>
                                        </tr>
                                    @else
                                        @foreach($categories as $category)
                                            <tr class="text-center">
                                                <td>{{ $category->title }}</td>
                                                <td>{{ count($category->users) }}</td>
                                                <td class="col-1">
                                                    <a href="{{ route('admin.category.show', $category->id) }}">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                </td>
                                                <td class="col-1">
                                                    <a class="blue ml-2 pointer show-modal"
                                                       data-category_id="{{ $category->id }}" data-toggle="modal"
                                                       data-target="#modal-rename-cat">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                </td>
                                                <td class="col-1">
                                                    <form method="post" action="{{ route('admin.category.delete', $category->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="border-0 bg-transparent text-danger" type="submit">
                                                            <i class="fas fa-minus-circle" role="button"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
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
        @include('admin.includes.alert', array('title' => 'Название категории не заполнено'))
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
                        <input id="title" required name="title" class="form-control form-control-lg" type="text"
                               placeholder="Новое название категории">
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
