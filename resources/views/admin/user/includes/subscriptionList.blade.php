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
