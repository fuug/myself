<div id="modalUrgency" class="modal">
    <div class="modalContent">
        <div class="closeModal">
            <button type="button" class="close" onclick="$('#modalUrgency').fadeOut()">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modalBody">
            <h1>Нужна срочная консультация?</h1>
            <a class="btn btn-primary" href="{{ route('performers.urgency') }}">Ближайшие свободные записи</a>
            <form action="{{ route('urgency') }}" method="POST">
                @csrf
                <button class="btn btn-secondary">Больше не показывать</button>
            </form>
        </div>
    </div>
</div>
<script>
        setTimeout(
            $('#modalUrgency').fadeIn(),
            3000
        )
</script>
