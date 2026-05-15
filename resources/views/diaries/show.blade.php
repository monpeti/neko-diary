@extends('layouts.app')

@section('content')

<div class="card shadow-sm fade-in">

    {{-- 画像 --}}
<img
    src="{{ $diary->image_path
        ? asset('storage/' . $diary->image_path)
        : asset('images/no-image.png') }}"
    class="img-fluid rounded"
    style="
        max-height: 1000px;
        object-fit: contain;
        background-color: #f8f9fa;
    "
>

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
        @if ($diary->weight)
            <p>
                <strong>体重:</strong>
                {{ $diary->weight }} kg
            </p>
        @endif

        @if ($diary->food_amount)
            <p>
                <strong>ご飯量:</strong>
                {{ $diary->food_amount }} g
            </p>
        @endif

        @if ($diary->water_count !== null)
            <p>
                <strong>水を飲んだ回数:</strong>
                {{ $diary->water_count }} 回
            </p>
        @endif

        @if ($diary->date)
            <p>
                <strong>投稿日:</strong>
                {{ \Carbon\Carbon::parse($diary->date)->format('Y/m/d') }}
            </p>
        @endif

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