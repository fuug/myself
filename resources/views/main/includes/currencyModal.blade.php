<div id="modalCurrency" class="modal">
    <div class="modalContent">
        <div class="closeModal">
            <button type="button" id="currencyClose" class="close" onclick="$('#modalCurrency').fadeOut()">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modalBody">
            <h1>Какая валюта Вам удобнее?</h1>
            <form action="{{ route('currency-cookie') }}" method="post">
                @csrf
                <div class="form-input">
                    <div class="input-border">
                        <select name="currency" id="currency">
                            @foreach(\App\Models\Currency::all() as $currency)
                                <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>
</div>
<script>

    if (!$('#modalUrgency').is(":visible")) {
        setTimeout(
            $('#modalCurrency').fadeIn(),
            3000
        )
    }
</script>
