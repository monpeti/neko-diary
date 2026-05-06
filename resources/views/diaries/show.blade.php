<h1>{{ $diary->title }}</h1>

<p>{{ $diary->body }}</p>
<p>体重: {{ $diary->weight }} kg</p>
<p>ご飯量: {{ $diary->food_amount }} g</p>
<p>投稿日：{{ \Carbon\Carbon::parse($diary->date)->format('Y/m/d') }}</p>

{{-- 写真の追加 --}}
@if ($diary->image_path)
    <img src="{{ asset('storage/' . $diary->image_path) }}" width="300">
@endif

<a href="{{ route('diaries.edit', $diary->id) }}">編集</a>

<form method="POST" action="{{ route('diaries.destroy', $diary->id) }}" 
      onsubmit="return confirm('本当に削除しますか？')">
    @csrf
    @method('DELETE')

    <button type="submit">削除</button>
</form>

<a href="/diaries">← 一覧に戻る</a>