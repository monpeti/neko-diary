<div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="100">

    <div class="card h-100 shadow-sm diary-card fade-in">
        {{-- 画像 --}}
    <div class="image-wrapper">
    
        <img
            src="{{ $diary->image_path
                ? asset('storage/' . $diary->image_path)
                : asset('images/no-image.png') }}"
            class="card-img-top diary-image">
    </div>
        <div class="card-body d-flex flex-column">
        <div class="flex-grow-1">
                {{-- タイトル --}}
                <h5 class="card-title">
                    {{ $diary->title }}
                </h5>
                {{-- 本文 --}}
                <p class="card-text">
                    {{ Str::limit($diary->body, 80) }}
                </p>
                {{-- 情報 --}}
                @if ($diary->weight)
                    <p class="mb-1">
                        体重: {{ $diary->weight }} kg
                    </p>
                @endif
                @if ($diary->food_amount)
                    <p class="mb-1">
                        ご飯量: {{ $diary->food_amount }} g
                    </p>
                @endif
                
                @if ($diary->water_count !== null)
                    <p class="mb-3">
                        水分回数: {{ $diary->water_count }} 回
                    </p>
                @endif
                @if ($diary->tag)
                    <a
                        href="/diaries/search?keyword={{ $diary->tag }}"
                        class="badge rounded-pill text-bg-warning">                       
                        #{{ $diary->tag }}
                    </a>                        
                
                @endif
                @if ($diary->date)
                    <p class="text-muted small mb-3">
                        投稿日:
                        {{ \Carbon\Carbon::parse($diary->date)->format('Y/m/d') }}
                    </p>
                @endif
            </div>
            
            {{-- ボタン --}}
            <x-link-button
                href="/diaries/{{ $diary->id }}"
                class="btn btn-primary custom-btn mt-auto">
                詳細を見る
            </x-link-button>
        </div>
    </div>
</div>