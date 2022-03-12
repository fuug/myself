<div class="sidebar-nav">
    <ul>
        <li class="nav-li">
            <i class="nav-icon icon-edit-info"></i>
            <p>Редактировать информацию</p>
        </li>
        <li class="nav-li">
            <i class="nav-icon icon-edit"></i>
            <a href="{{ route('user.profile.subscription', $user->id) }}">
                Количество консультаций {{ $user->subscriptions_customer->count() }}
            </a>
        </li>
        <li class="nav-li">
            <i class="nav-icon icon-chat"></i>
            <a href="{{ route('user.profile.chats', auth()->user()->id) }}">Чат</a>
        </li>
        <li class="nav-li">
            <i class="nav-icon icon-consultation"></i>
            <p>Кабинет консультаций</p>
        </li>

        <li class="nav-li">
            <i class="nav-icon icon-material"></i>
            <p>Записаться на консультацию</p>
        </li>
        <li class="nav-li">
            <p>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Выход
                </a>
            </p>
        </li>
    </ul>
</div>
