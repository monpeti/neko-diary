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

    <div class="background-animation">

        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>

    </div>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg">

        <div class="container">

            {{-- タイトル --}}
            <a class="navbar-brand" href="/diaries">
                猫日記
            </a>

            <div class="d-flex align-items-center">

                {{-- メニュー --}}
                <div class="navbar-nav me-3">

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

                {{-- 検索フォーム --}}
                <form
                    action="/diaries/search"
                    method="GET"
                    class="d-flex">

                    <input
                        type="text"
                        name="keyword"
                        class="form-control me-2"
                        placeholder="タイトル・本文検索"
                        value="{{ request('keyword') }}">

                    <input
                        type="date"
                        name="date"
                        class="form-control me-2"
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

</body>
</html>