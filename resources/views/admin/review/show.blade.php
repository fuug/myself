@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card card-primary">
                            <form method="POST" action="{{ route('admin.review.edit', $review->id) }}"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="card-body">
                                    <div class="form-group">

                                        <div class="row">
                                            <div class="col-3">
                                                <label for="reviewer_id">Автор отзыва</label>
                                                <input disabled type="text" class="form-control" id="reviewer_id"
                                                       placeholder="title" name="" autocomplete="false"
                                                       value="{{ \App\Models\User::all()->where('id', $review->reviewer_id)->first()->name }}">
                                                @error('title')
                                                <div class="text-danger">Это поле обязательно для заполнения</div>
                                                @enderror
                                            </div>
                                            <div class="col-3">
                                                <label for="customer_id">Кому отзыв</label>
                                                <input disabled type="text" class="form-control" id="customer_id"
                                                       placeholder="title" name="" autocomplete="false"
                                                       value="{{ \App\Models\User::all()->where('id', $review->customer_id)->first()->name }}">
                                                @error('title')
                                                <div class="text-danger">Это поле обязательно для заполнения</div>
                                                @enderror
                                            </div>
                                            <div class="col-3">
                                                <label for="title">Заголовок отзыва</label>
                                                <input type="text" class="form-control" id="title"
                                                       placeholder="title" name="title" autocomplete="false"
                                                       value="{{ $review->title }}">
                                                @error('title')
                                                <div class="text-danger">Это поле обязательно для заполнения</div>
                                                @enderror
                                            </div>
                                            <div class="col-3">
                                                <label for="rating">Рейтинг</label>
                                                <input type="number" id="rating" name="rating" class="form-control" value="{{ $review->rating }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="summernote">Описание отзыва</label>
                                        <textarea name="content" id="summernote">{{ $review->content }}</textarea>
                                    </div>

                                    <div class="col-3">
                                        <label for="published">Опубликован</label>
                                        <input type="checkbox" class="form-control" id="published" placeholder=""
                                               name="published"
                                               autocomplete="false" {{ $review->published ? 'checked' : '' }}>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit"
                                            class="btn btn-primary">{{ $review->published ? 'Сохранить' : 'Опубликовать'}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12">
                        <form action="{{ route('admin.user.delete', $review->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Удалить Отзыв</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">

@endsection

@section('scripts')
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(function () {
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
        });
    </script>
@endsection
