@extends('layouts.app')

@section('content')

<h1>編集</h1>

<form method="POST" action="{{ route('diaries.update', $diary->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    @include('components.diary-form')
    
    <button class="btn btn-primary" type="submit">更新</button>
</form>

<a href="/diaries">← 一覧に戻る</a>

@endsection