<script>
    document.addEventListener('DOMContentLoaded', function () {
        const calendarEl = document.getElementById('calendar');

        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'ru',
            headerToolbar: {
                left: 'prev',
                center: 'title',
                right: 'next'
            },
            events: [
                @if($user->role->title == 'performer')
                    @foreach ($user->getUserSessions() as $event)
                        {
                            id: '{{ $event['id'] }}',
                            title: '{{ $event['customer_id'] ? \App\Models\User::all()->where('id', $event['customer_id'])->first()->name : 'Свободное место' }}',
                            {{--start: '{{ $event['start'] }}',--}}
                            start: '{{ \Illuminate\Support\Carbon::parse($event['start'])->timezone($user->timezone) }}',
                            end: '{{ \Illuminate\Support\Carbon::parse($event['end'])->timezone($user->timezone) }}',
                        },
                    @endforeach
                @else
                    @foreach ($user->getUserSessions() as $event)
                        {
                            id: '{{ $event['id'] }}',
                            title: '{{ \App\Models\User::all()->where('id', $event['performer_id'])->first()->name }}',
                            start: '{{ \Illuminate\Support\Carbon::parse($event['start'])->timezone($user->timezone) }}',
                            end: '{{ \Illuminate\Support\Carbon::parse($event['end'])->timezone($user->timezone) }}',
                        },
                    @endforeach
                @endif
            ],
            eventClick: function (info) {
                @if($user->role->title == 'performer')
                $('#changeEventModal').fadeIn();
                $('#eventId').val(info.event.id)
                @endif
            },
            dateClick: function (info) {
                @if($user->role->title == 'performer')
                $('#addEventModal').fadeIn();
                $('#date').val(info.dateStr)
                @endif
            }
        });
        calendar.render();
    });
</script>
