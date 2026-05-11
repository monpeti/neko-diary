<h1>日記投稿</h1>

<form method="POST" action="{{ route('diaries.store') }}" enctype="multipart/form-data">
    @csrf

    <div>
        <label>タイトル</label><br>
        <input
            type="text"
            name="title"
            value="{{ old('title') }}"
            style="@error('title') border: 1px solid red; @enderror">

        @include('components.error-message', ['name' => 'title'])

    <div>
    <div>
        <label>本文</label><br>

        <textarea
            name="body"
            style="@error('body') border: 1px solid red; @enderror"
        >{{ old('body') }}</textarea>

        @include('components.error-message', ['name' => 'body'])
    </div>
    </div>

    <div>
        <label>体重 (kg)</label><br>
        <input
            type="text"
            name="weight"
            value="{{ old('weight') }}"
            style="@error('weight') border: 1px solid red; @enderror">

            @include('components.error-message', ['name' => 'weight'])
    </div>

    <div>
        <label>ご飯量 (g)</label><br>
        <input type="number" name="food_amount" value="{{ old('food_amount') }}" step="10.0" min="0">
    </div>

    {{-- 写真の追加 --}}
    <div>
        <label>写真</label><br>
        <input type="file" name="image">

            @include('components.error-message', ['name' => 'image'])
    </div>

    {{-- 投稿日 --}}
    <div>
        <label>日付</label><br>
        <input type="date" name="date" value="{{ old('date') }}">
    </div>

    <button type="submit">保存</button>
</form>

<h2>一覧</h2>

@foreach ($diaries as $diary)
    <div>
        {{-- 日付表示 --}}
        {{ \Carbon\Carbon::parse($diary->date)->format('Y/m/d') }}

        <h3>
            <a href="{{ route('diaries.show', $diary->id) }}">
                {{ $diary->title }}
            </a>
        </h3>
    </div>
@endforeach

<button onclick="location.href='/graph'">体重グラフ</button>