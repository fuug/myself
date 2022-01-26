@extends('admin.layouts.main')

@section('styles')
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/custom.css') }}">
@endsection

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-6">
                        <div class="col-6">
                            <h1 class="m-0">{{ $user->name }} | {{ $user->email }}</h1>
                        </div>

                        <div class="row mb-2">
                            <div class="w-50">
                                <img src="{{ url( 'storage/' . $user->thumbnail) }}" class="img-thumbnail"
                                     alt="user photo">
                                <form action="{{ route('admin.user.deleteThumb', $user->id) }}" method="post"
                                      class="mt-3">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Удалить изображение</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <h1 class="m-0">Абонементы</h1>
                        <div class="card">
                            <div class="card-body table-responsive p-0 vh-60">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                    <tr class="text-center col-form-label-lg">
                                        <th>Стоимость</th>
                                        <th>Количество сеансов</th>
                                        <th>Статус</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($subscriptions as $subscription)
                                        <tr class="text-center">
                                            <td>{{ $subscription->price }}</td>
                                            <td>{{ $subscription->session_count }}</td>
                                            <td>{{ $subscription->getStatus() }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <button class="btn btn-primary" data-toggle="modal"
                                data-target="#modal-add">Добавить абонемент
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card card-primary">
                            <form method="POST" action="{{ route('admin.user.edit') }}" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="card-body">
                                    <input name="user_id" type="hidden" value="{{ $user->id }}">
                                    <div class="form-group">
                                        <label for="email">Email пользователя</label>
                                        <input type="email" class="form-control" id="email"
                                               placeholder="Email" name="email" autocomplete="false"
                                               value="{{ $user->email }}">
                                        @error('email')
                                        <div class="text-danger">Это поле обязательно для заполнения</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Имя пользователя</label>
                                        <input type="text" class="form-control" id="name"
                                               placeholder="" name="name" autocomplete="false"
                                               value="{{ $user->name }}">
                                        @error('name')
                                        <div class="text-danger">Это поле обязательно для заполнения</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="user_role">Роль пользователя</label>
                                        <select name="user_role" id="user_role"
                                                class="select2 select2-hidden-accessible" style="width: 100%;"
                                                data-select2-id="1" tabindex="-1" aria-hidden="true">
                                            <option selected="selected" value="{{ $user->role }}"
                                                    disabled>{{ $user->role_rus }}</option>
                                            <option value="admin">Администратор</option>
                                            <option value="moderator">Модератор</option>
                                            <option value="performer">Специалист</option>
                                            <option value="customer">Клиент</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="summernote">Описание пользователя</label>
                                        <textarea name="description" id="summernote">{{ $user->description }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="category_id">Выберите категории</label>
                                        <select id="category_id" name="category_ids[]"
                                                class="select2 select2-hidden-accessible" multiple=""
                                                data-placeholder="Выберите категории" style="width: 100%;"
                                                data-select2-id="1000" tabindex="-1" aria-hidden="true">
                                            @foreach($categories as $category)
                                                <option
                                                    {{ is_array($user->categories->pluck('id')->toArray() ) && in_array($category->id, $user->categories->pluck('id')->toArray() ) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="thumbnail">Выберите изображение</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="thumbnail"
                                                       name="thumbnail">
                                                <label class="custom-file-label" for="thumbnail">Выберите
                                                    изображение</label>
                                            </div>
                                        </div>
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

    <div class="modal fade" id="modal-add" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Добавить пользователя</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.user.subscription.add', $user->id) }}" method="POST" class="card-body">
                        @csrf
                        <div class="form-group">
                            <label for="pricePerOnceSession">Ценна за разовый сеанс в $</label>
                            <input id="pricePerOnceSession" name="countSessions" class="form-control form-control-lg"
                                   type="number"
                                   placeholder="Ценна за разовый сеанс" value="{{ $user->pricePerOnceSession }}"
                                   disabled>
                        </div>
                        <div class="form-group">
                            <label for="countSessions">Количество сеансов</label>
                            <input id="countSessions" name="countSessions" class="form-control form-control-lg"
                                   type="number"
                                   placeholder="Количество сеансов" value="4">
                        </div>
                        <div class="form-group">
                            <label for="price">Стоимость абонемента в $</label>
                            <input id="price" name="price" class="form-control form-control-lg" type="number"
                                   placeholder="Стоимость абонемента в $" value="{{ $user->pricePerOnceSession * 4 }}"
                                   required>
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

@section('scripts')
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(function () {
            const pricePerOnceSession = $('#pricePerOnceSession').val();
            $('.select2').select2();
            $('#summernote').summernote({
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['insert', ['link']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            })
            bsCustomFileInput.init();

            $('#countSessions').change(function () {
                $('#price').val($(this).val() * pricePerOnceSession);
            })
        });
    </script>

@endsection
