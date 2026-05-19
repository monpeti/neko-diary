@extends('layouts.app')

@section('content')

<div class="container">

    <h1 class="mb-4">
        アルバム
    </h1>

    <div class="masonry">

        @foreach ($diaries as $diary)

        <div class="masonry-item" data-aos="fade-up">
        
            <div class="album-link">
            
                <a
                    href="{{ asset('storage/' . $diary->image_path) }}"
                    class="glightbox"
                    data-title="{{ $diary->title }}">
            
                    <img
                        src="{{ asset('storage/' . $diary->image_path) }}"
                        class="album-image">
            
                </a>
            
                <div class="album-overlay">
                
                    <h5>
                        {{ $diary->title }}
                    </h5>
                
                    <p>
                        {{ \Carbon\Carbon::parse($diary->date)->format('Y/m/d') }}
                    </p>
                
                    <a
                        href="/diaries/{{ $diary->id }}"
                        class="btn btn-light btn-sm mt-2">
                        📖 詳細を見る
                    </a>
                
                </div>
            
            </div>
        
        </div>

        @endforeach

    </div>

</div>

@endsection