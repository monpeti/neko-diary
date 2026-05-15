@extends('layouts.app')

@section('content')

<h1>日記投稿</h1>

<x-link-button href="/diaries/create">
    新規投稿
</x-link-button>

<h2>一覧</h2>

<div class="row">

    @foreach ($diaries as $diary)
    
        <x-diary-card :diary="$diary" />

    @endforeach

</div>

<x-link-button href="/graph">
    体重グラフ
</x-link-button>

@endsection