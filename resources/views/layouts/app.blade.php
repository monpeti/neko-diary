<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>猫日記</title>

    {{-- Bootstrap --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    {{-- css --}}
    <link
        rel="stylesheet"
        href="{{ asset('css/style.css') }}">

    {{-- Google Fonts --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic&display=swap"
        rel="stylesheet">

    <link
        href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css"
        rel="stylesheet"/>

    <link
        rel="stylesheet"
        href="https://unpkg.com/aos@2.3.1/dist/aos.css"/>

</head>
<body>

    {{-- ローディング画面 --}}
    <div id="loading-screen">
        <div class="running-cat"></div>
        <p>
            🐾 Loading...
        </p>
    </div>

    {{-- 走る猫 --}}
    <div id="running-cat">
        <img
            id="cat-animation"
            src="/images/loading/cat1.png"
            alt="running cat">
    </div>

    <div class="background-animation">

        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>

    </div>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light py-3">

        <div class="container">

            {{-- タイトル --}}
            <a class="navbar-brand" href="/diaries">
                猫日記
            </a>

            {{-- レスポンシブ用ハンバーガーメニュー --}}
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            {{-- レスポンシブ用 --}}
            <div
                class="collapse navbar-collapse"
                id="navbarNav">

                <div class="navbar-nav me-3 ms-auto">

                    <a class="nav-link" href="/diaries">
                        一覧
                    </a>

                    <a class="nav-link" href="/diaries/create">
                        新規投稿
                    </a>

                    <a class="nav-link" href="/album">
                        アルバム
                    </a>

                    <a class="nav-link" href="/graph">
                        体重グラフ
                    </a>

                </div>
            
                <div class="d-flex align-items-center">
    
                    {{-- 検索フォーム --}}
                    <form
                        action="/diaries/search"
                        method="GET"
                        class="d-flex flex-column flex-lg-row gap-2 mt-3 mt-lg-0">
    
                        <input
                            type="text"
                            name="keyword"
                            class="form-control me-2 w-100"
                            placeholder="タイトル・本文検索"
                            value="{{ request('keyword') }}">
    
                        <input
                            type="date"
                            name="date"
                            class="form-control me-2 w-100"
                            value="{{ request('date') }}">
    
                        <button class="btn btn-outline-light">
                            検索
                        </button>
                        <a
                            href="/diaries"
                            class="btn btn btn-outline-light">
                            クリア
                        </a>
                    </form>
                </div>
            </div>

        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>

    <script>
        const lightbox = GLightbox();
    </script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init({
            duration: 1000,
            once: true,
        });
    </script>


    {{-- ローディング演出 --}}
    <script>
    window.addEventListener('load', function () {

        const loading = document.getElementById('loading-screen');

        setTimeout(() => {

            loading.style.opacity = '0';

            setTimeout(() => {

                loading.style.display = 'none';

            }, 500);

        }, 300);

    });

    </script>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

</body>
</html>