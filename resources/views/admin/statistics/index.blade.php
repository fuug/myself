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
                <div class="col-12">
                    <form method="get" class="col-6" action="{{ route('admin.statistic.format') }}">
                        @csrf
                        <label for="dateRange">Выберите период</label>
                        <div class="row">
                            <input type="text" name="dateRange" class="form-control float-right col-6" id="dateRange">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search" aria-hidden="true"></i>
                            </button>
                        </div>
                        <input type="hidden" id="startDate" name="startDate" value="{{ $startDate ?? '' }}"/>
                        <input type="hidden" id="endDate" name="endDate" value="{{ $endDate ?? '' }}"/>
                    </form>
                </div>

                <div class="row mt-3">
                    <div class="card col-12">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with default features</h3>
                        </div>
                        <div class="card-body">
                            <table id="dataTable" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Имя</th>
                                    <th>Email</th>
                                    <th>Сумма</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="text-center">
                                    @if(count($users) == 0)
                                        <td colspan="6" class="text-center col-form-label-lg">Ничего не найдено</td>
                                    @else
                                        @foreach($users as $user)
                                            <td><a href="{{ route('admin.user.show', $user->id) }}">{{ $user->name }}</a></td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->getSumPer($startDate, $endDate) == 0 ? 'Нет выплат' : $user->getSumPer($startDate, $endDate) }}</td>
                                        @endforeach
                                    @endif
                                </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Имя</th>
                                        <th>Email</th>
                                        <th>Сумма</th>
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
            $('#dateRange').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                startDate: $('#startDate').val(),
                endDate: $('#endDate').val(),
                locale: {
                    applyLabel: "Применить",
                    cancelLabel: "Отменить",
                    format: 'YYYY-MM-DD',
                    separator: ' / ',
                    firstDay: 1,
                    daysOfWeek: [
                        "Вс",
                        "Пн",
                        "Вт",
                        "Ср",
                        "Чт",
                        "Пт",
                        "Сб"
                    ],
                    monthNames: [
                        "Январь",
                        "Февраль",
                        "Март",
                        "Апрель",
                        "Май",
                        "Июнь",
                        "Июль",
                        "Август",
                        "Сентябрь",
                        "Октябрь",
                        "Ноябрь",
                        "Декабрь"
                    ]
                },
            }, function (start, end) {
                $('#startDate').val(start.format('YYYY-MM-DD'));
                $('#endDate').val(end.format('YYYY-MM-DD'));
            })
            $("#dataTable").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["csv", "excel", "pdf", "colvis"]
            }).buttons().container().appendTo('#dataTable_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
