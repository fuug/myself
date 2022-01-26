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
            <label for="summernote">Описание пользователя</label>
            <textarea name="description" id="summernote">{{ $user->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="category_id">Выберите категории</label>
            <select id="category_id" name="category_ids[]"
                    class="select2 select2-hidden-accessible" multiple=""
                    data-placeholder="Выберите категории" style="width: 100%;"
                    data-select2-id="1000" tabindex="-1" aria-hidden="true">
                @foreach($categories as $category)
                    <option
                        {{ is_array($user->categories->pluck('id')->toArray() ) && in_array($category->id, $user->categories->pluck('id')->toArray() ) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="experience">Опыт работы</label>
            <input type="number" class="form-control" id="experience" placeholder=""
                   name="experience" autocomplete="false" value="{{ $user->experience }}">
        </div>
        <div class="form-group">
            <label for="highestCategory">Имеет высшую категорию</label>
            <input type="checkbox" class="form-control" id="highestCategory" placeholder=""
                   name="highestCategory" autocomplete="false" value="{{ $user->highestCategory }}">
        </div>
        <div class="form-group">
            <label for="activities">Основные направления деятельности:</label>
            <input type="text" class="form-control" id="activities" placeholder=""
                   name="activities" autocomplete="false" value="{{ $user->activities }}">
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
