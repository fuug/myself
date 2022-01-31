@extends('admin.layouts.main')

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Пользователи</h1>
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
                            Добавить пользователя
                        </button>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Пользователи</h3>
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
                                        <th>Имя</th>
                                        <th>Email</th>
                                        <th>Роль</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($users) == 0)
                                        <tr class="text-center">
                                            <td colspan="6" class="text-center col-form-label-lg">Нет пользователей</td>
                                        </tr>
                                    @else
                                        @foreach($users as $user)
                                            <tr class="text-center">
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->role->name }}</td>
                                                <td>
                                                    <a href="{{ route('admin.user.show', $user->id) }}"><i class="fas fa-eye"></i></a>
                                                    <a class="blue ml-2 pointer show-modal" data-user_id="{{ $user->id }}" data-toggle="modal" data-target="#modal-rename-cat"><i class="fas fa-pencil-alt"></i></a>
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
    @error('username')
        @include('admin.includes.alert', array('title' => 'Имя не заполнено'))
    @enderror
    @error('email')
        @include('admin.includes.alert', array('title' => 'Такой email уже существует'))
    @enderror

    <div class="modal fade" id="modal-create-cat" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Добавить пользователя</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.user.store') }}" method="POST" class="card-body">
                        @csrf
                        <div class="form-group">
                            <label for="username">Имя пользователя</label>
                            <input id="username" name="username" class="form-control form-control-lg" type="text"
                                   placeholder="Имя пользователя">
                        </div>
                        <div class="form-group">
                            <label for="email">Email пользователя</label>
                            <input id="email" name="email" class="form-control form-control-lg" type="email"
                                   placeholder="Email пользователя" required>
                        </div>
                        <div class="form-group">
                            <label for="role_id">Роль пользователя</label>
                            <select name="role_id" id="role_id" class="select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option selected="selected" disabled>Роль пользователя</option>
                                @foreach(\App\Models\Role::all() as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="pt-4 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Создать</button>
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
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">

@endsection

@section('scripts')
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
        });
    </script>
    <script src="{{ asset('dist/js/custom.js') }}"></script>
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection
