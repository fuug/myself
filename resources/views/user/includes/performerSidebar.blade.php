<div class="sidebar-nav">
    <ul>
        <li class="nav-li">
            <i class="nav-icon icon-edit-info"></i>
            <a href="{{ route('user.profile.edit', auth()->user()->id) }}">Редактировать информацию</a>
        </li>
        <li class="nav-li">
            <i class="nav-icon icon-edit"></i>
            <p>Редактировать график</p>
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
            <i class="nav-icon icon-clients"></i>
            <a href="{{ route('user.profile.customers', auth()->user()->id) }}">Список клиентов</a>
        </li>
        <li class="nav-li">
            <i class="nav-icon icon-material"></i>
            <p>Методические материалы</p>
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
