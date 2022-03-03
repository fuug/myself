<div class="form-input">
    <label for="experience">Опыт работы</label>
    <div class="input-border">
        <input type="number" id="experience" name="experience" value="{{ $user->performerDescription->experience }}">
    </div>
</div>
<div class="form-input flex-start">
    <label for="category_id">Подходы</label>
    <div class="input-border">
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
</div>
<div class="form-input flex-start">
    <label for="activity_id">Основные направления деятельности</label>
    <div class="input-border">
        <select id="activity_id" name="activity_ids[]"
                class="select2 select2-hidden-accessible" multiple=""
                data-placeholder="Выберите категории" style="width: 100%;"
                data-select2-id="1001" tabindex="-1" aria-hidden="true">
            @foreach($activities as $activity)
                <option
                    {{ is_array($user->activities->pluck('id')->toArray() ) && in_array($activity->id, $user->activities->pluck('id')->toArray() ) ? 'selected' : '' }} value="{{ $activity->id }}">{{ $activity->title }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-input flex-start">
    <label for="about">О себе</label>
    <div class="input-border">
        <textarea name="about" id="about" rows="10">{{ $user->performerDescription->about }}</textarea>
    </div>
</div>
