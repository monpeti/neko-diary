<!DOCTYPE html>
<html>
<head>
    <title>体重グラフ</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<h1>体重グラフ</h1>

<button onclick="location.href='/diaries'">一覧に戻る</button>

<canvas id="weightChart"></canvas>

<script>
    const labels = @json($dates);
    const data = @json($weights);

    const ctx = document.getElementById('weightChart').getContext('2d');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: '体重',
                data: data,
                borderWidth: 2,
                fill: false
            }]
        }
    });
</script>

</body>
</html>