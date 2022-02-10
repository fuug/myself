@extends('layouts.main')
@section('title', 'Личный кабинет')

@section('styles')

@endsection

@section('footer')

    <script>

        $('.eventSubmit').click(function () {

            const sessionId = $(this).attr('id');
            const subscriptionId = $('#event-' + sessionId + '>#subscriptionId').val();
            $.ajax({
                url: '{{ route('user.profile.confirmSession', $user->id) }}',
                type: "POST",
                data: {
                    subscriptionId: subscriptionId,
                    sessionId: sessionId
                },
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    if(data === 'success') {
                        $('#event-' + sessionId).fadeOut(200)
                    } else {
                        alert('Максимальное количество записей')
                    }
                },
                error: function (msg) {
                    alert(' Какая-то ошибка( ')
                }
            });
        })
    </script>

@endsection


@section('content')

    <div style="width: 85%; margin: auto; text-align: center">
        @if(count($performerEvents) != 0)
            <h1>Свободные записи у психолога:</h1>
            @foreach($performerEvents as $event)
                <div id="event-{{$event->id}}" style="padding-top: 1.3rem">
                    <span style="font-size: 1.5rem">{{ \Illuminate\Support\Carbon::parse($event->start)->timezone($user->timezone) }}</span>
                    <input type="hidden" name="subscriptionId" id="subscriptionId" value="{{ $subscription->id }}">
                    <button class="eventSubmit btn" id="{{ $event->id }}">Записаться</button>
                </div>
            @endforeach
        @else
            <h1>Нет свободных записей</h1>
        @endif
    </div>

@endsection
