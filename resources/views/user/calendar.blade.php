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
                @foreach ($user->getCustomerEvents() as $events)
                {
                    title: '{{ $events->title }}',
                    start: '{{ $events->start }}'
                },
                @endforeach
            ]
        });

        calendar.render();
    });

</script>
