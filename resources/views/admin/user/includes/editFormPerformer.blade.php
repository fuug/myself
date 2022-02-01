<form method="POST" action="{{ route('admin.performer.edit') }}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="card-body">
        <input name="user_id" type="hidden" value="{{ $user->id }}">
        <div class="row">
            <div class="form-group col-6">
                <label for="email">Email пользователя</label>
                <input type="email" class="form-control" id="email"
                       placeholder="Email" name="email" autocomplete="false"
                       value="{{ $user->email }}">
                @error('email')
                <div class="text-danger">Это поле обязательно для заполнения</div>
                @enderror
            </div>
            <div class="form-group col-6">
                <label for="name">Имя пользователя</label>
                <input type="text" class="form-control" id="name"
                       placeholder="" name="name" autocomplete="false"
                       value="{{ $user->name }}">
                @error('name')
                <div class="text-danger">Это поле обязательно для заполнения</div>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="user_role">Роль пользователя</label>
            <select name="role_id" id="role_id"
                    class="select2 select2-hidden-accessible" style="width: 100%;"
                    data-select2-id="1" tabindex="-1" aria-hidden="true">
                @foreach(\App\Models\Role::all() as $role)
                    <option
                        {{ $user->role->id == $role->id ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        <hr>
        <div class="form-group">
            <label for="summernote">Описание пользователя</label>
            <textarea name="description" id="summernote">{{ $user->performerDescription->about }}</textarea>
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
            <div class="row">
                <div class="col-3">
                    <label for="experience">Опыт работы</label>
                    <input type="number" class="form-control" id="experience" placeholder=""
                           name="experience" autocomplete="false" value="{{ $user->performerDescription->experience }}">
                </div>
                <div class="col-3">
                    <label for="pricePerOnceSession">Стоимость одного приёма</label>
                    <input type="number" class="form-control" id="pricePerOnceSession" placeholder=""
                           name="pricePerOnceSession" autocomplete="false"
                           value="{{ $user->performerDescription->pricePerOnceSession }}">
                </div>
                <div class="col-3">
                    <label for="gender">Пол пользователя</label>
                    <select name="gender" id="gender" class="select2 select2-hidden-accessible" style="width: 100%;"
                            data-select2-id="2"
                            tabindex="-1" aria-hidden="true">
                        <option {{ $user->performerDescription->gender == 'male' ? 'selected' : '' }} value="male">
                            Мужчина
                        </option>
                        <option {{ $user->performerDescription->gender == 'female' ? 'selected' : '' }} value="female">
                            Женщина
                        </option>
                    </select>
                </div>
                <div class="col-3">
                    <label for="highestCategory">Имеет высшую категорию</label>
                    <input type="checkbox" class="form-control" id="highestCategory" placeholder=""
                           name="highestCategory"
                           autocomplete="false" {{ $user->performerDescription->hasHighestCategory ? 'checked' : '' }}>
                </div>

            </div>
        </div>
        <div class="form-group">
            <label for="activities">Основные направления деятельности:</label>
            <input type="text" class="form-control" id="activities" placeholder=""
                   name="activities" autocomplete="false" value="{{ $user->performerDescription->activities }}">
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
