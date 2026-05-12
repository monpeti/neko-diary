@extends('layouts.app')

@section('content')

<h1>日記投稿</h1>

<form method="POST" action="{{ route('diaries.store') }}" enctype="multipart/form-data">
    @csrf

    @include('components.diary-form')

    <button class="btn btn-primary">
        投稿
    </button>
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

<button class="btn btn-primary" onclick="location.href='/graph'">体重グラフ</button>

@endsection