<h1>編集</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('diaries.update', $diary->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div>
        <label>タイトル</label><br>
        <input type="text" name="title" value="{{ $diary->title }}">
    </div>

    <div>
        <label>本文</label><br>
        <textarea name="body">{{ $diary->body }}</textarea>
    </div>

    <div>
        <label>体重 (kg)</label><br>
        <input type="number" step="0.1" name="weight" value="{{ $diary->weight }}">
    </div>

    <div>
        <label>ご飯量 (g)</label><br>
        <input type="number" name="food_amount" value="{{ $diary->food_amount }}">
    </div>

    <div>
        <label>写真</label><br>
        <input type="file" name="image">
    </div>
    @if ($diary->image_path)
        <img src="{{ asset('storage/' . $diary->image_path) }}" width="150">
    @endif

    <div>
        <label>日付</label><br>
        <input type="date" name="date" value="{{ $diary->date }}">
    </div>
    
    <button type="submit">更新</button>
</form>
