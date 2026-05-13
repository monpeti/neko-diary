@extends('layouts.app')

@section('content')

<h1>日記投稿</h1>

<x-link-button href="/diaries/create">
    新規投稿
</x-link-button>

<h2>一覧</h2>

<div class="row">

    @foreach ($diaries as $diary)

        <div class="col-md-4 mb-4">

            <div class="card h-100 shadow-sm diary-card fade-in">

                {{-- 画像 --}}
                @if ($diary->image_path)

                    <div class="image-wrapper">
                    
                        <img
                            src="{{ asset('storage/' . $diary->image_path) }}"
                            class="card-img-top diary-image"
                            style="height: 250px; object-fit: cover;">
                    
                    </div>
                
                @endif

                <div class="card-body d-flex flex-column">

                    {{-- タイトル --}}
                    <h5 class="card-title">
                        {{ $diary->title }}
                    </h5>

                    {{-- 本文 --}}
                    <p class="card-text">
                        {{ Str::limit($diary->body, 80) }}
                    </p>

                    {{-- 情報 --}}
                    <p class="mb-1">
                        体重: {{ $diary->weight }} kg
                    </p>

                    <p class="mb-1">
                        ご飯量: {{ $diary->food_amount }} g
                    </p>

                    <p class="mb-3">
                        水分回数: {{ $diary->water_count }} 回
                    </p>

                    <p class="text-muted small mb-3">
                        投稿日:
                        {{ \Carbon\Carbon::parse($diary->date)->format('Y/m/d') }}
                    </p>

                    {{-- ボタン --}}
                    <x-link-button
                        href="/diaries/{{ $diary->id }}"
                        class="btn btn-primary custom-btn mt-auto">
                        詳細を見る
                    </x-link-button>

                </div>
            </div>
        </div>

    @endforeach

</div>

<x-link-button href="/graph">
    体重グラフ
</x-link-button>

@endsection