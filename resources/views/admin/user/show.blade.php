@extends('admin.layouts.main')

@section('styles')
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
@endsection

@section('scripts')
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(function () {
            $('.select2').select2();
            $('#summernote').summernote({
                toolbar:[
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['insert', ['link']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            })
        });
    </script>

@endsection

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $user->name }} | {{ $user->email }}</h1>
                    </div>
            </div>
        </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="card card-primary">
                                <form method="POST" action="{{ route('admin.user.edit') }}">
                                    @csrf
                                    @method('PATCH')
                                    <div class="card-body">
                                        <input name="user_id" type="hidden" value="{{ $user->id }}">
                                        <div class="form-group">
                                            <label for="email">Email пользователя</label>
                                            <input type="email" class="form-control" id="email"
                                                   placeholder="Email" name="email" autocomplete="false" value="{{ $user->email }}">
                                            @error('email')
                                            <div class="text-danger">Это поле обязательно для заполнения</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Имя пользователя</label>
                                            <input type="text" class="form-control" id="name"
                                                   placeholder="" name="name" autocomplete="false" value="{{ $user->name }}">
                                            @error('name')
                                                <div class="text-danger">Это поле обязательно для заполнения</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="user_role">Роль пользователя</label>
                                            <select name="user_role" id="user_role" class="select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                <option selected="selected" value="{{ $user->role }}" disabled>{{ $user->role_rus }}</option>
                                                <option value="admin">Администратор</option>
                                                <option value="moderator">Модератор</option>
                                                <option value="performer">Специалист</option>
                                                <option value="customer">Клиент</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="summernote">Описание пользователя</label>
                                            <textarea name="description" id="summernote"></textarea>
                                        </div>
    {{--                                    <div class="form-group">--}}
    {{--                                        <label for="exampleInputFile">File input</label>--}}
    {{--                                        <div class="input-group">--}}
    {{--                                            <div class="custom-file">--}}
    {{--                                                <input type="file" class="custom-file-input" id="exampleInputFile">--}}
    {{--                                                <label class="custom-file-label" for="exampleInputFile">Choose--}}
    {{--                                                    file</label>--}}
    {{--                                            </div>--}}
    {{--                                            <div class="input-group-append">--}}
    {{--                                                <span class="input-group-text">Upload</span>--}}
    {{--                                            </div>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
                                        <div class="form-group">
                                            <label for="category_id">Выберите категории</label>
                                            <select id="category_id" name="category_ids[]" class="select2 select2-hidden-accessible" multiple="" data-placeholder="Выберите категории" style="width: 100%;" data-select2-id="1000" tabindex="-1" aria-hidden="true">
                                                @foreach($categories as $category)
                                                    <option {{ is_array($user->categories->pluck('id')->toArray() ) && in_array($category->id, $user->categories->pluck('id')->toArray() ) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Сохранить</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <form action="{{ route('admin.user.delete', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Удалить пользователя</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
    </div>
@endsection
