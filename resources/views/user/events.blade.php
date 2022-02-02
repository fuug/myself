@extends('layouts.main')
@section('title', 'Личный кабинет')

@section('styles')

@endsection

@section('footer')

    <script>

        $('.eventSubmit').click(function () {

            const eventId = $(this).attr('id');
            const subscriptionId = $('#event-' + eventId + '>#subscriptionId').val();
            console.log(subscriptionId);

            $.ajax({
                url: '{{ route('user.profile.confirmEvent', $user->id) }}',
                type: "POST",
                data: {
                    subscriptionId: subscriptionId,
                    eventId: eventId
                },
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    if(data == 'success') {
                        $('#event-' + eventId).fadeOut(200)
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
            Свободные даты у психолога:
            @foreach($performerEvents as $event)
                <div id="event-{{$event->id}}">
                    {{ $event->start }}
                    <input type="hidden" name="subscriptionId" id="subscriptionId" value="{{ $subscription->id }}">
{{--                    <input type="hidden" name="customerId" id="customerId" value="{{ $user->id }}">--}}
{{--                    <input type="hidden" name="eventId" id="eventId" value="{{ $event->id }}">--}}
                    <button class="eventSubmit" id="{{ $event->id }}">Записаться</button>
                </div>
            @endforeach
        @else

            <h1>Нет свободных мест</h1>
        @endif
    </div>

@endsection
