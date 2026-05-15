@extends('layouts.app')

@section('content')

<h1 class="mb-4">
    検索結果
</h1>

<div class="row">

    @forelse ($diaries as $diary)

        <x-diary-card :diary="$diary" />

        @empty

            <div class="alert alert-warning">
                検索結果がありません
            </div>

    @endforelse

</div>

@endsection