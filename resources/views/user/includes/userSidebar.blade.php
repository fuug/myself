<div class="sidebar-nav">
    <ul>
        <li class="nav-li">
            <i class="nav-icon icon-edit-info"></i>
            <p>Редактировать информацию</p>
        </li>
        <li class="nav-li">
            <i class="nav-icon icon-edit"></i>
            <p>Количество консультаций {{ $user->subscriptions_customer->count() }}</p>
        </li>
        <li class="nav-li">
            <i class="nav-icon icon-chat"></i>
            <p>Чат</p>
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
