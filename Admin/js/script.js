document.getElementById('search').addEventListener('input', function() {
    var kyw = this.value;
    var iddm = document.querySelector('input[name="iddm"]').value;
    
    if (kyw.length > 0) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'search.php?kyw=' + kyw + '&iddm=' + iddm, true);
        xhr.onload = function() {
            if (this.status == 200) {
                document.getElementById('suggestions').innerHTML = this.responseText;
                document.getElementById('suggestions').style.display = 'block';
            }
        };
        xhr.send();
    } else {
        document.getElementById('suggestions').style.display = 'none';
    }
});



// ADMIN
// Biểu đồ doanh thu (giả lập)
var ctx = document.getElementById('revenueChart').getContext('2d');
var revenueChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5'],
        datasets: [{
            label: 'Doanh thu',
            data: [100, 200, 150, 300, 250],
            borderColor: 'rgba(75, 192, 192, 1)',
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});