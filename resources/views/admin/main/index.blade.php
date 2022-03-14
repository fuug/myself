@extends('admin.layouts.main')

@section('styles')
    <link rel="stylesheet" href="{{ asset('dist/css/custom.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Главная страница</h1>
                    </div>
                </div>
            </div>
        </div>


        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $customersCount }}</h3>
                                <p>Клиентов</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                            {{--                            <a href="#" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>--}}
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-cyan">
                            <div class="inner">
                                <h3>{{ $performersCount }}</h3>
                                <p>Психологов</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user-tie"></i>
                            </div>
                            {{--                            <a href="#" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>--}}
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-indigo">
                            <div class="inner">
                                <h3>{{ $subscriptionsCount }}</h3>
                                <p>Абонементов</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            {{--                            <a href="#" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>--}}
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $doneSessionsCount }}</h3>
                                <p>Посещённых сеансов</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            {{--                            <a href="#" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>--}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <section class="col-lg-7 connectedSortable">

                        <div class="card">
                            <div class="card-header border-0">
                                <h3 class="card-title">Валюта</h3>
                                <div class="card-tools">
                                    <button type="button" data-toggle="modal" data-target="#modal-create-currency"
                                            class="btn btn-tool btn-sm">
                                        <i class="fas fa-solid fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-striped table-valign-middle">
                                    <thead>
                                    <tr>
                                        <th>Валюта</th>
                                        <th>Стоимость</th>
                                        <th>Знак</th>
                                        <th class="text-center">Изменить</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($currencies as $currency)
                                        <tr id="currency-{{ $currency->id }}">
                                            <td class="name">{{ $currency->name }}</td>
                                            <td class="amount">{{ $currency->amount }}</td>
                                            <td class="title">{{ $currency->title }}</td>
                                            <td class="text-center">
                                                <button type="button" data-toggle="modal"
                                                        data-currency="{{ $currency->id }}"
                                                        data-target="#modal-edit-currency" class="btn edit-currency">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </section>
                    <section class="col-lg-5 connectedSortable">
                    </section>
                </div>
            </div>
        </section>
    </div>

    <div class="modal fade" id="modal-create-currency" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Добавить валюту</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.currency.store') }}" method="POST" class="card-body">
                        @csrf
                        <div class="form-group">
                            <label for="currency_name">Название валюты</label>
                            <input id="currency_name" name="name"
                                   class="form-control form-control-lg" type="text"
                                   placeholder="Название валюты" required>
                        </div>
                        <div class="form-group">
                            <label for="currency_amount">Стоимость валюты</label>
                            <input id="currency_amount" name="amount"
                                   class="form-control form-control-lg" type="text"
                                   placeholder="Стоимость валюты" required>
                        </div>
                        <div class="form-group">
                            <label for="currency_title">Знак валюты</label>
                            <input id="currency_title" name="title"
                                   class="form-control form-control-lg" type="text"
                                   placeholder="Знак валюты" required>
                        </div>
                        <div class="pt-4 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Создать</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-edit-currency" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Изменить валюту</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.currency.edit') }}" method="POST" class="card-body">
                        @csrf
                        @method('PATCH')
                        <input class="modal-currency-id" name="id" type="hidden">
                        <div class="form-group">
                            <label for="modal-currency-name">Название валюты</label>
                            <input id="modal-currency-name" name="name"
                                   class="form-control form-control-lg" type="text"
                                   placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="modal-currency-amount">Стоимость валюты</label>
                            <input id="modal-currency-amount" name="amount"
                                   class="form-control form-control-lg" type="text"
                                   placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="modal-currency-title">Знак валюты</label>
                            <input id="modal-currency-title" name="title"
                                   class="form-control form-control-lg" type="text"
                                   placeholder="" required>
                        </div>
                        <div class="pt-4 d-flex justify-content-between">
                            <button id="deleteCurrency" class="btn btn-danger">Удалить</button>
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </form>
                    <form action="{{ route('admin.currency.destroy') }}" method="post" id="form-delete">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="id" class="modal-currency-id">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('footer')
    <script>
        $('.edit-currency').click(function () {
            const currency_id = $(this).data('currency');
            const currency_container = $(`#currency-${currency_id}`);
            const currency_name = currency_container.children('.name').text();
            const currency_amount = currency_container.children('.amount').text();
            const currency_title = currency_container.children('.title').text();

            const modal_currency_name = $('#modal-currency-name');
            const modal_currency_amount = $('#modal-currency-amount');
            const modal_currency_title = $('#modal-currency-title');

            modal_currency_name.val(currency_name)
            modal_currency_amount.val(currency_amount)
            modal_currency_title.val(currency_title)
            $('.modal-currency-id').val(currency_id)
            if (currency_title === 'usd') {
                modal_currency_name.prop('disabled', true)
                modal_currency_name.prop('title', 'Нельзя менять доллар')

                modal_currency_amount.prop('disabled', true)
                modal_currency_amount.prop('title', 'Нельзя менять доллар')

                modal_currency_title.prop('disabled', true)
                modal_currency_title.prop('title', 'Нельзя менять доллар')
            } else {
                modal_currency_name.prop('disabled', false)
                modal_currency_name.removeAttr("title")

                modal_currency_amount.prop('disabled', false)
                modal_currency_amount.removeAttr("title")

                modal_currency_title.prop('disabled', false)
                modal_currency_title.removeAttr("title")
            }
        })
        $('#deleteCurrency').click(function (e) {
            e.preventDefault();
            $('#form-delete').submit();
        })
    </script>
@endsection
