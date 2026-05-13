@extends('layouts.app')

@section('content')

<div class="card shadow-sm fade-in">

    {{-- 画像 --}}
    @if ($diary->image_path)
        <img
            src="{{ asset('storage/' . $diary->image_path) }}"
            class="card-img-top"
            style="max-height: 400px; object-fit: cover;"
        >
    @endif

    <div class="card-body">

        {{-- タイトル --}}
        <h2 class="card-title mb-3">
            {{ $diary->title }}
        </h2>

        {{-- 本文 --}}
        <p class="card-text">
            {{ $diary->body }}
        </p>

        <hr>

        {{-- 情報 --}}
        <p>
            <strong>体重:</strong>
            {{ $diary->weight }} kg
        </p>

        <p>
            <strong>ご飯量:</strong>
            {{ $diary->food_amount }} g
        </p>

        <p>
            <strong>水を飲んだ回数:</strong>
            {{ $diary->water_count }} 回
        </p>

        <p>
            <strong>投稿日:</strong>
            {{ \Carbon\Carbon::parse($diary->date)->format('Y/m/d') }}
        </p>

        {{-- ボタン --}}
        <x-link-button href="/diaries/{{ $diary->id }}/edit">
            編集
        </x-link-button>

        <x-link-button href="/diaries">
            一覧へ戻る
        </x-link-button>

        </div>
    </div>
</div>

@endsection