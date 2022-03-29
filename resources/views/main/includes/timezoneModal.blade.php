@php
    $timestamp = time();
    foreach (timezone_identifiers_list(\DateTimeZone::ALL) as $key => $value) {
        date_default_timezone_set($value);
        $timezone[$value] = $value . ' (UTC ' . date('P', $timestamp) . ')';
    }
    $timeZoneList = collect($timezone)->sortKeys();
@endphp

<div id="modalTimezone" class="modal">
    <div class="modalContent">
        <div class="closeModal">
            <button type="button" class="close" onclick="$('#modalUrgency').fadeOut()">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modalBody">
            <h1>Давайте сверим часы</h1>

            <form action="{{ route('timezone-cookie') }}" method="post">
                @csrf
                <div class="form-input">
                    <label for="timezone">Часовой пояс</label>
                    <div class="input-border">
                        <select id="timezone" name="timezone"
                                class="select2 select2-hidden-accessible"
                                data-placeholder="Выберите категории" style="width: 100%;"
                                data-select2-id="10111" tabindex="-1" aria-hidden="true">
                            @foreach($timeZoneList as $timeZone => $timezone_gmt_diff)
                                <option value="{{ $timeZone }}">{{ $timezone_gmt_diff }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('js/select2.full.js') }}"></script>
<script>
    $(function () {
        $('.select2').select2();
    });

    setTimeout(
        $('#modalTimezone').fadeIn(),
        3000
    )
</script>
