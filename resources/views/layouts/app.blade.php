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

</head>
<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

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

</body>
</html>