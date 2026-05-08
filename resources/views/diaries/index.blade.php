<h1>日記投稿</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('diaries.store') }}" enctype="multipart/form-data">
    @csrf

    <div>
        <label>タイトル</label><br>
        <input type="text" name="title">
    </div>

    <div>
        <label>本文</label><br>
        <textarea name="body"></textarea>
    </div>

    <div>
        <label>体重 (kg)</label><br>
        <input type="number" step="0.1" name="weight">
    </div>

    <div>
        <label>ご飯量 (g)</label><br>
        <input type="number" name="food_amount">
    </div>

    {{-- 写真の追加 --}}
    <div>
        <label>写真</label><br>
        <input type="file" name="image">
    </div>

    {{-- 投稿日 --}}
    <div>
        <label>日付</label><br>
        <input type="date" name="date">
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