<!DOCTYPE html>
<html lang="ja">
<style>
/* ページ表示時のアニメーション。 */
.fade-in {
    animation: fadeIn 1s ease;
}

@keyframes fadeIn {

    from {
        opacity: 0;
        transform: translateY(20px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* 日記カードのアニメーション */
.diary-card {
    transition: 0.3s;
}

/* 日記カードのhover時に浮かせる */
.diary-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
}

/* ボタンのアニメーション */
.custom-btn {
    transition: 0.3s;
}

/* ボタンのhover時に浮かせる */
.custom-btn:hover {
    transform: translateY(-2px);
    opacity: 0.9;
}

/* ボタンクリック時の動作 */
.custom-btn:active {
    transform: scale(0.98);
}

/* Navbar */
.nav-link {
    transition: 0.3s;
}

.nav-link:hover {
    opacity: 0.7;
}

/* 画像のズーム*/
/* .image-wrapper {
    overflow: hidden;
}

.diary-image {
    transition: 0.3s;
}

.diary-card:hover .diary-image {
    transform: scale(1.05);
    filter: brightness(0.9);
} */
</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>猫日記</title>

    {{-- Bootstrap --}}
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>
<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <div class="container">

            {{-- タイトル --}}
            <a class="navbar-brand" href="/diaries">
                🐈 猫日記
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
                    action="/diaries"
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
                
                </form>

            </div>

        </div>

    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

</body>
</html>