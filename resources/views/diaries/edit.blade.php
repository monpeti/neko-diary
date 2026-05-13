@extends('layouts.app')

@section('content')

<h1>編集</h1>

<form method="POST" action="{{ route('diaries.update', $diary->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    @include('components.diary-form')
    
    <x-button type="submit">
        更新
    </x-button>

    <x-link-button href="/diaries/{{ $diary->id }}">
        詳細へ戻る
    </x-link-button>

    </div>
</form>


@endsection