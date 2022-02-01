<script>
    document.addEventListener('DOMContentLoaded', function() {
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

                @foreach ($user->getUserEvents() as $event)
                {
                    id: '{{ $event['id'] }}',
                    title: '{{ $event['customer_id'] ? \App\Models\User::all()->where('id', $event['customer_id'])->first()->name : 'Свободное место' }}',
                    start: '{{ $event['start'] }}',
                    end: '{{ $event['end'] }}'
                },
                @endforeach
            ],
            eventClick: function(info) {
                $('#changeEventModal').fadeIn();
                $('#eventId').val(info.event.id)
            },
            dateClick: function(info) {
                $('#addEventModal').fadeIn();
                $('#date').val(info.dateStr)
            }
        });

        calendar.render();
    });

</script>
