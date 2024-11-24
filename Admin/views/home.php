<div class="container">
<h1>CONTROL PANEL</h1>
    <h2 class="text-center">Tổng Quan Doanh Nghiệp</h2>
    <div class="row text-center mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Tổng Đơn Hàng
                </div>
                <div class="card-body">
                    <h5 class="card-title" id="totalOrders">150</h5>
                    <p class="card-text">Số đơn hàng đã được tạo trong tháng này.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-success text-white">
                    Đơn Hàng Đã Vận Chuyển
                </div>
                <div class="card-body">
                    <h5 class="card-title" id="shippedOrders">120</h5>
                    <p class="card-text">Số đơn hàng đã được vận chuyển trong tháng này.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-warning text-white">
                    Doanh Thu
                </div>
                <div class="card-body">
                    <h5 class="card-title" id="totalRevenue">2,500,000 VND</h5>
                    <p class="card-text">Doanh thu tổng cộng trong tháng này.</p>
                </div>
            </div>
        </div>
    </div>

<!-- Biểu đồ thống kê -->
<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                Biểu đồ doanh thu và vận chuyển
            </div>
            <div class="card-body">
                <canvas id="salesChart"></canvas>
            </div>
        </div>
    </div>
</div>
