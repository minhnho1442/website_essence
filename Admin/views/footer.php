<footer>
    
</footer>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
     // Biểu đồ doanh thu và vận chuyển (giả lập)
     var ctx = document.getElementById('salesChart').getContext('2d');
    var salesChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5'],
            datasets: [
                {
                    label: 'Đơn hàng đã bán',
                    data: [30, 50, 40, 70, 60],
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Đơn hàng đã vận chuyển',
                    data: [20, 40, 30, 60, 50],
                    backgroundColor: 'rgba(153, 102, 255, 0.5)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
// Biểu đồ doanh thu (giả lập)
// var ctx = document.getElementById('revenueChart').getContext('2d');
//         var revenueChart = new Chart(ctx, {
//             type: 'line',
//             data: {
//                 labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5'],
//                 datasets: [{
//                     label: 'Doanh thu',
//                     data: [100, 200, 150, 300, 250],
//                     borderColor: 'rgba(75, 192, 192, 1)',
//                     backgroundColor: 'rgba(75, 192, 192, 0.2)',
//                     borderWidth: 1
//                 }]
//             },
//             options: {
//                 scales: {
//                     y: {
//                         beginAtZero: true
//                     }
//                 }
//             }
//         });
</script>
</body>
</html>