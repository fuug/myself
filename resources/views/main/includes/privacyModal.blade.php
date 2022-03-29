<div id="modalPrivacy" class="modal">
    <div class="modalContent">
        <div class="closeModal">
            <button type="button" id="currencyClose" class="close" onclick="$('#modalCurrency').fadeOut()">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modalBody">
            <h1>Политика конфиденциальности</h1>
            <p>Перед использованием сайта вам нужно принять политику конфиденциальности</p>
            <form action="{{ route('privacy-cookie') }}" method="post">
                @csrf
                <input type="hidden" value="true" name="privacy">
                <button class="btn btn-primary" value="true">Согласен</button>
            </form>
        </div>
    </div>
</div>
<script>

    if (!$('#modalUrgency').is(":visible")) {
        setTimeout(
            $('#modalPrivacy').fadeIn(),
            3000
        )
    }
</script>
