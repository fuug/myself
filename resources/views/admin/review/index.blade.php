@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Отзывы</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">

                <div class="row mt-3">
                    <div class="card col-12">
                        <div class="card-header">
                            <h3 class="card-title">Отзывы</h3>
                        </div>
                        <div class="card-body">
                            <table id="dataTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Заголовок</th>
                                        <th>Описание</th>
                                        <th>Автор отзыва</th>
                                        <th>Отзыв о </th>
                                        <th>Анонимный</th>
                                        <th>Опубликован</th>
                                        <th>Перейти</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @if(count($reviews) == 0)
                                    <tr class="text-center">
                                        <td colspan="6" class="text-center col-form-label-lg">Ничего не найдено</td>
                                    </tr>
                                @else
                                    @foreach($reviews as $review)
                                        <tr class="text-center">
                                            <td>{{ $review->title }}</a></td>
                                            <td>{{ $review->content }}</td>
                                            <td>{{ \App\Models\User::all()->where('id', $review->reviewer_id)->first()->name }}</td>
                                            <td>{{ \App\Models\User::all()->where('id', $review->customer_id)->first()->name }}</td>
                                            <td>{{ $review->incognito ? 'Да' : 'Нет' }}</td>
                                            <td>{{ $review->published ? 'Да' : 'Нет' }}</td>
                                            <td><a href="{{ route('admin.review.show', $review->id) }}">Перейти</a></td>
                                        </tr>
                                    @endforeach
                                @endif

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Заголовок</th>
                                        <th>Описание</th>
                                        <th>Автор отзыва</th>
                                        <th>Отзыв о </th>
                                        <th>Анонимный</th>
                                        <th>Опубликован</th>
                                        <th>Перейти</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

@endsection

@section('scripts')
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script>
        $(function () {
            $("#dataTable").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["colvis"]
            }).buttons().container().appendTo('#dataTable_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
