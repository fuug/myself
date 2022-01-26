<form method="POST" action="{{ route('admin.user.edit') }}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="card-body">
        <input name="user_id" type="hidden" value="{{ $user->id }}">
        <div class="form-group">
            <label for="email">Email пользователя</label>
            <input type="email" class="form-control" id="email"
                   placeholder="Email" name="email" autocomplete="false"
                   value="{{ $user->email }}">
            @error('email')
            <div class="text-danger">Это поле обязательно для заполнения</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="name">Имя пользователя</label>
            <input type="text" class="form-control" id="name"
                   placeholder="" name="name" autocomplete="false"
                   value="{{ $user->name }}">
            @error('name')
            <div class="text-danger">Это поле обязательно для заполнения</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="user_role">Роль пользователя</label>
            <select name="user_role" id="user_role"
                    class="select2 select2-hidden-accessible" style="width: 100%;"
                    data-select2-id="1" tabindex="-1" aria-hidden="true">
                <option selected="selected" value="{{ $user->role }}"
                        disabled>{{ $user->role_rus }}</option>
                <option value="admin">Администратор</option>
                <option value="moderator">Модератор</option>
                <option value="performer">Специалист</option>
                <option value="customer">Клиент</option>
            </select>
        </div>
        <div class="form-group">
            <label for="thumbnail">Выберите изображение</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="thumbnail"
                           name="thumbnail">
                    <label class="custom-file-label" for="thumbnail">Выберите
                        изображение</label>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Сохранить</button>
    </div>
</form>
