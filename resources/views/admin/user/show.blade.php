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
                    @if($user->role == 'performer')
                        @include('admin.user.includes.subscriptionList')
                    @endif
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card card-primary">
                            @if($user->role == 'performer')
                                @include('admin.user.includes.editFormPerformer')
                            @elseif($user->role == 'customer')
                                @include('admin.user.includes.editFormCustomer')
                            @else
                                @include('admin.user.includes.editFormAdmin')
                            @endif
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
                    <h4 class="modal-title">Добавить абонемент</h4>
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
