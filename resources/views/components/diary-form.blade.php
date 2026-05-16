    <div class="mb-2">
        <label>タイトル</label><br>
        <input
            class="form-control @error('title') is-invalid @enderror"
            type="text"
            name="title"
            value="{{ old('title', $diary->title ?? '') }}">

        @include('components.error-message', ['name' => 'title'])

    </div>

    <div class="mb-2">
        <label>本文</label><br>
    
        <textarea
            class="form-control @error('body') is-invalid @enderror"
            name="body"
        >{{ old('body') }}</textarea>
    
        @include('components.error-message', ['name' => 'body'])
    </div>

    <div class="mb-2">
        <label>体重 (kg)</label><br>
        <input
            class="form-control @error('weight') is-invalid @enderror"
            type="text"
            name="weight"
            value="{{ old('weight') }}">

        @include('components.error-message', ['name' => 'weight'])
    </div>

    <div class="mb-2">
        <label>ご飯量 (g)</label><br>
        <input
            class="form-control @error('food_amount') is-invalid @enderror"
            type="number"
            name="food_amount"
            value="{{ old('food_amount') }}" step="10.0" min="0">
    </div>

    <div class="mb-2">
        <label>水を飲んだ回数</label><br>
        <input
            class="form-control @error('water_count') is-invalid @enderror"
            type="number"
            name="water_count"
            value="{{ old('water_count', $diary->water_count ?? '') }}"
            min="0">

        @include('components.error-message', ['name' => 'water_count'])
    </div>

    {{-- 写真の追加 --}}
    <div class="mb-2">
        <label>写真</label><br>
        <input
            class="form-control @error('image') is-invalid @enderror"
            type="file"
            name="image">

            @include('components.error-message', ['name' => 'image'])
    </div>

    {{-- タグの追加 --}}
    <div class="mb-2">
        <label>タグ</label><br>
        <input
            class="form-control @error('tag') is-invalid @enderror"
            type="text"
            name="tag"
            value="{{ old('tag', $diary->tag ?? '') }}"
            placeholder="例: 病院">
</div>

    {{-- 投稿日 --}}
    <div class="mb-3">
        <label>日付</label><br>
        <input
            class="form-control @error('date') is-invalid @enderror" 
            type="date"
            name="date"
            value="{{ old('date') }}">
    </div>