@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">

        <h1>
            日記一覧
        </h1>

        {{-- <span class="badge bg-secondary fs-6">

            {{ $diaries->count() }}件の日記

        </span> --}}

    </div>
    
    <div class="mb-4">
        <x-link-button href="/diaries/create">
            新規投稿
        </x-link-button>
    </div>
    
    <div class="row">
        
        @foreach ($diaries as $diary)
        
        <x-diary-card :diary="$diary" />
        
        @endforeach
        
    </div>

    <div class="mt-4">

        {{ $diaries->links() }}

    </div>
    
    {{-- <x-link-button href="/graph">
        体重グラフ
    </x-link-button> --}}

@endsection