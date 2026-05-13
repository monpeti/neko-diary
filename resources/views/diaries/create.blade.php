@extends('layouts.app')

@section('content')

<h1 class="mb-4">日記投稿</h1>

<form
    action="/diaries"
    method="POST"
    enctype="multipart/form-data">

    @csrf

    @include('components.diary-form')

    <div class="d-flex gap-2 mt-4">

    <x-button type="submit">
        投稿
    </x-button>

    <x-link-button href="/diaries">
        一覧へ戻る
    </x-link-button>

    </div>

</form>

@endsection